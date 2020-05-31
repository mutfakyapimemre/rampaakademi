<?php
	// SEF LINK METHODU
	function sef ($arg)
	{
		$replaceCharter = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
		$newCharter 	= array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', '-', '-');
		$arg 			= strtolower(str_replace($replaceCharter, $newCharter, $arg));
		$arg 			= preg_replace('@[^A-Za-z0-9\-_\.\+]@i', ' ', $arg);
		$arg 			= trim(preg_replace('/\s+/', ' ', $arg));
		$arg 			= str_replace('.', '', $arg);
		$arg 			= str_replace(' ', '-', $arg);
		$arg 			= str_replace('_', '-', $arg);
		return $arg;
	}