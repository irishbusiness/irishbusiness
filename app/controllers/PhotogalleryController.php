<?php

class PhotogalleryController extends \BaseController {

	function generateRandomString($length) {
	    $characters = 'SUPERCALIFRAGILISTICEXPIALIDOCIOUSpneumonoultramicroscopicsilicovolcanoconiosisTheQuickBrownFoxJumpsOverTHeLazyDog1234567890';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

	function addphoto()
	{
		$filenames = [];
        $ids = [];
		$dir = public_path().'/images/photogallery/';
        $branchid = Input::get('branch_id');


		foreach(Input::file('choosefiles') as $key => $file){
            $rules = array(
                'file' => 'required|mimes:png,gif,jpeg|max:20000'
            );
                $ext = $file->guessClientExtension(); // (Based on mime type)
                $imagename = $this->generateRandomString(10).'.'.$ext;
	            $filename = $dir.$imagename;

            $validator = \Validator::make(array('file'=> $file), $rules);
            
            if($validator->passes()){
                //$ext = $file->getClientOriginalExtension(); // (Based on filename)
                $file->move(public_path('images/photogallery'), $imagename);

                $photogallery = new Photogallery;
                $photogallery->branch_id = $branchid;
                $photogallery->filepath = $imagename;
                $photogallery->save();
                
                $filenames[$key] = $imagename;
                $ids[$key] = $photogallery->id;
            }else{
                //Does not pass validation
                $errors = $validator->errors();
                
                $filenames[$key] = $imagename;
                $ids[$key] = $photogallery->id;
            }
        }

        // return array_intersect($ids, $filenames);
        $fucking_object = array_combine($ids, $filenames);
        return $fucking_object;
        // $very_fucking_array = json_decode(json_encode($fucking_object), true);
        // return $very_fucking_array;
        // for ($i=0; $i < count($filenames); $i++) { 
        //     # code...
        // }
        // return array_combine($ids, $filenames);
        // return $filenames;
	}

    function deletephoto()
    {
        $id = Input::get('id');
        $photo = Photogallery::findOrFail($id);
        $path = public_path().'/images/photogallery/'.$photo->filepath;
        $photo->delete();

        unlink($path);
        return 'deleted';
    }
	
}