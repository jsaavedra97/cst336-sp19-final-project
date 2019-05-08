<?php
//step1
$cSession = curl_init();

//step2
curl_setopt($cSession,CURLOPT_URL,"https://api.pandascore.co/lol/matches/upcoming?token=401JNf8sytFd4p0cwE0lsLw3CsfW8xfWvG85vm8OdRKbPnLzVGk");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

//step3
$results = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

//step5
echo $results;

?>