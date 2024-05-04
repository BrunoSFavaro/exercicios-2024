<?php

namespace Chuva\Php\WebScrapping;

use Chuva\Php\WebScrapping\Entity\Paper;
use Chuva\Php\WebScrapping\Entity\Person;

/**
 * Does the scrapping of a webpage.
 */
class Scrapper {

  /**
   * Loads paper information from the HTML and returns the array with the data.
   */
  public function scrap(\DOMDocument $dom): array {
    $xPath = new \DOMXPath($dom);

    //Variáveis que irão extrair as informações do site usando XPath
    $paperX = "//a[#class='paper-card p-lg bd-gradient-left']";
    $titleX = ".//h4[@class='paper-title']";
    $authorX = ".//div[@class='authors']/span";
    $typeX = ".//div[@class='tags mr-sm']";
    $idX = ".//div[@class='tags flex-row mr-sm']/div[@class='volume-info']";

    // Juntando os dados dos diferentes arquivos
    $papersNodes = $xPath->query("$paperX");
    // Guardando os artigos em um vetor
    $papersList = [];

    // Foreach para percorrer cada artigo 
    foreach ($papersNodes as $paperNode) {
      $id = $xPath->query("$idX", $paperNode)->item(0)->nodeValue;
      $title = $xPath->query("$titleX", $paperNode)->item(0)->nodeValue;
      $type = $xPath->query("$typeX", $paperNode)->item(0)->nodeValue; 
      
      // Array vazia pela possibilidade de haver mais de um autor
      $authors = [];
      $authorsNodes = $xPath->query("$authorX", $paperNode);

      // Foreach para extrair os autores 
      foreach ($authorsNodes as $authorNode) {
        $author = $authorNode->nodeValue;
        $institution = $authorNode->getAttribute('title');
        
        $authors[] = new Person($author, $institution);
      }
      
      // Instânciando o objeto com as informações extraídas 
      $paper = new Paper($titleX, $authorX, $typeX, $idX);
      $paperList[] = $paper;
    }

    // Retorna as informações extraídas dos artigos 
    return $paperList;
  }

}
