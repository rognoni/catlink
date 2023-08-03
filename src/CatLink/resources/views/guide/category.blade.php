@extends('layouts.app')

@section('content')
<ul>
    <li><a href="#standard">Category path prefix</a></li>
    <li><a href="#general">General rules</a></li>
    <li><a href="#competitors">Competitors</a></li>
</ul>
<p>
<a name="standard"></a>We are creating a "standard" list of category path prefix:<br>
<a href="{{ route('home', ['c' => '/art']) }}">🎨<code>/art/ ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/art/photo']) }}">📷<code>/art/photo ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/art/music']) }}">🎵<code>/art/music ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/it']) }}">🇮🇹<code>/it ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/relax']) }}">😴<code>/relax ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/relax/ASMR']) }}">🎧<code>/relax/ASMR ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/software']) }}">⚙️<code>/software ...</code>🔍</a><br>
<a href="{{ route('home', ['c' => '/web']) }}">🌐<code>/web ...</code>🔍</a><br>
<br>
You are free to use what you need but join the <a href="https://github.com/rognoni/catlink/discussions">Discussions on Github</a>
to help to create this "standard".
</p>
<a name="general"></a>
<h3>General rules</h3>
<p>
Category path follows these general rules:
<ul>
    <li>start the category with <code>/</code> and use it to start each sub-category</li>
    <li>use always singular name for the category, except for proper names, for example
        <a href="{{ route('home', ['c' => 'Invidious']) }}">Invidious</a></li>
    <li>use always lowercase for the category, except for proper names or acronym, for example
        <a href="{{ route('home', ['c' => 'ASMR']) }}">ASMR</a></li>
    <li>can use one space to separate words in category, for example
        <a href="{{ route('home', ['c' => 'palette generator']) }}">palette generator</a></li>
    <li>do not use spaces at the beginning or at the end of category, for example this is wrong:
        <code>/ spaces / again / spaces</code>
    </li>
</ul>
</p>
<a name="competitors"></a>
<h3>Competitors</h3>
<p>
<table>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">catlink</th>
      <th scope="col"><a href="https://curlie.org/en">Curlie</a></th>
      <th scope="col"><a href="https://www.jasminedirectory.com/">Jasmine</a></th>
      <th scope="col"><a href="http://www.stpt.com/directory/">stpt</a></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Submit</th>
      <td>Free</td>
      <td>Free</td>
      <td>$59/year or $99 one-time</td>
      <td>$99/year or $299 one-time</td>
    </tr>
    <tr>
      <th scope="row">Open-source</th>
      <td>✅</td>
      <td>❌</td>
      <td>❌</td>
      <td>❌</td>
    </tr>
  </tbody>
</table>
</p>
@endsection
