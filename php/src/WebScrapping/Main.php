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

    // Declaração do objeto da biblioteca OpenSpout 
    $writer = new Writer();

    $writer->openToFile(__DIR__ . '/../../assets/scrappedPaper.xlsx');

    // Criando o cabeçalho da tabela 
    $header = [
      Cell::fromValue('ID'),
      Cell::fromValue('Title'),
      Cell::fromValue('Type'),
      Cell::fromValue('Author 1'),
      Cell::fromValue('Author 1 Institution'),
      Cell::fromValue('Author 2'),
      Cell::fromValue('Author 2 Institution'),
      Cell::fromValue('Author 3'),
      Cell::fromValue('Author 3 Institution'),
      Cell::fromValue('Author 4'),
      Cell::fromValue('Author 4 Institution'),
      Cell::fromValue('Author 5'),
      Cell::fromValue('Author 5 Institution'),
      Cell::fromValue('Author 6'),
      Cell::fromValue('Author 6 Institution'),
      Cell::fromValue('Author 7'),
      Cell::fromValue('Author 7 Institution'),
      Cell::fromValue('Author 8'),
      Cell::fromValue('Author 8 Institution'),
      Cell::fromValue('Author 9'),
      Cell::fromValue('Author 9 Institution'),
      Cell::fromValue('Author 10'),
      Cell::fromValue('Author 10 Institution'),
      Cell::fromValue('Author 11'),
      Cell::fromValue('Author 11 Institution'),
      Cell::fromValue('Author 12'),
      Cell::fromValue('Author 12 Institution'),
      Cell::fromValue('Author 13'),
      Cell::fromValue('Author 13 Institution'),
      Cell::fromValue('Author 14'),
      Cell::fromValue('Author 14 Institution'),
      Cell::fromValue('Author 15'),
      Cell::fromValue('Author 15 Institution'),
      Cell::fromValue('Author 16'),
      Cell::fromValue('Author 16 Institution'),
      Cell::fromValue('Author 17'),
      Cell::fromValue('Author 17 Institution'),
      Cell::fromValue('Author 18'),
      Cell::fromValue('Author 18 Institution'),
      Cell::fromValue('Author 19'),
      Cell::fromValue('Author 19 Institution'),
      Cell::fromValue('Author 20'),
      Cell::fromValue('Author 20 Institution'),
      Cell::fromValue('Author 21'),
      Cell::fromValue('Author 21 Institution'),
      Cell::fromValue('Author 22'),
      Cell::fromValue('Author 22 Institution'),
      Cell::fromValue('Author 23'),
      Cell::fromValue('Author 23 Institution'),
      Cell::fromValue('Author 24'),
      Cell::fromValue('Author 24 Institution'),
      Cell::fromValue('Author 25'),
      Cell::fromValue('Author 25 Institution'),
    ];



    // Write your logic to save the output file bellow.
    }

  }
