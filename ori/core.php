<?php

$content = file_get_contents('php://input');

$data = json_decode($content);
$res_data = $data->token;

session_start();
if(!isset($_SESSION['crown']))
{
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://www.999dice.com/api/web.aspx");
curl_setopt($ch,CURLOPT_POST,TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,"a=Login&Key=7d2e5770ab464c59a62704e5e36e8e99&Username=puguh168&Password=puguh789&Totp=''");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$result = curl_exec($ch);
curl_close($ch);
$hasil = json_decode($result,true);
$balance1 = $hasil['Doge']['Balance'];
$balance2 = substr("$balance1", -8);
$balance3 = ($balance1 - $balance2);
$balance4 = $balance3 * 0.00000001;
$balance = $balance4.".".$balance2;
echo "$result<br><br>";
echo "".$hasil['SessionCookie']." | ".$hasil['Doge']['Balance']." | Balance Asli : $balance1 | $balance2 | $balance<br>";
//$nicke = "Sudah Login Yah";
$nicke = $hasil['SessionCookie'];
$_SESSION['crown'] = $nicke;
//setcookie("usNick",$nicke,time()+432000);
echo "Masuk Login<br>";
}
?>
<meta content="8" http-equiv="Refresh"> 
<?php
echo "Kode Betting ".$_SESSION['crown']."<br><br>";
$seed = date("is");
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,"https://www.999dice.com/api/web.aspx");
curl_setopt($ch,CURLOPT_POST,TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS,"a=PlaceAutomatedBets&s=".$_SESSION['crown']."&BasePayIn=1000&Low=0&High=499999&MaxBets=200&ResetOnWin=1&ResetOnLose=0&IncreaseOnWinPercent=0&IncreaseOnLosePercent=1&MaxPayIn=0&ResetOnLoseMaxBet=0&StopOnLoseMaxBet=0&StopMaxBalance=0&StopMinBalance=0&StartingPayIn=100000&Compact=1&ClientSeed=".$seed."&Currency=doge");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$result = curl_exec($ch);
curl_close($ch);
//$hasil = json_decode($result,true);
echo "$result<br><br>";
$hasil = json_decode($result,true);
$menang = $hasil['PayOut'];
$kalah = $hasil['PayIn'];
$hasil = $menang - $kalah;
$kalah1 = $hasil['PayIn'];
echo "Menang = $menang dikurangi $kalah Hasilnya $hasil Saldo $kalah1 <br>";
if ($hasil >= 1) {
	echo array("result" => TRUE, "mcode" => "Menang - ". $res_data);
} else {
	echo array("result" => FALSE, "mcode" => "Kalah - ".$res_data);
}
?>