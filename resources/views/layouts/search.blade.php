@extends('layouts.base')

@section('main')
<div class="row">
  <div class="col-md-12 col-xs-12 text-center" style="margin-bottom:15px;">
    <!-- Bens Penhorados - Links -->
    <ins class="adsbygoogle"
         style="display:block;height:25px;"
         data-ad-client="ca-pub-1654487041005723"
         data-ad-slot="2538958820"
         data-ad-format="link"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
</div>
<div class="section" data-ng-controller="SearchCtrl">
        <h1 class="page-header">{{ $title }}</h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">

                <div class="panel panel-default">
                    <div class="panel-heading">Pesquisa genérica</div>
                    <div class="panel-body form-horizontal">
                        <div type="info" data-ng-hide="alerts.hideGenericFilterAlert" class="alert ng-isolate-scope alert-info alert-dismissable" role="alert">
                            <button type="button" class="close" ng-click="closeAlert('generic')">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Fechar</span>
                            </button>
                            <div>
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                <span class="sr-only">Aviso</span>
                                <small>A pesquisa por localização pode ser baseada no serviço de finanças adstrito ao bem penhorado.</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="search-query" class="col-sm-4 control-label">Palavras-chave</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="{{ $keyword_search_ex }}" name="search-term" ng-model="filters.searchQuery" ng-model-options="{ debounce: 1000 }" data-focus-if="filters.searchQuery">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="district" class="col-sm-4 control-label">Distrito</label>
                            <div class="col-sm-8">
                                <select data-ng-disabled="!filteringAttr.generic.districts" class="form-control" data-ng-model="filters.district" data-ng-options="key as value for (key , value) in filteringAttr.generic.districts">
                                    <option value="">-- Todos os distritos --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="municipality" class="col-sm-4 control-label">Concelho</label>
                            <div class="col-sm-8">
                                <select data-ng-disabled="!filteringAttr.generic.municipalities" class="form-control" data-ng-model="filters.municipality" data-ng-options="key as value for (key , value) in filteringAttr.generic.municipalities">
                                    <option value="">-- Todos os concelhos --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="purchaseType" class="col-sm-4 control-label">Modalidade</label>
                            <div class="col-sm-8">
                                <select data-ng-disabled="!filteringAttr.generic.purchaseTypes" class="form-control" data-ng-model="filters.purchaseType" data-ng-options="key as value for (key , value) in filteringAttr.generic.purchaseTypes">
                                    <option value="">-- Todos as modalidades --</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-sm-4 control-label">Valor</label>
                            <div class="col-sm-8">
                                <div class="form-inline input-group">
                                    <select class="form-control" data-ng-disabled="filters.noPrice" data-ng-model="filters.minPrice" data-ng-options="n as (n|currency:'€':0) for n in priceRange">
                                        <option value="">Min.</option>
                                    </select>
                                    <span class="input-group-addon">até</span>
                                    <select class="form-control" data-ng-disabled="filters.noPrice" data-ng-model="filters.maxPrice" data-ng-options="n as (n|currency:'€':0) for n in priceRange">
                                        <option value="">Máx.</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ignore" class="col-sm-4 control-label">Ver apenas</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="nosuspended" data-ng-checked="filters.ignoreSuspended" data-ng-model="filters.ignoreSuspended" data-ng-true-value="1" data-ng-false-value="undefined"> Vendas em curso
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="withimages" data-ng-checked="filters.withImages" data-ng-model="filters.withImages" data-ng-true-value="1" data-ng-false-value="undefined"> Anúncios com imagens
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="noprice" data-ng-checked="filters.noPrice" data-ng-model="filters.noPrice" data-ng-true-value="1" data-ng-false-value="undefined"> Sem valor base
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-default" data-ng-click="resetGenericFilters()">Limpar filtros</button>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('advanced-search')

                <!-- Bens Penhorados - Sidebar -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1654487041005723"
                     data-ad-slot="5492425229"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="col-xs-12 col-sm-12 as-table results-head">
                    <div>
                        <span data-ng-bind="result.from || 0"></span>
                        <span>-</span>
                        <span data-ng-bind="result.to || 0"></span> de
                        <span data-ng-bind="result.total || 0"></span> {{ $category_lc }} encontrados
                    </div>
                    <div class="text-right" style="width:100%;">Ver p/página:</div>
                    <div>
                        <select class="form-control" data-ng-options="number for number in itemsPerPageValues" data-ng-model="itemsPerPage"></select>
                    </div>
                </div>

                <div class="row" data-ng-hide="noResults || result.items.length">
                    <div class="col-xs-12 col-sm-12">
                        <div class="bs-callout bs-callout-info" id="callout-inline-form-width">
                            <h4>Aguarde um pouco...</h4>
                            <p>Estamos a pesquisar {{ $category_lc }} na nossa base de dados.</p>
                        </div>
                    </div>
                </div>

                <div class="row" data-ng-show="noResults">
                    <div class="col-xs-12 col-sm-12">
                        <div class="bs-callout bs-callout-warning" id="callout-inline-form-width">
                            <h4>Ooops...</h4>
                            <p>Não foram encontrados {{ $category_lc }} com base nos critérios de pesquisa.</p>
                        </div>
                    </div>
                </div>

                <div class="row list-group" data-ng-show="result.items.length" dir-paginate="item in result.items | itemsPerPage : itemsPerPage" total-items="result.total" current-page="pagination.current">
                    <div class="col-xs-12 col-sm-12">
                        <a class="list-group-item col-xs-12 col-sm-12" data-ng-href="../{{ $category_slug }}/[[- item.slug -]]">
                            <div class="results-image col-xs-12 col-sm-3 text-center">
                                <img class="img-responsive img-thumbnail" alt="[[- item.image != null ? item.title : 'Sem imagem' -]]" data-ng-src="../images/[[- item.image != null ? item.image : 'empty.jpg' -]]">
                            </div>
                            <div class="col-xs-12 col-sm-6 results-description">
                                <h2 data-ng-bind="item.title"></h2>
                                <p class="small">
                                    <i class="glyphicon glyphicon-asterisk"></i>
                                    <span data-ng-bind="item.status" data-ng-style="item.status == 'Em curso' ? {'color':'green'} : (item.status == 'Suspenso' ? {'color':'red'} : {'color':'blue'})"></span>
                                </p>
                                <p class="small">
                                    <i class="glyphicon glyphicon-map-marker"></i>
                                    <span data-ng-bind="item.location"></span>
                                </p>
                                <p class="small">
                                    <i class="glyphicon glyphicon-credit-card"></i>
                                    <span data-ng-bind="item.purchaseType"></span>
                                </p>
                            </div>
                            <div class="results-price col-xs-12 col-sm-3">
                                <div>
                                    <strong>Valor base de venda:</strong><br />
                                    <span data-ng-bind="item.price ? (item.price | currency:'€':0) : 'À melhor oferta'"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="text-center">
                    <dir-pagination-controls on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
                </div>
            </div>
        </div>
</div>
@stop
