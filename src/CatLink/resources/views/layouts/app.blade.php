<!doctype html>
<html lang="en"><!-- data-theme="dark" -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/CatLink/css/pico.min.css">
    <!-- link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" -->
    <title>🐱🔗 catlink – Categorized Links, for methodical people.</title>
    <style>
      :root {
        --spacing: 0.5rem;
      }

      [data-theme=light],
      :root:not([data-theme=dark]) {
        --error-color: red;
      }

      [data-theme=dark] {
        --error-color: red;
      }
      
      .error {
        color: var(--error-color);
      }
    </style>
    @yield('head')
  </head>
  <body>
    <nav class="container">
      <ul>
        <li><strong>🐱🔗 <a href="{{ route('home') }}">catlink</a></strong></li>
      </ul>
      <ul>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('cookie') }}">Cookie</a></li>
        @auth<li><a href="{{ route('user') }}">{{ '@' . auth()->user()->username }}</a></li>@endauth
        @guest<li><a href="{{ route('login') }}">Login</a></li>@endguest
      </ul>
    </nav>
    <main class="container">
        @yield('content')
    </main>
  </body>
</html>
