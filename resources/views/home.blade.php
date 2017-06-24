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
<div class="jumbotron">
  <div class="row">
    <div class="col-md-8">
      <h2>Leilões e Vendas de Penhoras das Finanças</h2>
      <p>Encontre bens penhorados pelas Finanças (Autoridade Tributária), Bancos e Tribunais, em Portugal continental, Madeira e Açores.</p>
      <p>Poderá comprar carros, veículos pesados, motos, reboques, imóveis (p. ex. casas, apartamentos, lojas e terrenos), participações sociais e outros tipos de bens como jóias, material de escritório, entre outros.</p>
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
  <div class="row">
    <div class="col-md-12 text-center">
    <h3>Perguntas frequentes</h3>
    <hr>
  </div>
  <div class="col-md-12">
    <p>Sabe o que são bens penhorados pelos bancos, <a href="https://www.portaldasfinancas.gov.pt">finanças</a> e tribunais? De seguida, poderá encontrar as respostas às dúvidas mais frequentes sobre este tema, por isso fique atento.</p>

    <h4>O que são bens penhorados?</h4>
    <p>Antes de começarmos a falar sobre bens penhorados é fundamental entender o significado de penhora. A penhora é na verdade uma apreensão realizada ao abrigo da lei, que incide sobre um bem que teria sido dado anteriormente como garantia de um determinado compromisso (p. ex. pagamento). Quando o devedor que garantiu o bem como meio de pagamento não cumprir o acordo, o credor executa a garantia (o bem) através da penhora deste.</p>
    <p>Depois de penhorados, os bens podem ir a leilões ou negociações particulares, até que se atinja o melhor valor do ponto de vista dos compradores, visando saldar o valor remanescente que é devido pela entidade alvo da penhora.</p>

    <h4>Em que consistem os leilões de bens?</h4>
    <p>Quando um determinado devedor dá um dos seus bens como garantia a uma instituição financeira (p. ex. bancos), esta executa a dívida se for caso disso e fica na posse do referido bem.</p>
    <p>No entanto, o bem por si só não é suficiente para garantir o pagamento em falta, sendo nesse momento necessário proceder a um mecanismo de leilão. Assim, é possível que os bens penhorados pelos bancos ou autoridade tributária, sejam colocados à venda, de modo a que o valor relativo à receita arrecadada seja utilizado na liquidação das dívidas contraídas pelo devedor.</p>

    <h4>Quais são os procedimentos de venda?</h4>
    <p>Uma grande dúvida em torno desta temática reside na modalidade de venda dos bens que são penhorados. Na realidade, o processo é bastante simples.</p>
    <p>Depois de encontrar o bem que pretende, o primeiro passo para participar num leilão de bens penhorados das finanças é clicar no botão "Entrar no botão eletrónico" (ou "Entregar proposta" na modalidade de proposta em carta fechada) que se encontra presente na página do bem em questão. Assim irá aceder ao site de venda eletrónica de bens penhorados pela Autoridade Tributária.<p>
    <p>O segundo passo resume-se à apresentação da sua proposta para o referido bem.</p>
    <p>É importante ter em consideração o seguinte:</p>
    <p>
      <ul>
        <li>Na modalidade de <strong>leilão eletrónico</strong>, as ofertas são realizadas por meio de licitação, onde cada interessado coloca um determinado valor para os bens. Encerrado o leilão, fica com o bem aquele que oferece um valor maior;</li>
        <li>Já modalidade de <strong>negociação particular</strong>, as vendas são efetuadas por intermédio de um mediador e este, por sua vez, é o responsável por toda a negociação;</li>
        <li>Por fim, existe ainda a modalidade de <strong>proposta em carta fechada</strong> em que um dos requisitos principais é que o valor proposto seja igual ou superior ao valor base de venda à semelhança dos leilões. Contudo, a proposta é única e não é possível conhecer o valor das restantes propostas apresentadas por terceiros.</li>
      </ul>
    </p>

    <h4>Como adquirir um bem penhorado?</h4>
    <p>O método mais fácil e seguro para adquirir um bem penhorado é utilizar a nossa plataforma em conjunto com o site da <a href="http://www.portaldasfinancas.gov.pt">Autoridade Tributária</a>. Enquanto primeiro auxilia a seleção do bem pretendido, o segundo é onde se realiza e faz-se a gestão da venda e transmissão legal do bem.</p>
    <p>É importante não utilizar outros intermediários uma vez que é fundamental verificar toda a documentação do imóvel, veículo ou outro bem em questão, de modo a garantir que a penhora não seja impugnada pelo devedor anteriormente executado.</p>

    <h4>O que é preciso ter em consideração?</h4>
    <p>No momento em que se escolhe um bem penhorado é muito importante ter alguns cuidados para garantir que nada de errado possa ocorrer posteriormente. Com isso em mente, apresentamos abaixo algumas medidas que vão garantir que a compra de bens seja bastante segura:</p>
    <p>
      <ul>
        <li>Caso esteja a pensar em adquirir um imóvel que está a ser alvo de uma penhora, tenha em atenção que por vezes apenas parte do edifício está a ser penhorado e há outros proprietários adstritos a outras parcelas. Numa situação destas, é bom analisar e validar com cuidado quais as condições da venda inerentes ao bem penhorado que pretende adquirir;</li>
        <li>A apresentação de uma proposta conduz automaticamente à geração de uma obrigação. Assim, se estiver a participar num leilão e se a sua licitação acabar por ser a proposta mais alta, fica obrigado a pagar esse valor durante o prazo de 15 dias. Contudo, caso o bem penhorado tenha um valor superior a 51 mil euros, o prazo poderá ser alargado, sem nunca descorar o facto do comprador ter que pagar o valor mínimo de 1/3 do total nos primeiros 15 dias;</li>
        <li>O interessado num determinado bem penhorado, deve fazer uma vistoria prévia antes de proceder à sua aquisição ou até mesmo antes de apresentar qualquer proposta. E, no caso de optar por adquirir o bem, é extremamente importante que verifique o mesmo no momento da transição para a sua propriedade;</li>
        <li>Durante o processo de licitação é fundamental estar atento para não apresentar propostas em valores excedentes, pois como já foi referido anteriormente, a apresentação de uma dada proposta conduz automaticamente à obrigação de cumprimento.</li>
      </ul>
    </p>
    <p>E são estes alguns dos principais cuidados a ter em consideração no momento de aquisição de um bem nestas condições, observando que estes cuidados visam única e exclusivamente tornar a sua compra muito mais segura e livre de quaisquer fatores que se revelem prejudiciais ou insatisfatórios.</p>
    
    <h4>Pesquisar penhoras</h4>
    <p>Neste site poderá encontrar milhares de penhoras das finanças. Basta pesquisar o que pretende em cada uma das categorias que se encontram disponíveis:</p>
    <p>
      <ul>
        <li><a href="/imoveis">Imóveis</a>: Casas, apartamentos, vivendas, terrenos e lojas.</li>
        <li><a href="/veiculos">Veículos</a>: Carros, pesados, motociclos, tractores e reboques.</li>
        <li><a href="/outros">Outros</a>: Participações sociais, telemóveis, maquinaria, móveis, jóias, etc.</li>
      </ul>
    </p>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-xs-12">
<!-- Bens Penhorados - Homepage (mid) -->
<ins class="adsbygoogle"
     style="display:block;width:100%;height:90px;"
     data-ad-client="ca-pub-1654487041005723"
     data-ad-slot="2614604422"
     data-ad-format="rectangle, horizontal"></ins>
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
