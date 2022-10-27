<?php

require 'vendor/autoload.php';

use Search\CoursesSearch\Searcher;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

// Teste::method();
// exit();

$client = new Client(['base_uri' => 'https://alura.com.br/']);
$crawler = new Crawler();

$searcher = new Searcher($client, $crawler);
$courses = $searcher->search('/cursos-online-programacao/php');

foreach ($courses as $course) {
  echo $course . PHP_EOL;
}
