<?php

class Register extends Eloquent{

	public function user(){
		return $this->belongsTo('User');
	}

	public function get_IP(){
		$ip= $_SERVER['REMOTE_ADDR'];
 
    	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	    $this->ip = $_SERVER['HTTP_CLIENT_IP'];
   		} 
    	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        	$this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    	}

    	return $ip;
    }

 }

	//var $x = document.getElementById('demo');

	//public function getLocation() {
    //	if (navigator.geolocation) {
    //	   	navigator.geolocation.getCurrentPosition(showPosition);
    //	}
    //	else {
      //  	x.innerHTML = "Geolocation is not supported by this browser.";
    	//}

    	//return x.innerHTML;
	//}

	//public function showPosition(position) {
    //	x.innerHTML = "Latitude: " + position.coords.latitude + 
   	//	"<br>Longitude: " + position.coords.longitude; 
	//}
