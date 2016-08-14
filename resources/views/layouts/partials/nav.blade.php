<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills pull-right">
      <li role="presentation"><a href="/">Página inicial</a></li>
      <li role="presentation"><a href="/imoveis">Imóveis</a></li>
      <li role="presentation"><a href="/veiculos">Veículos</a></li>
      <li role="presentation"><a href="/outros">Outros bens</a></li>
    </ul>
  </nav>
  @if(isset($isHomepage))
    <h1 class="text-muted">Bens Penhorados</h1>
  @else
    <h3 class="text-muted">Bens Penhorados</h3>
  @endif
</div>
