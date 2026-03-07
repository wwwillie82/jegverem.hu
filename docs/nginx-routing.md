# Jegverem – Nginx front-controller routing

## Miért kapunk szerveroldali 404-et az aloldalakra?

A projekt Apache alatt a gyökér `.htaccess` fájllal működött:

- ha a kért útvonal nem létező fájl és nem létező könyvtár,
- akkor minden kérés `index.php`-ra ment tovább.

Ez a szabály biztosította, hogy a `/$szep_url` utak (pl. `/heti_menu`) bejussanak a Sputnik front controllerbe.

Nginx alatt a `.htaccess` **nem kerül feldolgozásra**, ezért ha a vhostból hiányzik az `index.php` fallback (`try_files`), a kérés nginx/ISPConfig szintű 404-re fut, még az alkalmazás előtt.

## Bizonyíték a kódban

- Front controller belépési pont: gyökér `index.php`, amely `Sputnik::GetInstance()->Dispatch()` hívással indítja a route feldolgozást.
- A route feloldás `$_SERVER["REQUEST_URI"]` alapján történik (`sputnik/URIHelper.php`), tehát a szép URL natívan támogatott, ha a kérés eléri az `index.php`-t.
- Az Apache rewrite fallback a gyökér `.htaccess`-ben van (`RewriteRule ^(.*)$ index.php [QSA,L]`).

## Minimális, helyes nginx viselkedés

A site `location /` blokkjában a front-controller fallback legyen:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

A PHP átadásnál a létező fájlokat szolgáljuk ki FPM-en keresztül:

```nginx
location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.2-fpm.sock; # környezetfüggő
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    include fastcgi_params;
}
```

## ISPConfig vhost példa (minimum)

```nginx
server {
    listen 80;
    server_name jegverem.hu www.jegverem.hu;
    root /var/www/clients/clientX/webY/web;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## Várt eredmény

Ezzel a beállítással:

- `/heti_menu` és minden hasonló szép URL az alkalmazásba érkezik,
- a route-ot már a Sputnik (`URIHelper` + app controllerek) dolgozza fel,
- az alkalmazás saját 404 oldala jelenik meg, ha nincs megfelelő controller.

## Projektkód módosítás szükséges?

Normál esetben **nem**. A gyökérok szerverkonfigurációs (nginx rewrite/fallback hiány), nem template vagy controller hiba.
