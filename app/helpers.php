<?php


function isEmpty($search)
{
	if(trim($search)!='') 
	{	
		return  '/' . $search;
	} 
	return '';
}









?>