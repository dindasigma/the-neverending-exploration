<?php
require_once __DIR__.'/bootstrap.php';

$range_list = 'List!A2:E';
$list = read($range_list);

$range_categories = 'Categories!A2:D';
$categories = read($range_categories);

$title = read('Meta!B1');
$description = read('Meta!B2');
$url = read('Meta!B3');
$about = read('Meta!B4');

$meta = [
  'title' => $title[0][0],
  'description' => $description[0][0],
  'url' => $url[0][0],
  'about' => $about[0][0]
];

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
  'list' => array_reverse($list), 
  'categories' => $categories,
  'meta' => $meta,
  'assets_url' => ASSETS_URL,
  'application_name' => APPLICATION_NAME
];
echo $twig->render('index.html', $params);