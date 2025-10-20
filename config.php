<?php
	$A_HOST 	= "localhost";
	$A_UID		= "root";
	$A_PWD		= "051199";
	$A_DBS		= "prima";

	$A_CONNECT	= mysqli_connect($A_HOST,$A_UID,$A_PWD,$A_DBS);
	if(!$A_CONNECT){
		echo 'Not Connected !!';
		exit;
	}
?>
