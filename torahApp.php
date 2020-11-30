<?php
$ch = curl_init();
$parasha = $_POST['parasha'];
$aliyah = $_POST['aliyah'];
if ($parasha == 'Bereshit' && $aliyah == '1') {
	$verses = 'Genesis.1.1-2.3';
}
elseif ($parasha == 'Bereshit' && $aliyah == '2') {
	$verses = 'Genesis.2.4-19';
}
elseif ($parasha == 'Bereshit' && $aliyah == '3') {
	$verses = 'Genesis.2.20-3.21';
}
elseif ($parasha == 'Bereshit' && $aliyah == '4') {
	$verses = 'Genesis.3.22-4.18';
}
elseif ($parasha == 'Bereshit' && $aliyah == '5') {
	$verses = 'Genesis.4.19-22';
}
elseif ($parasha == 'Bereshit' && $aliyah == '6') {
	$verses = 'Genesis.4.23-5.24';
}
elseif ($parasha == 'Bereshit' && $aliyah == '7') {
	$verses = 'Genesis.5.25-6.8';
}
elseif ($parasha == 'Noach' && $aliyah == '1') {
	$verses = 'Genesis.6.9-22';
}
elseif ($parasha == 'Noach' && $aliyah == '2') {
	$verses = 'Genesis.7.1-16';
}
elseif ($parasha == 'Noach' && $aliyah == '3') {
	$verses = 'Genesis.7.17-8.14';
}
elseif ($parasha == 'Noach' && $aliyah == '4') {
	$verses = 'Genesis.8.15-9.7';
}
elseif ($parasha == 'Noach' && $aliyah == '5') {
	$verses = 'Genesis.9.8-17';
}
elseif ($parasha == 'Noach' && $aliyah == '6') {
	$verses = 'Genesis.9.18-10.32';
}
elseif ($parasha == 'Noach' && $aliyah == '7') {
	$verses = 'Genesis.11.1-32';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '1') {
	$verses = 'Genesis.12.1-13';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '2') {
	$verses = 'Genesis.12.14-13.4';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '3') {
	$verses = 'Genesis.13.5-18';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '4') {
	$verses = 'Genesis.14.1-20';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '5') {
	$verses = 'Genesis.14.21-15.6';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '6') {
	$verses = 'Genesis.15.7-17.6';
}
elseif ($parasha == 'Lech Lecha' && $aliyah == '7') {
	$verses = 'Genesis.17.7-27';
}
echo $parasha;
echo '<br>';
echo $aliyah;
echo '<br>';
curl_setopt($ch, CURLOPT_URL, 'http://www.sefaria.org/api/texts/' . $verses . '?context=0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
$array = json_decode($data, true);
$hebrew = $array['he'];
$english = $array['text'];
function subArraysToString($ar, $sep = "<br> <br>") {
	$str = '';
	foreach ($ar as $val) {
		$str .= implode($sep, $val);
		$str .= $sep;
	}
	$str = rtrim($str, $sep);
	return $str;
}
$hebrewString = subArraysToString($hebrew);
$englishString = subArraysToString($english);
$pattern = "/-\d+$/i";
if (preg_match($pattern, $verses)) {
	$hebrewString = implode("<br> <br>", $hebrew);
	$englishString = implode("<br> <br>", $english);
}
echo'<span style="font-size: 50pt">'. $hebrewString . '</span>';
echo '<br>';
echo '<br>';
echo ('<span style="font-size: 50pt">'. $englishString . '</span>');
?>
