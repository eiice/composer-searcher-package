<?php

namespace Search\CoursesSearch;

class Searcher
{
  private $httpClient;
  private $crawler;

  public function __construct($httpClient, $crawler)
  {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function search($url): array
  {
    $response = $this->httpClient->request('GET', "$url");
    $html = $response->getBody();

    $this->crawler->addHtmlContent($html);

    $coursesElements = $this->crawler->filter('span.card-curso__nome');
    $courses = [];

    foreach ($coursesElements as $element) {
      $courses[] = $element->textContent;
    }

    return $courses;
  }
}
