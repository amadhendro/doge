<?php 

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://www.999doge.com/api/web.aspx");
curl_setopt($ch,CURLOPT_POST,TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,"a=Login&Key=7d2e5770ab464c59a62704e5e36e8e99&Username=puguh168&Password=puguh789&Totp=''");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$result = curl_exec($ch); 
curl_close($ch);
echo $result;

// $hasil = json_decode($result,true);
// $balance1 = $hasil['Doge']['Balance'];
// $balance2 = substr("$balance1", -8);
// $balance3 = ($balance1 - $balance2);
// $balance4 = $balance3 * 0.00000001;
// $balance = $balance4.".".$balance2;

?>