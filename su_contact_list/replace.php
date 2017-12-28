<?php

	function name($i){
		$filename = "./admin/names.txt";
		$file_path = fopen($filename, 'r'); 

		if ($file_path)
		{
		   	$array = explode("\n", fread($file_path, filesize($filename)));
		}
		return $array[$i];
	}

	function no($i){
		$filename = "./admin/numbers.txt";
		$file_path = fopen($filename, 'r'); 

		if ($file_path)
		{
		   	$array = explode("\n", fread($file_path, filesize($filename)));
		}
		return $array[$i];
	}

	function email($i){
		$filename = "./admin/email.txt";
		$file_path = fopen($filename, 'r'); 

		if ($file_path)
		{
		   	$array = explode("\n", fread($file_path, filesize($filename)));
		}
		return $array[$i];
	}

	function replacename($string,$name){
		$filename = "./admin/names.txt";
		$size = filesize($filename);
		$str=file_get_contents($filename);
		$str=str_replace($name, $string,$str);
		file_put_contents($filename, $str);
	}
	function replaceno($string,$name){
		$filename = "./admin/numbers.txt";
		$size = filesize($filename);
		$str=file_get_contents($filename);
		$str=str_replace($name, $string,$str);
		file_put_contents($filename, $str);
	}
	function replaceemail($string,$name){
		$filename = "./admin/email.txt";
		$size = filesize($filename);
		$str=file_get_contents($filename);
		$str=str_replace($name, $string,$str);
		file_put_contents($filename, $str);
	}

?>