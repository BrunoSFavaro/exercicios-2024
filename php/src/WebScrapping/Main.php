<?php

namespace Chuva\Php\WebScrapping;

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
    $xpath = new \DOMXPath($dom);

    //Variáveis que irão extrair as informações do site usando XPath
    $titleX = "//a/h4[@class='paper-title']";
    $authorX = "//a/div[@class='authors']/span";
    $typeX = "//a/div[@class='tags mr-sm']";
    $idX = "//a/div[@class='tags flex-row mr-sm']/div[@class='volume-info']";
    
    print_r($data);
  }

}
