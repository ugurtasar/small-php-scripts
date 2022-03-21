<?php
#thanks to ozanerturk
#this script lists corona data for last day in turkey

$source = file_get_contents('https://raw.githubusercontent.com/ozanerturk/covid19-turkey-api/master/dataset/timeline.json');
$data=json_decode($source, true);
$today = date('d/m/Y');
$yesterday = date('d/m/Y', strtotime("-1 days"));

//var_dump($source);

foreach (array_reverse($data) as $key=>$value) {
    if ($key == $today or $key == $yesterday) {
        echo 'test sayısı: '.number_format($value['tests'], 0, ',', '.').'<br>';
        echo 'hasta sayısı: '.number_format($value['patients'], 0, ',', '.').'<br>';
        echo 'vefat sayısı: '.number_format($value['deaths'], 0, ',', '.').'<br>';
        echo 'iyileşen sayısı: '.number_format($value['recovered'], 0, ',', '.').'<br>';
    }
}
?>
