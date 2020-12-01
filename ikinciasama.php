<?php 
function GetIP(){
  if(getenv("HTTP_CLIENT_IP")) {
    $ip = getenv("HTTP_CLIENT_IP");
  } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    if (strstr($ip, ',')) {
      $tmp = explode (',', $ip);
      $ip = trim($tmp[0]);
    }
  } else {
    $ip = getenv("REMOTE_ADDR");
  }
  return $ip;
}
$invoiceId=$_POST["invoiceId"];
$amount=$_POST["amount"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$cardNumber=$_POST["cardNumber"];	
$expmonth=$_POST["expmonth"];	
$expyear=$_POST["expyear"];	
$cardCvv=$_POST["cardCvv"];	
 $ip_adresi = GetIP();

	// Paymes API inputları
	$data = array(
		"secret" => "",
		"operationId" => $invoiceId,
		"number" => $cardNumber,
		"installmentsNumber" => 1,
		"expiryMonth" => $expmonth,
		"expiryYear" => $expyear, 
		"cvv" => $cardCvv,
		"owner" => $firstname . " " . $lastname,
		"billingFirstname" => $firstname,
		"billingLastname" => $lastname,
		"billingEmail" =>"ihsan@incyazilim.com",
		"billingPhone" => "1",
		"billingCountrycode" => "TR",
		"billingAddressline1" => "ADRES DETAYLARI ILE ILGILI FALAN FILAN",
		"billingCity" => "ANKARA",
		"deliveryFirstname" => $firstname,
		"deliveryLastname" => $lastname,
		"deliveryPhone" => $phone,
		"deliveryAddressline1" =>"ADRES DETAYLARI ILE ILGILI FALAN FILAN",
		"deliveryCity" => "ANKARA",
		"clientIp" => $ip_adresi,
		"productName" => "eğitim",
		"productSku" => $invoiceId,
		"productQuantity" => 1,
		"productPrice" => $amount,
		"currency" => "TL",
	);

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://web.paym.es/api/authorize",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => false,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POST => "1",
		CURLOPT_POSTFIELDS => http_build_query($data),
		CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		),
	));

	$response = curl_exec($curl);
	curl_close($curl);

	$response = json_decode($response, true);

	if ($response['status'] == "ERROR" || $response['code'] != "200") { 
		echo 'declined';
	}
	else if ($response['status'] == "SUCCESS") {
		if ($response['message'] == '3DS Enrolled Card.') {
			$url = $response['paymentResult']['url'];
			if (!empty($url)) {
				  
				$htmlOutput = '<form name="downloadForm" method="post" action="' . $url . '">';
				$htmlOutput .= '<input type="submit" value="YÖNLENDİRİLİYORSUNUZ LÜTFEN BEKLEYİNİZ" />';
				$htmlOutput .= '</form>';

				echo $htmlOutput;
				
?>
 <SCRIPT LANGUAGE="Javascript" >
		document.downloadForm.submit();
	</SCRIPT> 
<?php
			} else { 
				echo 'declined';
			}
		} else if ($response['message'] == 'Authorized') { 
			echo 'success';
		}
	}
	?>
