<?php

function file_get_contents_curl($url) {
    $ch = curl_init();// curl 리소스를 초기화
    curl_setopt($ch, CURLOPT_URL, $url); // url을 설정
    // 헤더는 제외하고 content 만 받음
    curl_setopt($ch, CURLOPT_HEADER, 0);
    // 응답 값을 브라우저에 표시하지 말고 값을 리턴
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    curl_close($ch);// 리소스 해제를 위해 세션 연결 닫음
    return $data;
}


$url = "http://www.kma.go.kr/wid/queryDFS.jsp?gridx=57&gridy=125";

$xml_string = file_get_contents_curl($url);

$xml = simplexml_load_string($xml_string);

$json = json_encode($xml); // XML to JSON

$R = json_decode($json,TRUE);//배열로 변환



//print_r($R);

//echo '<br />';

//echo '<br />';

//echo $R['header']['tm'].'<br />';//날씨 예보시간

$wData = $R['body']['data'][7];

//print_r($wData);

//echo '<br />';

//echo '<br />';

//echo $wData['hour'].'시 최저온도 : ' . $wData['tmn'] . ' 최고온도 : ' . $wData['tmx'] . 
			' 온도 : ' . $wData['temp'] . ' 날씨 : ' . $wData['wfKor'];



foreach($R['body']['data'] as $wData){

    //echo $wData['hour'].'시 온도:'.$wData['temp'].' 날씨:'.$wData['wfKor'];

    //echo '<br />';

}

?>