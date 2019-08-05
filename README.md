# Docker + Lumen with Nginx and MySQL

![image](Lumen_splash.png)

This setup is great for writing quick apps in PHP using Lumen from an any Docker client. It uses docker-compose to setup the application services.

## Clone this repo

```bash
git clone git@github.com:AngCosmin/docker-lumen-mysql.git lumen
cd lumen
```

## Create Lumen App

Now, create the app in the `images/php` directory named `app`

```bash
cd images/php
docker run --rm -it -v $(pwd):/app saada/lumen-cli lumen new app
```

## Allow Lumen to use database

Navigate to `images/php/app/bootstrap` and open `app.php`. Uncomment these two line:  
```
$app->withFacades();

$app->withEloquent();
```

### Configuration

To change configuration values, look in the `docker-compose.yml` file and change the `php` container's environment variables. These directly correlate to the Lumen environment variables.

### Build & Run

```bash
docker-compose up --build
```

Navigate to [http://localhost:80](http://localhost:80) and you should see something like this
![image](Lumen_browser.png)

Success! You can now start developing your Lumen app on your host machine and you should see your changes on refresh! Classic PHP development cycle. A good place to start is `images/php/app/routes/web.php`.

Feel free to configure the default port 80 in `docker-compose.yml` to whatever you like.

### Stop Everything

```bash
docker-compose down
```

## Contribute

Submit a Pull Request!
