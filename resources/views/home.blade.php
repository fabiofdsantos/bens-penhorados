@extends('layouts.base')

@section('main')
<div class="section-colored text-center slogan-background">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 animated fadeInUp">
                <div class="slogan">
                    <h2>Encontrar bens penhorados ficou mais fácil!</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Últimas Inserções</h2>
                <hr>
            </div>
            @foreach($latest as $newItem)
            <div class="list-group-home col-xs-12 col-sm-6 col-md-3">
                <a class="list-group-item" href="../{{ $newItem['categorySlug'] }}/{{ $newItem['itemSlug'] }}">
                    <img class="img-responsive" alt="{{ $newItem['title'] }}" src="../images/{{ $newItem['image'] != null ? $newItem['image'] : 'empty.jpg' }}">
                    <div class="caption text-center">
                        <h3>{{ $newItem['title'] }}</h3>
                        <p>
                            <strong>{{ $newItem['price'] ? 'Valor base: '.number_format($newItem['price']).'€' : 'À melhor oferta' }}</strong>
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="section-colored">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>A terminar o limite para propostas</h2>
                <hr>
            </div>
            @foreach($endingSoon as $endingItem)
            <div class="list-group-home col-xs-12 col-sm-6 col-md-3">
                <a class="list-group-item" href="../{{ $endingItem['categorySlug'] }}/{{ $endingItem['itemSlug'] }}">
                    <img class="img-responsive" alt="{{ $endingItem['title'] }}" src="../images/{{ $endingItem['image'] != null ? $endingItem['image'] : 'empty.jpg'}}">
                    <div class="caption text-center">
                        <h3>{{ $endingItem['title'] }}</h3>
                        <p>
                            <strong>{{ $endingItem['price'] ? 'Valor base: '.number_format($endingItem['price']).'€' : 'À melhor oferta' }}</strong>
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop
