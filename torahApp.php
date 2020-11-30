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
