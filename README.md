# OPEN API For Travel Agency application in [CodeIgniter]()![Logo](https://logowik.com/content/uploads/images/651_codeigniter.jpg)


# Grow your tourism
![Tourism](https://i.pinimg.com/736x/2f/a2/32/2fa2321cb1703d6eef32410774156fed.jpg)

## Installation & updates (Directly at Server)
```sh
$ git clone https://github.com/sagnikcapital/Open-Api-Travel-Application.git
```
```sh
$ cp .env.example .env
```
```sh
$ composer install
```
```sh
$ chmod +x Permission.sh
```
```sh
$ crontab -e
```
> Write the execution details at cron tab: 

> 0 2 * * * /path/to/your/script/Permission.sh

> 0 2 * * * /path/to/your/script/Deploy.sh


> Setup .env configuration for Database connect
```env
HOST=''
DB_USER=''
DB_PASSWORD=''
DB_NAME=''
PORT=3306
```

> Run migrations
```sh
$ php spark migrate
```

> Setup Twilio details at .env for Messaging
```env
TWILIO_SID=''
TWILIO_AUTH_TOKEN=''
```

## Check System Logs
> Open http://your-domain/logs in browser
- (Refer) https://github.com/SeunMatt/codeigniter-log-viewer 
## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

## Versions and Compatibility

- [PHP 7.4]()
- [Apache 2]()
- [CodeIgniter 4.0]()
- [Mysql]()
- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)



- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


With Best regards,
 ### Sagnik Dey
