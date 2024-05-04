<?php

namespace Chuva\Php\WebScrapping;
use Chuva\Php\WebScrapping\Entity\Paper;
use Person;

/**
 * Runner for the Webscrapping exercice.
 */
class Main {

  /**
   * Main runner, instantiates a Scrapper and runs.
   */
  public static function run(): void {
    $dom = new \DOMDocument('1.0', 'utf-8');
    $dom->loadHTMLFile(__DIR__ . '/../../assets/origin.html');

    $data = (new Scrapper())->scrap($dom);

    // Write your logic to save the output file bellow.
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
      }
    }

  }
