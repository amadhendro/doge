<?php


$content = file_get_contents('php://input');

$data = json_decode($content);


$seed = date("is");
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://www.999doge.com/api/web.aspx");
curl_setopt($ch,CURLOPT_POST,TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,"a=PlaceAutomatedBets&s=".$data->token."&BasePayIn=1000&Low=0&High=499999&MaxBets=200&ResetOnWin=1&ResetOnLose=0&IncreaseOnWinPercent=0&IncreaseOnLosePercent=1&MaxPayIn=0&ResetOnLoseMaxBet=0&StopOnLoseMaxBet=0&StopMaxBalance=0&StopMinBalance=0&StartingPayIn=100000&Compact=1&ClientSeed=".$seed."&Currency=doge");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$result = curl_exec($ch);
curl_close($ch);
//$hasil = json_decode($result,true);  

echo $result;

?>