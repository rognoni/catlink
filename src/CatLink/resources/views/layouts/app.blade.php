<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/pico.min.css">
    <!-- link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" -->
    <title>🐱🔗 catlink – Categorized Links, for methodical people.</title>
    <style>
      :root {
        --spacing: 0.5rem;
      }
    </style>
  </head>
  <body>
    <nav class="container">
      <ul>
        <li><strong>🐱🔗 <a href="/CatLink">catlink</a></strong></li>
      </ul>
      <ul>
        <li><a href="#">About</a></li>
      </ul>
    </nav>
    <main class="container">
        @yield('content')
    </main>
  </body>
</html>
