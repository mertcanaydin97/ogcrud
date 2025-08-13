<p align="center">
  <a href="https://ogcrud.dev" target="_blank">
    <img width="400" src="https://via.placeholder.com/400x100/6366f1/ffffff?text=OGCRUD" alt="OGCRUD Logo">
  </a>
</p>

<p align="center">
<a href="https://packagist.org/packages/mertcanaydin97/ogcrud"><img src="https://poser.pugx.org/mertcanaydin97/ogcrud/downloads.svg?format=flat" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/mertcanaydin97/ogcrud"><img src="https://poser.pugx.org/mertcanaydin97/ogcrud/v/stable.svg?format=flat" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/mertcanaydin97/ogcrud"><img src="https://poser.pugx.org/mertcanaydin97/ogcrud/license.svg?format=flat" alt="License"></a>
</p>

# **OGCRUD** - The Missing Laravel Admin
Made with ❤️ by [Mertcan Aydın](https://mertcanydin.com.tr)

![OGCRUD Screenshot](https://via.placeholder.com/800x400/6366f1/ffffff?text=OGCRUD+Admin+Panel)

Website & Documentation: https://ogcrud.dev/

Video Tutorial Here: https://ogcrud.dev/academy/

Join our community: https://github.com/mertcanaydin97/ogcruid

<hr>

Laravel Admin & BREAD System (Browse, Read, Edit, Add, & Delete), supporting Laravel 8 and newer!

## Installation Steps

### 1. Require the Package

After creating your new Laravel application you can include the OGCRUD package with the following command:

```bash
composer require mertcanaydin97/ogcrud
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

### 3. Run The Installer

Lastly, we can install OGCRUD. You can do this either with or without dummy data.
The dummy data will include 1 admin account (if no users already exists), 1 demo page, 4 demo posts, 2 categories and 7 settings.

To install OGCRUD without dummy simply run

```bash
php artisan ogcrud:install
```

If you prefer installing it with dummy run

```bash
php artisan ogcrud:install --with-dummy
```

And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/admin](http://localhost:8000/admin).

## Creating an Admin User

If you did go ahead with the dummy data, a user should have been created for you with the following login credentials:

>**email:** `admin@admin.com`   
>**password:** `password`

NOTE: Please note that a dummy user is **only** created if there are no current users in your database.

If you did not go with the dummy user, you may wish to assign admin privileges to an existing user.
This can easily be done by running this command:

```bash
php artisan ogcrud:admin your@email.com
```

If you did not install the dummy data and you wish to create a new admin user, you can pass the `--create` flag, like so:

```bash
php artisan ogcrud:admin your@email.com --create
```

And you will be prompted for the user's name and password.

## Sponsors

OGCRUD is proudly supported by our amazing sponsors. A big thank you to:

[![DigitalOcean Referral Badge](https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%203.svg)](https://www.digitalocean.com/?refcode=dc19b9819d06&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge)

