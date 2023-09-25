<?php
$phn = $_REQUEST["phone"];
$sms = $_REQUEST["text"];
$url = "https://api.osudpotro.com/api/v1/users/send_otp";

// Coding- Ahad Your Dad

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36",
   "Origin: https://api.swap.com.bd",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Sms & Call Boomber Api Set


$data = array(
    "mobile" => $phn,
    "deviceToken" => "web",
    "language" => $sms,
    "os" => "web"
);
// {"mobile":"+88-01614399996","deviceToken":"web","language":"en","os":"web"}

$data = json_encode($data);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>
