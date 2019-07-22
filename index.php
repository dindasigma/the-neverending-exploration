<?php

require_once __DIR__.'/bootstrap.php';

$range_list = 'List!A2:E';
$list = read($range_list);

$range_categories = 'Categories!A2:C';
$categories = read($range_categories);

function _suffix($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

$filter = new \Twig\TwigFilter('number_with_suffix', function ($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
});

$twig->addFilter($filter);


// Render our view
$params = [
	'list' => $list, 
	'categories' => $categories,
	'assets_url' => ASSETS_URL
];
echo $twig->render('index.html', $params);