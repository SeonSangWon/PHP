<?php
include "weather_xml.php";

//[현재시각 기준]금일 날짜의 최저기온과 최고기온 구하기

//현재 시각의 온도
$wData = $R['body']['data'][0];
$temp = $wData['temp'];

for($i=0; $i<18; $i++)
{
	//순차대로 온도를 temp2에 할당
	$wData2 = $R['body']['data'][$i];
	$temp2 = $wData2['temp'];
	$day = $wData2['day'];
	
	//현재 시각 ~ 24시 정각
	if($day == 0)
	{
		if($i == 0)
		{
			//현재 온도를 $maxTemp와 $minTemp에 할당
			$maxTemp = $temp2;
			$minTemp = $temp2;
		}
		else
		{
			//ex) 15 > 10
			if($temp2 > $maxTemp)
			{
				$maxTemp = $temp2;
			}
			//ex) 5 > 10
			if($temp2 < $minTemp)
			{
				$minTemp = $temp2;
			}
		}
	}
}
echo "금일의 최저 온도는 " . $minTemp . "도 입니다.<br>";
echo "금일의 최고 온도는 " . $maxTemp . "도 입니다.<br>";
echo "현재 온도는 " . $temp . "도 입니다.<br>";
?>
