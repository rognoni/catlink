# 🐱🔗 catlink – Categorized Links, for methodical people.
If you want spend less time and less mental energy every day, we are creating a simple but powerful web tool to archive, search and share useful information with your small community of smart people.

## Architecture
This project is based on:

- [Laravel on AlterVista](https://github.com/rognoni/laravista)
- the update to **Laravel 10** of the previous project, see the italian [comments here](https://web.archive.org/web/20230719210752/https://forum.it.altervista.org/php-mysql-e-apache-htaccess/293642-laravel-altervista.html)
- [Pico.css • Minimal CSS Framework for semantic HTML](https://picocss.com/)
- [💬 Comments powered by Mastodon](https://laravista.altervista.org/CatLink/links/42)

## Category VS Tag
If you see [the way normally used](https://pinboard.in/recent/) to tag links, it is really too confusing for me: casual words in casual order.

A hierarchical categories system is much clearer and allow you to search starting from the generic (on the left) to the details (on the right), for example:
```
/🇺🇸us/New York/job/programmer
```

or vegan restaurant at Milan city:
```
/🇮🇹it/Milano/ristorante/vegano
```

⚠️ Remember to use always singular name for the category.

## Laravista Dockerfile
This project uses [PHP Docker official image](https://hub.docker.com/_/php) for local development.
```
docker build -t laravista .
docker run -d --rm -p 80:80 -v "$PWD/src":/var/www/html --name running laravista
docker exec -it running bash
```

Into the container we already execute:
```
composer create-project laravel/laravel CatLink
```
so you have the Laravel [framework code here](https://github.com/rognoni/catlink/tree/main/src/CatLink)
but without the `/vendor` folder with the libraries (dependencies) because configured into the `.gitignore` file.

To get the dependencies:
```
root@a8b86019f174:/var/www/html# cd CatLink/
root@a8b86019f174:/var/www/html/CatLink# composer install
```

and when completed try http://127.0.0.1/CatLink/ 

Without `.htaccess` was http://127.0.0.1/CatLink/public/

At the end use this:
```
docker stop running
```

## Apache .htaccess
We added this `/CatLink/.htaccess` file:
```
AddHandler av-php82 .php

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /CatLink
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

to avoid to expose the `.env` file here http://127.0.0.1/CatLink/.env

and we updated the routes:
```
Route::get('/CatLink', function () {
    return view('welcome');
});
```

`AddHandler av-php82 .php` is useful only in production (for AlterVista) but you can keep it in development.

## Release with ZIP
You have to go into `src` folder and execute:
```
zip -r CatLink.zip CatLink
```

Now you can upload the archive using the AlterVista web panel for administrators.

Try this https://laravista.altervista.org/CatLink/

## MySQL
You have to create your local database for example named `laravel` and configure it into `.env`

```
DB_CONNECTION=mysql
DB_HOST=host.docker.internal # This works on macOS
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=pass
```

About `DB_HOST` read [more info here](https://docs.docker.com/desktop/networking/#i-want-to-connect-from-a-container-to-a-service-on-the-host)

AlterVista database is not accesible from your machine, but works only on the production server using this configuration:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=my_laravista
DB_USERNAME=laravista
DB_PASSWORD=
```

After you release this configuration in production, you can not execute migration commands from a console but you can from the web `routes/web.php`

```
Route::get('/CatLink/artisan/migrate', function () {
    Artisan::call('migrate');
    return Artisan::output();
});
```

(before continue we have to FIX the issue [#1](https://github.com/rognoni/catlink/issues/1) with the new version of PHP configured on AlterVista)

at the end you could make this test:

```
Route::get('/CatLink/test', function () {
    return \App\Models\User::all();
});
```

## Command app:prepare {env}

This command help you to prepare a specific environment (prod, dev)

```
root@504f54a78618:/var/www/html/CatLink# php artisan app:prepare dev
Preparing dev ...
Done!

root@504f54a78618:/var/www/html/CatLink# php artisan app:prepare prod
Preparing prod ...
Done!
```

## Roadmap

See into [docs/releases](https://github.com/rognoni/catlink/tree/main/docs/releases) folder
