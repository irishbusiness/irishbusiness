<?php namespace IrishBusiness\Repositories;

use Hash;
use Auth;
use Subscription;
use User;
use Salesperson;

class PaymentsRepository {

	public function getSubscription($id)
	{
		return Subscription::find($id);
	}

	public function attach($subscription)
	{
		$user = Auth::user()->user();

		$user->subscription()->attach($subscription);

		return $user;
	}

	public function validateCoupon($code)
	{

		$raw = $code;
		
		$code='';
		$type='';
		$length = strlen($raw);
		if($length==6)
		{
			$code = $raw;
			
		}
		// elseif($length==9)
		elseif( $length == 10 || $length == 12 || $length == 11 )
		{
			$code = mb_substr($raw,0,6);
			$type = mb_substr($raw,6,6);

			// if( $type != "cash" ){
			// 	$type = mb_substr($raw, 6, 6);
			// }
			
			// if($type!='chq'&&$type!='csh')
			if( $type!="cash" && $type!="check" && $type!="cheque" )
			{
				return false;
			}	
		}
		
		$coupon = Salesperson::whereCoupon($code)->first();

		if(is_null($coupon)) return false;

		return true;
	}

	public function storeCoupon($code)
	{
	   try
	   {	   	
			$user = Auth::user()->user();
			$user->coupon = $code;
			$user->save(); 
			return true;
	   }
	   catch(Exception $e)
	   {
	   		return false;
	   }
		
	}
	
}