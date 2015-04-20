<?php namespace App\Models;

class SourceDataObject
{
    public $title;          // ex: tipologia
    public $cat;            // categoria
    public $price;          // preco base
    public $status;         // estado da venda
    public $suspReason;     // motivo da suspensão
    public $taxOffice;      // serviço de finanças
    public $mode;           // modalidade
    public $desc;           // caracteristicas
    public $images;         // imagens
    public $lat;            // latitude
    public $lng;            // longitude
    public $owners;         // nome dos executados
    public $depositary;     // nome do depositário
    public $mediator;       // nome do mediador
    public $preview;        // local, data e horas limite para examinar o bem
    public $acceptance;     // data e hora limites para aceitação das propostas
    public $opening;        // local, data e horas para abertura das propostas
}
