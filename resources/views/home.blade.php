@extends('layouts.base')

@section('main')
<div class="row">
  <div class="col-md-12 col-xs-12 text-center" style="margin-bottom:15px;">
    <!-- Bens Penhorados - Links -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-1654487041005723"
         data-ad-slot="2538958820"
         data-ad-format="link"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
</div>
<div class="jumbotron">
  <div class="row">
    <div class="col-md-8">
      <h2>Leilões e Vendas de Penhoras das Finanças</h2>
      <p>Encontre bens penhorados pelas Finanças (Autoridade Tributária), Bancos e Tribunais, em Portugal continental, Madeira e Açores.</p>
      <p>Poderá comprar carros, veículos pesados, motos, reboques, imóveis (p. ex. casas, apartamentos, lojas e terrenos), participações sociais e outros tipos de bens penhorados como jóias, material de escritório, entre outros.</p>
      <p>Os negócios são realizados através de leilão eletrónico, carta fechada ou negociação particular, sendo possível encontrar bens penhorados com um valor base a partir de €1.</p>
    </div>
    <div class="col-md-4">
          <div style="max-width: 100%;" class="text-center">
            <!-- Bens Penhorados - Homepage (top) -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:250px"
                 data-ad-client="ca-pub-1654487041005723"
                 data-ad-slot="8417132421"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
    </div>
  </div>
</div>
<div class="home-items-section">
      <div class="row">
          <div class="col-md-12 text-center">
              <h3>Últimas inserções</h3>
              <hr>
          </div>
          @foreach($latest as $newItem)
          <div class="list-group-home col-xs-12 col-sm-4 col-md-2">
              <a class="list-group-item" href="../{{ $newItem['categorySlug'] }}/{{ $newItem['itemSlug'] }}">
                  <img class="img-responsive" alt="{{ $newItem['title'] }}" src="../images/{{ $newItem['image'] != null ? $newItem['image'] : 'empty.jpg' }}">
                  <div class="caption text-center home-item-desc">
                      <span class="home-item-title">{{ $newItem['title'] }}</span>
                      <p>
                          <span class="home-item-price">{{ $newItem['price'] ? 'Valor base: '.number_format($newItem['price']).'€' : 'À melhor oferta' }}</span>
                      </p>
                  </div>
              </a>
          </div>
          @endforeach
      </div>
</div>

<div class="row">
  <div class="col-md-12 col-xs-12">
<!-- Bens Penhorados - Homepage (mid) -->
<ins class="adsbygoogle"
     style="display:block;height:90px;"
     data-ad-client="ca-pub-1654487041005723"
     data-ad-slot="2614604422"
     data-ad-format="auto"></ins>
     <script>
         (adsbygoogle = window.adsbygoogle || []).push({});
     </script>
   </div>
</div>

<div class="home-items-section">
      <div class="row">
          <div class="col-md-12 text-center">
              <h3>A terminar o limite para propostas</h3>
              <hr>
          </div>
          @foreach($endingSoon as $endingItem)
          <div class="list-group-home col-xs-12 col-sm-4 col-md-2">
              <a class="list-group-item" href="../{{ $endingItem['categorySlug'] }}/{{ $endingItem['itemSlug'] }}">
                  <img class="img-responsive" alt="{{ $endingItem['title'] }}" src="../images/{{ $endingItem['image'] != null ? $endingItem['image'] : 'empty.jpg'}}">
                  <div class="caption text-center home-item-desc">
                      <span class="home-item-title">{{ $endingItem['title'] }}</span>
                      <p>
                          <span class="home-item-price">{{ $endingItem['price'] ? 'Valor base: '.number_format($endingItem['price']).'€' : 'À melhor oferta' }}</span>
                      </p>
                  </div>
              </a>
          </div>
          @endforeach
      </div>
</div>
@stop
