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
    $str = stripcslashes(stripcslashes(html_entity_decode($string)));
    $str = preg_replace('/<iframe.*?\/iframe>/i','', $str);
    return $str;
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
    print_r($string);
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

        if( ( strcasecmp($salesperson->coupon, $coupon)  ==  0) ){
            if( $salesperson->st != 0 ){
                $sales_team = Salesperson::find($salesperson->st);


                if( $sales_team->access_level == 1 ){
                    return true;
                }
            }

            if( $salesperson->tl != 0 ){
                $team_leader = Salesperson::find($salesperson->tl);

                if( $team_leader->st != 0 ){
                    $sales_team = Salesperson::find($team_leader->st);

                    if( $sales_team->access_level == 1 ){
                        return true;
                    }
                }
            }

            if( ( ($salesperson->access_level == 1) || ($salesperson->access_level == '1')) ){
                return true;
            }
        }

    }

    return false;
}

function keywordExplode($keywordsraw){
        
    $output = "";
    
    $keywordsraw = str_replace(" ", "-", $keywordsraw);
    $keywordsraw = str_replace(",", "-", $keywordsraw);
    $keywordsraw = preg_replace('/[^A-Za-z0-9\-]/', '', $keywordsraw); // Removes special chars.

    $keywordsraw = preg_replace('/-+/', '-', $keywordsraw);

    $keywords = explode(",", $keywordsraw);
    $count = count($keywords);
    foreach($keywords as $index => $keyword)
    {
        // $rawwords = explode(" ", $keyword);
        $rawwords = str_replace(" ", "-", $keyword);
        $rawwords = explode(" ", $keyword);
        $count2 = count($rawwords);
        foreach($rawwords as $index2 => $word) 
        {   
            $output.= trim($word);
                if($index2+1 !=$count2) $output.= '-';    
        }    
         /*if($index+1!=$count) $output.= '-';      */
    }
    return $output;

}

function clean_str($string){
    $string =  stripcslashes(strtolower($string));
    $string = str_replace("'", "", $string);
    $string = str_replace(" ", "-", $string);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    $string = preg_replace('/-+/', '-', $string);

    return $string;
}

function hashtag($keywordsraw){ 

    $output = "";
    
    // $keywordsraw = str_replace(" ", ",", $keywordsraw);
    $keywordsraw = preg_replace('/[^A-Za-z0-9\-\,]/', '', $keywordsraw); // Removes special chars.

    $keywordsraw = preg_replace('/-+/', '', $keywordsraw);

    return $keywordsraw;
}

function validateCaptcha($captcha_session, $id, $input){
    $sum = 0;
    foreach ($captcha_session as $key => $value) {
        foreach ($value as $key => $value2) {
            if( $key == $id ){
                $sum = $value2['x']+$value2['y'];
            }
        }
    }

    if( $sum == $input ){
        return true;
    }

    return false;

}

function validateHuman($captcha){
    if( strtolower($captcha) == "dublin" ){
        return true;
    }
    return false;
}

function getCategoryIdByName($name){
    $name = htmlspecialchars_decode($name);
    $category = Category::where('name', '=', $name)->first();
    return $category->id;
}

function getCategoryNameById($id){
    $category = Category::find($id);
    return $category->name;
}

function removeCommonWords($input){
 
    // EEEEEEK Stop words
    $commonWords = array('a','able','about','above','abroad','according','accordingly','across','actually','adj','after','afterwards','again','against','ago','ahead','ain\'t','all','allow','allows','almost','alone','along','alongside','already','also','although','always','am','amid','amidst','among','amongst','an','and',' and ','another','any','anybody','anyhow','anyone','anything','anyway','anyways','anywhere','apart','appear','appreciate','appropriate','are','aren\'t','around','as','a\'s','aside','ask','asking','associated','at','available','away','awfully','b','back','backward','backwards','be','became','because','become','becomes','becoming','been','before','beforehand','begin','behind','being','believe','below','beside','besides','best','better','between','beyond','both','brief','but','by','c','came','can','cannot','cant','can\'t','caption','cause','causes','certain','certainly','changes','clearly','c\'mon','co','co.','com','come','comes','concerning','consequently','consider','considering','contain','containing','contains','corresponding','could','couldn\'t','course','c\'s','currently','d','dare','daren\'t','definitely','described','despite','did','didn\'t','different','directly','do','does','doesn\'t','doing','done','don\'t','down','downwards','during','e','each','edu','eg','eight','eighty','either','else','elsewhere','end','ending','enough','entirely','especially','et','etc','even','ever','evermore','every','everybody','everyone','everything','everywhere','ex','exactly','example','except','f','fairly','far','farther','few','fewer','fifth','first','five','followed','following','follows','for','forever','former','formerly','forth','forward','found','four','from','further','furthermore','g','get','gets','getting','given','gives','go','goes','going','gone','got','gotten','greetings','h','had','hadn\'t','half','happens','hardly','has','hasn\'t','have','haven\'t','having','he','he\'d','he\'ll','hello','help','hence','her','here','hereafter','hereby','herein','here\'s','hereupon','hers','herself','he\'s','hi','him','himself','his','hither','hopefully','how','howbeit','however','hundred','i','i\'d','ie','if','ignored','i\'ll','i\'m','immediate','in','inasmuch','inc','inc.','indeed','indicate','indicated','indicates','inner','inside','insofar','instead','into','inward','is','isn\'t','it','it\'d','it\'ll','its','it\'s','itself','i\'ve','j','just','k','keep','keeps','kept','know','known','knows','l','last','lately','later','latter','latterly','least','less','lest','let','let\'s','like','liked','likely','likewise','little','look','looking','looks','low','lower','ltd','m','made','mainly','make','makes','many','may','maybe','mayn\'t','me','mean','meantime','meanwhile','merely','might','mightn\'t','mine','minus','miss','more','moreover','most','mostly','mr','mrs','much','must','mustn\'t','my','myself','n','name','namely','nd','near','nearly','necessary','need','needn\'t','needs','neither','never','neverf','neverless','nevertheless','new','next','nine','ninety','no','nobody','non','none','nonetheless','noone','no-one','nor','normally','not','nothing','notwithstanding','novel','now','nowhere','o','obviously','of','off','often','oh','ok','okay','old','on','once','one','ones','one\'s','only','onto','opposite','or','other','others','otherwise','ought','oughtn\'t','our','ours','ourselves','out','outside','over','overall','own','p','particular','particularly','past','per','perhaps','placed','please','plus','possible','presumably','probably','provided','provides','q','que','quite','qv','r','rather','rd','re','really','reasonably','recent','recently','regarding','regardless','regards','relatively','respectively','right','round','s','said','same','saw','say','saying','says','second','secondly','see','seeing','seem','seemed','seeming','seems','seen','self','selves','sensible','sent','serious','seriously','seven','several','shall','shan\'t','she','she\'d','she\'ll','she\'s','should','shouldn\'t','since','six','so','some','somebody','someday','somehow','someone','something','sometime','sometimes','somewhat','somewhere','soon','sorry','specified','specify','specifying','still','sub','such','sup','sure','t','take','taken','taking','tell','tends','th','than','thank','thanks','thanx','that','that\'ll','thats','that\'s','that\'ve','the','their','theirs','them','themselves','then','thence','there','thereafter','thereby','there\'d','therefore','therein','there\'ll','there\'re','theres','there\'s','thereupon','there\'ve','these','they','they\'d','they\'ll','they\'re','they\'ve','thing','things','think','third','thirty','this','thorough','thoroughly','those','though','three','through','throughout','thru','thus','till','to','together','too','took','toward','towards','tried','tries','truly','try','trying','t\'s','twice','two','u','un','under','underneath','undoing','unfortunately','unless','unlike','unlikely','until','unto','up','upon','upwards','us','use','used','useful','uses','using','usually','v','value','various','versus','very','via','viz','vs','w','want','wants','was','wasn\'t','way','we','we\'d','welcome','well','we\'ll','went','were','we\'re','weren\'t','we\'ve','what','whatever','what\'ll','what\'s','what\'ve','when','whence','whenever','where','whereafter','whereas','whereby','wherein','where\'s','whereupon','wherever','whether','which','whichever','while','whilst','whither','who','who\'d','whoever','whole','who\'ll','whom','whomever','who\'s','whose','why','will','willing','wish','with','within','without','wonder','won\'t','would','wouldn\'t','x','y','yes','yet','you','you\'d','you\'ll','your','you\'re','yours','yourself','yourselves','you\'ve','z','zero');
 
    return preg_replace('/\b('.implode('|',$commonWords).')\b/','',$input);
}

function getBranchBySlug($slug){
    return Branch::where('branchslug', '=', $slug)->first();
}

function removehtml($str){
    return strip_tags($str);
}

function remove_duplicate($str){ 
    $words = explode( "-", strtolower($str) );

    $newwords = array_unique($words);
    $output = "";

    foreach ($newwords as $word => $value) {
        $output.= $value."-";
    }

    return substr($output, 0, -1); 
}

function cleanSlug($str){
    $first = substr($str, 0, 1);
    $last = substr($str, strlen($str)-1, strlen($str));

    if( $first == "-" ){
        $str = substr($str, 1, strlen($str));
        $first = substr($str, 0, 1);
    }

    if( $last == "-" ){
        $str = substr($str, 0, strlen($str)-1);
        $last = substr($str, strlen($str)-1, strlen($str));
    }

    if( $first != "-" && $last != "-" ){
        return $str;
    }
    cleanSlug($str);
    
}