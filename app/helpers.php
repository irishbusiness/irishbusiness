<?php


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









?>