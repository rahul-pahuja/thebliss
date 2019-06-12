<?php
function SendSMS($mobilenumbers,$message)
{
	$user="bcebti";
	$password="909938537";
	$senderid="SUNSFT";
	$url=	"http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp";
	$message = urlencode($message);
	$ch = curl_init();
	if (!$ch){die("Couldn't initialize a cURL handle");}
	$ret = curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt ($ch, CURLOPT_POSTFIELDS,
	"username=$user&password=$password&sendername=$senderid&mobileno=$mobilenumbers&message=$message");
	$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$curlresponse = curl_exec($ch);
	if(curl_errno($ch))
	echo "";
	if (empty($ret)) 
		{
			curl_close($ch);
		} 
	else 
		{
			$info = curl_getinfo($ch);
			curl_close($ch); // close cURL handler
			return $curlresponse; 
		}
}
?>