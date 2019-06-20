@extends('layouts.base')

@section('main')
<div class="section">
        <h1 class="page-header">{{ $generic['title'] }}</h1>
        <div class="row" style="margin-bottom: 15px">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <strong>Valor base de venda:</strong>
                        </div>
                        <div class="item-price row">
                            <span>{{ $generic['price']['value'] ? number_format($generic['price']['value']).'€' : 'À melhor oferta' }}</span>
                            @if($generic['price']['vat'])
                            <span> - Incl. {{ $generic['price']['vat'] }}% (IVA)</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="item-general-details well">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <p class="small">
                                <strong>Estado da venda: </strong>
                                <span style="color:{{ $generic['status'] === 'Em curso' ? 'green' : 'red' }};">{{ $generic['status'] }}</span>
                            </p>
                            <p class="small">
                                <strong>Localização: </strong>
                                <span>{{ $generic['location'] }}</span>
                                @if(isset($generic['locationOnDesc']))
                                <span style="color: #00008B;"> (c/ base no serv. de finanças)</span>
                                @endif
                            </p>
                            <p class="small">
                                <strong>Modalidade: </strong>
                                <span>{{ $generic['purchaseType'] }}</span>
                            </p>
                            <p class="small">
                                <strong>Código da venda: </strong>
                                <span>{{ $generic['code'] }}</span>
                            </p>
                            <p class="small">
                                <strong>Serviço de finanças: </strong>
                                <span>{{ $generic['taxOffice'] }}</span>
                            </p>
                            <br />
                            <small>Apresentação de propostas até {{ $generic['dates']['acceptanceDt'] }}</small>
                            <br />
                            <small>Examinação do bem de {{ $generic['dates']['previewDtStart'] }}</small>
                            <small>até {{ $generic['dates']['previewDtEnd'] }}</small>
                            <br />
                            <small>Abertura de propostas em {{ $generic['dates']['openingDt'] }}</small>
                        </div>
                    </div>
                </div>
                @if($generic['status'] == 'Em curso')
                    @if($generic['purchaseType'] == 'Leilão eletrónico')
                    <div class="item-buttons text-center">
                        <div class="col-xs-12 col-sm-12">
                            <a class="btn btn-primary" target="_blank" rel="nofollow" href="https://www.portaldasfinancas.gov.pt/pt/main.jsp?body=/external/sigveclel/detalheLeilao.htm&codigoLeilao={{ $generic['taxOfficeId']}}.{{ $generic['year'] }}.{{ $generic['extId'] }}" role="button">
                                <i class="glyphicon glyphicon-new-window"></i> Entrar no leilão eletrónico
                            </a>
                        </div>
                    </div>
                    @else
                    <div class="item-buttons text-center">
                        <div class="col-xs-12 col-sm-12">
                            <a class="btn btn-primary" target="_blank" rel="nofollow" href="https://vendas.portaldasfinancas.gov.pt/bens/entregaPropostaForm.action?idVenda={{ $generic['extId'] }}&sf={{ $generic['taxOfficeId']}}&ano={{ $generic['year'] }}&popup=false" role="button">
                                <i class="glyphicon glyphicon-new-window"></i> Entregar proposta
                            </a>
                        </div>
                    </div>
                    @endif
                @endif
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 show-grid">
                <div style="max-width: 100%;" class="text-center">
                    @if(empty($generic['images']))
                        <!-- Bens Penhorados - Item with no images -->
                        <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:250px"
                         data-ad-client="ca-pub-1654487041005723"
                         data-ad-slot="8445891626"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    @else
                        <carousel interval="2000">
                            @foreach($generic['images'] as $image)
                            <slide>
                                <img src="../images/{{ $image }}" style="margin:auto;">
                            </slide>
                            @endforeach
                        </carousel>
                    @endif
                </div>
            </div>
        </div>

        @if(!empty($generic['images']))
        <div class="row" style="margin-bottom:15px;">
            <div class="col-md-12 col-xs-12">
                <!-- Bens Penhorados - Above item details -->
                <ins class="adsbygoogle"
                     style="display:block;width:100%;height:90px;"
                     data-ad-client="ca-pub-1654487041005723"
                     data-ad-slot="2818160424"
                     data-ad-format="rectangle, horizontal"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <h4>Detalhes</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        @yield('item-details')
                    </tbody>
                </table>
            </div>
            <div class="col-md-9">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <h4>Descrição</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                        @if($generic['description'])
                        <tr>
                            <td>
                                {{ $generic['description'] }}
                            </td>
                        </tr>
                        <tr>
                            <td><!-- Bens Penhorados - Links -->
                                <ins class="adsbygoogle"
                                     style="display:block;height:15px;"
                                     data-ad-client="ca-pub-1654487041005723"
                                     data-ad-slot="2538958820"
                                     data-ad-format="link"></ins>
                                <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.0/ui-bootstrap-tpls.min.js"></script>

<script type="text/javascript">
angular.module('bens-penhorados', ['ui.bootstrap']);
</script>
@stop
