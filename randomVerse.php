<?php

$ch = curl_init();

$books = [
    1 => [
        'name' => 'Genesis',
        'size' => 50
    ],
    2 => [
        'name' => 'Exodus',
        'size' => 40
    ],
    3 => [
        'name' => 'Leviticus',
        'size' => 27
    ],
    4 => [
        'name' => 'Numbers',
        'size' => 36
    ],
    5 => [
        'name' => 'Deuteronomy',
        'size' => 34
    ],
];

$bookNum = rand(1, 5);

$book = $books[$bookNum]['name'];

$chapter = strval(rand(1, $books[$bookNum]['size']));

$verse = rand(1, 89);

curl_setopt($ch, CURLOPT_URL, "http://www.sefaria.org/api/texts/${book}.${chapter}.$verse");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);

while (strpos($data, 'ends at')) {

$books = [
    1 => [
        'name' => 'Genesis',
        'size' => 50
    ],
    2 => [
        'name' => 'Exodus',
        'size' => 40
    ],
    3 => [
        'name' => 'Leviticus',
        'size' => 27
    ],
    4 => [
        'name' => 'Numbers',
        'size' => 36
    ],
    5 => [
        'name' => 'Deuteronomy',
        'size' => 34
    ],
];

$bookNum = rand(1, 5);

$book = $books[$bookNum]['name'];

$chapter = strval(rand(1, $books[$bookNum]['size']));

$verse = rand(1, 89);

curl_setopt($ch, CURLOPT_URL, "http://www.sefaria.org/api/texts/${book}.${chapter}.$verse");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);

}

$data = json_decode($data);

$randomVerse = $data->text[$verse];

while(empty($randomVerse)) {
$verse = rand(1, 89);

curl_setopt($ch, CURLOPT_URL, "http://www.sefaria.org/api/texts/${book}.${chapter}.$verse");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);

$data = json_decode($data);

$randomVerse = $data->text[$verse];

}

echo "${book} ${chapter}:${verse} \n";

echo $randomVerse;
