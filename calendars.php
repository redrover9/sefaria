<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.sefaria.org/api/calendars/?timezone=America/Vancouver&custom=ashkenazi");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);

$array = json_decode($data, true);                    
$parashah = $array['calendar_items'][0]['displayValue']['en'];
$aliyot = $array['calendar_items'][0]['extraDetails']['aliyot'];
$haftarah = $array['calendar_items'][1]['displayValue']['en'];

echo "<h2>Parashah</h2>";
echo $parashah;
echo "<br>";

echo "<h2>Aliyot</h2>";

$day = 'Sun '; 

foreach ($aliyot as $i) {
    if ($day != 'Sun') {
        echo $day . " " . $i;
    }
        $day = date('D',strtotime($day.'+1 day'));
        echo '<br>';
}
echo "<br>";

echo "<h2>Haftarah</h2>";
echo $haftarah;
echo "<br>";
