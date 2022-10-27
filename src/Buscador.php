<?php

namespace Busca\BuscadorDeCursos;

class Buscador
{
  private $httpClient;
  private $crawler;

  public function __construct($httpClient, $crawler)
  {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function buscar($url): array
  {
    $response = $this->httpClient->request('GET', "$url");
    $html = $response->getBody();

    $this->crawler->addHtmlContent($html);

    $elementosCursos = $this->crawler->filter('span.card-curso__nome');
    $cursos = [];

    foreach ($elementosCursos as $elemento) {
      $cursos[] = $elemento->textContent;
    }

    return $cursos;
  }
}
