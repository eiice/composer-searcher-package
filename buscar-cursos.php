<?php

require 'vendor/autoload.php';

use Busca\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

// Teste::metodo();
// exit();

$client = new Client(['base_uri' => 'https://alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
  echo $curso . PHP_EOL;
}
