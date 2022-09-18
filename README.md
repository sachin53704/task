
## Installation

First clone this repository, install the dependencies, and setup your .env file.

```bash
  git clone git@github.com:JeffreyWay/Laravel-From-Scratch-Blog-Project.git blog
  composer install
  cp .env.example .env
```

Then create the necessary database and run the initial migrations and seeders.

```bash
  php artisan migrate
  php artisan db:seed
```
Now after run the server by using command
```bash
  php artisan serve
```
Go to generated local server fill the username and password on login page and use the system
```bash
  Username : admin@gmail.com
  Username : admin@111
```
    