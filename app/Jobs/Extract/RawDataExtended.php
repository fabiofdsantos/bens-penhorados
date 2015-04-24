<?php namespace App\Jobs\Extract;

use Symfony\Component\DomCrawler\Crawler;
use App\Models\SourceDataObject;
use App\Models\SourceData;
use App\Jobs\Job;
use Storage;

/**
 * Description here...
 */
class RawDataExtended extends Job
{
    protected $code;
    protected $filePath;
    protected $lat;
    protected $lng;

    public function __construct($code, $filePath, $lat, $lng)
    {
        $this->code = $code;
        $this->filePath = $filePath;
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function handle()
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent(Storage::get($this->filePath));
        // verificar se esta' inactivo ou ja nao existe
        if ($crawler->filter('.info-element-title > p:nth-child(1)')->count() > 0) {
            // dupla verificação
            if ($crawler->filter('.info-element-title > p')->text() == 'Venda inexistente ou inactiva.' || $crawler->filter('.info-element-title > p')->text() == 'Venda não disponível para consulta') {
                //return 'not found';
            } else {
                /*Por motivos de ordem técnica, não é possível satisfazer o seu pedido neste momento.
                Por favor tente mais tarde.*/
                //return 'something strange happened here!';
            }
        } else {
            $item = new SourceData();
            $item->code = $this->code;

            $data = new SourceDataObject();
            $data->title = trim($crawler->filter('#tdTitulo')->text());
            $data->cat = trim($crawler->filter('th.info-table-title:nth-child(1)')->text());
            $headerDetails = $crawler->filter('#trFotoP > th:nth-child(1)');
            for ($x = 1; $x <= ($headerDetails->filter('span')->count()+5); $x++) {
                if ($headerDetails->filter('span:nth-child('.$x.')')->count()) {
                    $currentSpan = $headerDetails->filter('span:nth-child('.$x.')')->text();
                    if (preg_match('/Base de Venda/i', $currentSpan, $match)) {
                        try {
                            $data->price = trim($headerDetails->filter('span:nth-child('.($x+1).')')->text());
                        } catch (\Exception $e) {
                            $data->price = null;
                        }
                    } elseif (preg_match('/Estado da Venda/i', $currentSpan, $match)) {
                        try {
                            $data->status = trim($headerDetails->filter('span:nth-child('.($x+1).')')->text());
                        } catch (\Exception $e) {
                            $data->status = null;
                        }
                    } elseif (preg_match('/Serviço de Finanças/i', $currentSpan, $match)) {
                        try {
                            $data->taxOffice = trim($headerDetails->filter('span:nth-child('.($x+1).')')->text());
                        } catch (\Exception $e) {
                            $data->taxOffice = null;
                        }
                    } elseif (preg_match('/Modalidade/i', $currentSpan, $match)) {
                        try {
                            $data->mode = trim($headerDetails->filter('span:nth-child('.($x+1).')')->text());
                        } catch (\Exception $e) {
                            $data->mode = null;
                        }
                    } elseif (preg_match('/Motivo da Suspen/i', $currentSpan, $match)) {
                        try {
                            $data->suspReason = trim($headerDetails->filter('span:nth-child('.($x+1).')')->text());
                        } catch (\Exception $e) {
                            $data->suspReason = null;
                        }
                    }
                }
            }
            $footerDetails = $crawler->filter('#dataTable > tr:nth-child(3) > td:nth-child(1) > table:nth-child(1) > tr:nth-child(1)');
            for ($i = 1; $i <= ($footerDetails->filter('th:nth-child(1) > span')->count()+6); $i++) {
                if ($footerDetails->filter('th:nth-child(1) > span:nth-child('.$i.')')->count()) {
                    $currentSpan = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.$i.')')->text());
                    if (preg_match('/Caracter/i', $currentSpan, $match)) {
                        try {
                            $data->desc = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                        } catch (\Exception $e) {
                            $data->desc = null;
                        }
                    } elseif (preg_match('/Nome dos Executados/i', $currentSpan, $match)) {
                        try {
                            $data->owners = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                        } catch (\Exception $e) {
                            $data->owners = null;
                        }
                    } elseif (preg_match('/Fiel Deposit/i', $currentSpan, $match)) {
                        try {
                            $data->depositary = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                            $data->depositary = preg_replace('/(\\n)|(\\t)/', '', $data->depositary);
                        } catch (\Exception $e) {
                            $data->depositary = null;
                        }
                    } elseif (preg_match('/Mediador/i', $currentSpan, $match)) {
                        try {
                            $data->mediator = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                            $data->mediator = preg_replace('/(\\n)|(\\t)/', '', $data->mediator);
                        } catch (\Exception $e) {
                            $data->mediator = null;
                        }
                    } elseif (preg_match('/examinar o bem/i', $currentSpan, $match)) {
                        try {
                            $data->preview = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                        } catch (\Exception $e) {
                            $data->preview = null;
                        }
                    } elseif (preg_match('/aceitaçao das propostas/i', $currentSpan, $match)) {
                        try {
                            $data->acceptance = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                        } catch (\Exception $e) {
                            $data->acceptance = null;
                        }
                    } elseif (preg_match('/abertura das propostas/i', $currentSpan, $match)) {
                        try {
                            $data->opening = trim($footerDetails->filter('th:nth-child(1) > span:nth-child('.($i+1).')')->text());
                        } catch (\Exception $e) {
                            $data->opening = null;
                        }
                    }
                }
            }
            dd('x');
            $data->lat = $this->lat;
            $data->lng = $this->lng;
            $headerImages = $crawler->filter('#trFotoP > th:nth-child(2)');
            for ($c = 1; $c <= ($headerImages->filter('img')->count()); $c++) {
                $data->images[$c-1] = $headerImages->filter('img:nth-child('.$c.')')->attr('src');
            }
            $item->data = json_encode($data);
            $item->save();
        }
    }
}
