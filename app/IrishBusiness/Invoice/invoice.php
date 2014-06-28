<?php namespace IrishBusiness\Invoice;
class Invoice {
	public function generate_invoice($user){
		$name = $user->firstname." ".$user->lastname;
		// $address = "Downtown Street 12";
		// $city = "City";
		// $zipcode = "10010";
		// $country = "Norway";

		$txn_id = "1";
		$item_name = 'IrishBusiness '.$user->subscription->first()->name.' Subscription';
		// $business_name = "business name";
		// $amt = $user->subscription->first()->price;
		$tax = "23"; 
		$amount = $user->subscription->first()->price;

		$vat = ((float) $tax / 100 ) * (float) $amount;
		$totalAmount = $vat + (float) $amount;
		$balance = $totalAmount;

		// the template PDF file
		$filename = public_path()."/invoices/Invoice_Blank.pdf";

		$pdf = new \fpdi\FPDI();
		$pdf->AddPage();

		// import the template PFD
		$pdf->setSourceFile($filename);

		// select the first page
		$tplIdx = $pdf->importPage(1);

		// use the page we imported
		$pdf->useTemplate($tplIdx);

		// set font, font style, font size.
		$pdf->SetFont('Times','B',10);

		$pdf->SetXY(138, 58);
		$pdf->Write(0, ucwords($txn_id));
		$pdf->Ln(4);

		$pdf->SetXY(138, 64);
		$pdf->Write(0, ucwords(date("Y-m-d")));
		$pdf->Ln(4);


		$pdf->SetXY(13, 123);
		$pdf->Write(0, ucwords($item_name));
		$pdf->Ln(8);

		// $pdf->SetXY(58, 123);
		// $pdf->Write(0, ucwords($business_name));
		// $pdf->Ln(8);

		$pdf->SetXY(92, 123);
		$pdf->Write(0, ucwords(number_format($amount,2,'.','.')));
		$pdf->Ln(8);

		$pdf->SetXY(118, 123);
		$pdf->Write(0, ucwords("1"));
		$pdf->Ln(8);

		$pdf->SetXY(144, 123);
		$pdf->Write(0, ucwords($tax.'%'));
		$pdf->Ln(8);

		$pdf->SetXY(170, 123);
		$pdf->Write(0, ucwords(number_format($amount,2,'.','.')));
		$pdf->Ln(8);


		// set initial placement
		$pdf->SetXY(13, 70);

		// go to 25 X (indent)
		$pdf->SetX(25);

		// write
		$pdf->Write(0, ucwords(strtolower($name)));

		// move to next line
		$pdf->Ln(5);

		// The following section is basically a repetition of the previous for inserting more text.
		// repeat for more text:
		// $pdf->SetX(25);
		// $pdf->Write(0, ucwords(strtolower($address)));
		// $pdf->Ln(5);
		// $pdf->SetX(25);
		// $pdf->Write(0, $zipcode . " " . ucwords(strtolower($city)));
		// $pdf->Ln(5);
		// $pdf->SetX(25);
		// $pdf->Write(0,  ucwords(strtolower($country)));
		// $pdf->Ln(5);

		$pdf->SetXY(170, 136);
		$pdf->Write(0, ucwords(number_format($amount,2,'.','.')));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords($vat));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords($totalAmount));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords(strtolower(date("Y-m-d"))));
		$pdf->Ln(8);

		$pdf->SetX(170);
		$pdf->Write(0, ucwords($balance));
		$pdf->Ln(8);

		// all changes to PDF is now complete.


		//====================================================================
		// Output document
		// This section will give the user a download file dialog with the
		// generated document. The filename will be document.pdf
		//====================================================================

		// MSIE hacks. Need this to be able to download the file over https
		// All kudos to http://in2.php.net/manual/en/function.header.php#74736

		$invoicename = $name.'-invoice.pdf';
		header("Content-Transfer-Encoding", "binary");
		header('Cache-Control: maxage=3600'); //Adjust maxage appropriately
		header('Pragma: public');
		$pdf->Output(public_path().'/invoices/'.$invoicename, 'F');
		

		return $invoicename;
	}
}