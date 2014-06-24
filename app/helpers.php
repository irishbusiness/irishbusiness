<?php

//views search
function isEmpty($search)
{
	if(trim($search)!='') 
	{	
		return  '/' . $search;
	} 
	return '';
}

function isResult($text)
{
	if(Request::path()==='search')
		return $text;
	return '';
}

function isSelected($keyword,$selected)
{
	if(Request::path()==='search' && $keyword==$selected)
		return 'selected';
	return '';
}

function isClient($email)
{
	if(User::where('email','=',$email)->first())
		return true;

	return false;
}

if ( !function_exists('mysql_escape'))
{
    function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }
}

function globalXssClean()
{
    // Recursive cleaning for array [] inputs, not just strings.
    $sanitized = arrayStripTags(Input::get());
    Input::merge($sanitized);
}

function arrayStripTags($array)
{
    $result = array();

    foreach ($array as $key => $value) {
        // Don't allow tags on key either, maybe useful for dynamic forms.
        $key = mysql_escape(htmlentities($key));

        // If the value is an array, we will just recurse back into the
        // function to keep stripping the tags out of the array,
        // otherwise we will set the stripped value.
        if (is_array($value)) {
            $result[$key] = arrayStripTags($value);
        } else {
            // I am using strip_tags(), you may use htmlentities(),
            // also I am doing trim() here, you may remove it, if you wish.
            $result[$key] = trim(mysql_escape(htmlentities($value)));
        }
    }

    return $result;
}

function isOwner($slug){
    if(Auth::user()->guest()){
        return false;
    } 
    
    $id = Auth::user()->user()->id;
    $business = Business::whereSlug($slug)->first();

    if ($id == $business->user_id)
        return true;
    return false;

}

function hasBusiness()
{
    if(Auth::user()->check())
    {
        $business = Auth::user()->user()->business;
        if (!is_null($business))
            return true;
    }

    return false;
    
}

function businessSlug(){

    if(Auth::user()->check())
    {
        $business = Auth::user()->user()->business;
        if (!is_null($business))
            return $business->slug;
    }
}

function branch(){
    if(Auth::user()->check())
    {
        $business = Business::where('user_id', '=',Auth::user()->user()->id)->first();
    
          if (!is_null($business) && !is_null($business->branches->first()))

            return $business->branches->first()->id;
    }
}

function countBranches()
{
    if(Auth::user()->check())
    {
        $business = Business::where('user_id', '=',Auth::user()->user()->id)->first();
        if (!is_null($count = $business->branches->count()))
            return $count;
    }
}

function showAddress($address){
        $addresses = explode( '*', $address);
        return $addresses[0];
}

function showAddressfull($address){
        $output = "";
        $addresses = explode( '*', $address);
        // return var_dump($addresses);

        $count = count($addresses);
        foreach($addresses as $index => $address){
            if(trim($address)!=""){
                $output.=$address;
                if($index+1 != $count){   
                    if(!empty($addresses[$index+1])){
                        $output.=", ";

                    }
                }
            }
        }
        return $output;
}

function decode($string){
    return stripcslashes(stripcslashes(html_entity_decode($string)));
}

function subscribed(){
    if(Auth::user()->check())
    {
        if(Auth::user()->user()->access_level == 3)
            return true;

        $id = Auth::user()->user()->id;
        if (is_null(Auth::user()->user()->subscription->first()))
            return false;

        return true;
    }
}

function str_toAddress($string){
    $string = str_replace("*", "\n", $string);
    return $string;
}

function isAdmin(){
    if(Auth::user()->check())
    {
        if(Auth::user()->user()->access_level == 3){
            return true;
        } else {
            return false;
        }
    }
}

function pre($string){
    echo "<pre>";
    echo $string;
    echo "</pre>";
}

function alert($string){
    echo "<script>alert('".$string."');</script>";
}

function branchSlug(){
    if(Auth::user()->check())
    {
        $branch = Branch::whereBusinessId(Auth::user()->user()->business->id)->first();
        if (!is_null($branch))
            return $branch->branchslug;
    }
}

function WeekDaystoStrong($string){
    $weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

    for($x = 6; $x>=0; $x--){
        $pos = strpos($string, $weekdays[$x]);
        if($pos !== false){
           $string =  str_replace($weekdays[$x], "<b>".substr($string, $pos, strlen($weekdays[$x]))."</b>", $string);
        }else{
            $pos = strpos($string, substr($weekdays[$x], 0, 3));
            if($pos !== false ){
                $string =  str_replace(substr($weekdays[$x], 0, 3), "<b>".substr($string, $pos, 3)."</b>", $string);
            }
        }
    }

    return $string;
}

function generate_coupon(){
 
  $not_unique = true;
    

    while($not_unique){
        $charset = 'abcdefghijklmnopqrstuvwxyz';
        $p1 = substr(str_shuffle($charset),0, 3);
        $charset = '1234567890';
        $p2 = substr(str_shuffle($charset),0, 3);
        $coupon = $p1.$p2; 

        if( !coupon_exists($coupon) )  $not_unique = false;

        }

    return $coupon;
}

function coupon_exists($input_coupon){
    $salespersons = Salesperson::all();
    foreach ($salespersons as $salesperson) {
        if($salesperson->coupon == $input_coupon){
            return true;
        }
        return false;
        
    }

    return false;
}

function couponOwner_isSalesTeam($coupon){
    $salespersons = Salesperson::all();

    foreach ($salespersons as $salesperson) {
        if( ( strtolower($salesperson->coupon) == strtolower($coupon) ) && ( ($salesperson->access_level == 1) || ($salesperson->access_level == '1')) ){
            // return 'true';
            echo 'true';
        }else{
        // return 'false';
        echo 'false';
        }

    }
}