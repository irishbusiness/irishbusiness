<?php
 
  $output = '['; 
  $count = count($branches);
  foreach($branches as $key => $branch)
  {
    foreach ($count2= $branch->business->categories as $key2 => $category)
     { 
        $output .= '{latitude:';
        $latlng = explode(',',$branch->latlng);
        $output .= preg_replace('/\(|\)/','',$latlng[0]);
        $output .= ', longitude:';
        $output .= preg_replace('/\(|\)/','',$latlng[1]);
        $output .= ', group: ';
        $output .= "'". $category->name . "'";
        $output .= ',icon: ';
        $output .= "'" . $branch->business->logo . "'";
        $output .= ', html: {';
        $output .= 'content: ';
        $output .= "'" . $branch->business->business_description ;
        $output .= "<br/> <a href=\"company/" . $branch->business->slug . "/" . $branch->id .'">';
        $output .= "Read More</a>'";
        $output .= '}}';
        if(!$key2 == count($count2) -1 && $key == $count-1)
           $output.= ',';
     } 

  }                            
  
  $output .= ']';
  var_dump($output);

?>