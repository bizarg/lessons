<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      @include('layouts.navbar')
    </div>
  </nav>

  <main class="py-4">
    <div class="container">
      <div class="row justify-content-center">
        @yield('content')
      </div>
    </div>
  </main>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
  @auth
  $(document).ready(function () {
      var userId = '{{ Auth::user()->id }}';

      Echo.private('App.Domain.User.User.' + userId)
          .notification((notification) => {
              console.log(notification);
              Vue.notify({
                  group: 'app',
                  title: notification.title,
                  text: notification.message,
                  type: 'success'
              });

              Vue.notify({
                  group: 'app',
                  title: 123,
                  text: 123,
                  type: 'success'
              });

              $('.notify-counter').text(notification.unread)
          });

      Echo.channel('chat')
          .listen('.chat', (e) => {
              console.log(e);
          });
  });
  @endauth
</script>
@yield('js')

</body>
</html>
