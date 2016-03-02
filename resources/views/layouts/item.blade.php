@extends('layouts.base')

@section('main')
<div class="section">
    <div class="container">
        <h1 class="page-header">{{ $generic['title'] }}</h1>
        <div class="row" style="margin-bottom: 15px">
            <div class="col-md-6 show-grid">
                <div style="max-width: 100%">
                    @if(empty($generic['images']))
                    <img src="../images/empty.jpg" style="margin:auto; max-width: 100%">
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
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="row">
                            <strong>Preço base de venda:</strong>
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
            </div>
            <div class="item-buttons col-md-6 text-center">
                <div class="col-xs-12 col-sm-12">
                    <a class="btn btn-primary" target="_blank" rel="nofollow" href="{{ $generic['code'] }}" role="button">
                        <i class="glyphicon glyphicon-new-window"></i> Ver anúncio original
                    </a>
                </div>
            </div>
        </div>
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
                            <td>{{ $generic['description'] }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                @if($generic['depositary']['phone'] || $generic['depositary']['email'] || $generic['mediator']['name'] || $generic['mediator']['email'])
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th colspan="4">
                                    <h4>Contactos</h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                            @if($generic['depositary']['name'])
                            <tr>
                                <th scope="row">Fiel depositário</th>
                                <td>
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>{{ $generic['depositary']['name'] }}</span>
                                </td>
                                <td>
                                    <i class="glyphicon glyphicon-phone"></i>
                                    <span> {{ $generic['depositary']['phone'] or 'Telefone indisponível' }}</span>
                                </td>
                                <td>
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    @if($generic['depositary']['email'])
                                    <a href="mailto:{{ $generic['depositary']['email'] }}" target="_blank">Enviar email</a>
                                    @else
                                    <span>Email indisponível</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                            @if($generic['mediator']['name'])
                            <tr>
                                <th scope="row">Mediador</th>
                                <td>
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>{{ $generic['mediator']['name'] }}</span>
                                </td>
                                <td>
                                    <i class="glyphicon glyphicon-phone"></i>
                                    <span>{{ $generic['mediator']['phone'] or 'Telefone indisponível' }}</span>
                                </td>
                                <td>
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    @if($generic['mediator']['email'])
                                    <a href="mailto:{{ $generic['mediator']['email'] }}" target="_blank">Enviar email</a>
                                    @else
                                    <span>Email indisponível</span>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop