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

?>