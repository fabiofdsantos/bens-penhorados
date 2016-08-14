<!DOCTYPE html>
<html data-ng-app="bens-penhorados">

<head>
    <title>{{ $seoTitle or 'Venda de Bens Penhorados em Portugal' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> @if(isset($metaDescription) && !empty($metaDescription))
    <meta name="description" content="{{ $metaDescription }}"> @endif

    <meta name="robots" content="{{ $metaRobots or 'index, follow' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/animate.css">

    <link rel="stylesheet" href="/css/loading-bar.css">
</head>

<body>
    <!--[if lt IE 7]> <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> <![endif]-->

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-43837076-3', 'auto');
        ga('send', 'pageview');
    </script>

    <div class="container">
      @include('layouts.partials.nav')
      @yield('main')
      <footer class="footer text-center">
              <!--<div class="row" style="margin-bottom:15px; margint-top:5px;">
                  <div class="col-md-12 col-xs-12">
                      Bens Penhorados - Footer
                      <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-1654487041005723" data-ad-slot="5911227620" data-ad-format="auto"></ins>
                      <script>
                          (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                  </div>
              </div>-->
          @include('layouts.partials.footer')
      </footer>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-1654487041005723",
            enable_page_level_ads: true
        });
    </script>

    @yield('js')
</body>

</html>
