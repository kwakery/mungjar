<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
  </body>
</html>
