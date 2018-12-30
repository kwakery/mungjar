<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="description" content="Hi, I have been drawing ever since I was 6 years old. I specialize in creating chibis and stream panels. Come check out my work! Commission prices are negotiable." />
    <meta name="keywords" content="artist, twitch, hitbox, commission, chibi, stream panel, stream, panels, mungjar, mungasaur, graphics, emotes, chibis" />
    <meta name="author" content="metatags generator">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="3 month">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- twitch, artist, chibi -->

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/images/logo.png">
  </head>
  <body>
    @include('partials.nav')

    @if (!Request::is('/'))

    <main>
      <div class="container-fluid">
        <div class="col-md-8 col-lg-8 offset-md-2">
          <div class="card">
            <div class="card-body">
              <h2 class="text-center">@yield('name')</h2>
              @include('partials.alerts')

              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </main>

    <footer class="text-center">
      Made with <i class="fas fa-heart"></i> by kwakery
    </footer>

    @endif

    @include('partials.scripts')
  </body>
</html>
