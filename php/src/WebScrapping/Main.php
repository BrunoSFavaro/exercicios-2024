<?php

namespace Chuva\Php\WebScrapping;

use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Writer\XLSX\Writer;

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

    // Declaração do objeto da biblioteca OpenSpout.
    $writer = new Writer();

    $writer->openToFile(__DIR__ . '/../../assets/scrappedPaper.xlsx');

    // Criando o cabeçalho da tabela.
    $header = [
      Cell::fromValue("ID"),
      Cell::fromValue("Title"),
      Cell::fromValue("Type"),
      Cell::fromValue("Author 1"),
      Cell::fromValue("Author 1's Institution"),
      Cell::fromValue("Author 2"),
      Cell::fromValue("Author 2's Institution"),
      Cell::fromValue("Author 3"),
      Cell::fromValue("Author 3's Institution"),
      Cell::fromValue("Author 4"),
      Cell::fromValue("Author 4's Institution"),
      Cell::fromValue("Author 5"),
      Cell::fromValue("Author 5's Institution"),
      Cell::fromValue("Author 6"),
      Cell::fromValue("Author 6's Institution"),
      Cell::fromValue("Author 7"),
      Cell::fromValue("Author 7's Institution"),
      Cell::fromValue("Author 8"),
      Cell::fromValue("Author 8's Institution"),
      Cell::fromValue("Author 9"),
      Cell::fromValue("Author 9's Institution"),
      Cell::fromValue("Author 10"),
      Cell::fromValue("Author 10's Institution"),
      Cell::fromValue("Author 11"),
      Cell::fromValue("Author 11's Institution"),
      Cell::fromValue("Author 12"),
      Cell::fromValue("Author 12's Institution"),
      Cell::fromValue("Author 13"),
      Cell::fromValue("Author 13's Institution"),
      Cell::fromValue("Author 14"),
      Cell::fromValue("Author 14's Institution"),
      Cell::fromValue("Author 15"),
      Cell::fromValue("Author 15's Institution"),
      Cell::fromValue("Author 16"),
      Cell::fromValue("Author 16's Institution"),
      Cell::fromValue("Author 17"),
      Cell::fromValue("Author 17's Institution"),
      Cell::fromValue("Author 18"),
      Cell::fromValue("Author 18's Institution"),
      Cell::fromValue("Author 19"),
      Cell::fromValue("Author 19's Institution"),
      Cell::fromValue("Author 20"),
      Cell::fromValue("Author 20's Institution"),
      Cell::fromValue("Author 21"),
      Cell::fromValue("Author 21's Institution"),
      Cell::fromValue("Author 22"),
      Cell::fromValue("Author 22's Institution"),
      Cell::fromValue("Author 23"),
      Cell::fromValue("Author 23's Institution"),
      Cell::fromValue("Author 24"),
      Cell::fromValue("Author 24's Institution"),
      Cell::fromValue("Author 25"),
      Cell::fromValue("Author 25's Institution"),
    ];

    $soloRow = new Row($header);
    $writer->addRow($soloRow);

    // Adiciona uma nova linha na tabela para cada artigo.
    foreach ($data as $paper) {
      $row = new Row([
        Cell::fromValue($paper->id),
        Cell::fromValue($paper->title),
        Cell::fromValue($paper->type),
      ]);

      $authorData = [];

      // Adicionando informações no vetor de autores.
      foreach ($paper->authors as $author) {
        // Adicionando o nome do autor.
        $authorData[] = $author->name;
        // Adicionando o nome da instituição.
        $authorData[] = $author->institution;
      }

      // Combina as informações do artigo com as do autor.
      $row = new Row(array_merge($row->getCells(), array_map(fn($value) => Cell::fromValue($value), $authorData)));

      // Adiciona uma linha com todas as informações.
      $writer->addRow($row);
    }

    $writer->close();
  }

}
