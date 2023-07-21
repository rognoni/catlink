# 🐱🔗 catlink – Categorized Links, for methodical people.
If you want spend less time and less mental energy every day, we are creating a simple but powerful web tool to archive, search and share useful information with your small community of smart people.

## Architecture
This project is based on:

- [Laravel on AlterVista](https://github.com/rognoni/laravista)
- the update to **Laravel 10** of the previous project, see the italian [comments here](https://web.archive.org/web/20230719210752/https://forum.it.altervista.org/php-mysql-e-apache-htaccess/293642-laravel-altervista.html)

## Category VS Tag
If you see [the way normally used](https://pinboard.in/recent/) to tag links, it is really too confusing for me: casual words in casual order.

A hierarchical categories system is much clearer and allow you to search starting from the generic (on the left) to the details (on the right), for example:
```
/🇺🇸us/New York/jobs/programmer
```

or vegan restaurants at Milan city:
```
/🇮🇹it/Milano/ristoranti/vegani
```

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
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /CatLink
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

to avoid to expose the `.env` file here `http://127.0.0.1/CatLink/.env`

and we updated the routes:
```
Route::get('/CatLink', function () {
    return view('welcome');
});
```

Try this http://127.0.0.1/CatLink/
