<?php
include "weather_xml.php";

//18시 기상정보
$wData = $R['body']['data'][7];
//기상 날짜
$time = $R['header']['tm'];
$year = substr($time,0,4);
$month = substr($time, 4,2);
$day = substr($time, 6,2);
$hour = $wData['hour'];

echo $year . "년 " . $month . "월 " . $day . "일 " . $hour . "시 <br>";

echo "<br>";

echo '최저온도 : ' . $wData['tmn'] . ' 최고온도 : ' . $wData['tmx'] . 
' 온도 : ' . $wData['temp'] . ' 날씨 : ' . $wData['wfKor'];
  

?>
