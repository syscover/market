# Marketplace for Laravel 5

## Installation

####1 - After install Laravel framework, insert on file composer.json, inside require object this value
```
"syscover/market": "dev-master"
```
and execute on console:
```
composer update
```

####2 - Register service provider, on file config/app.php add to providers array

```
Syscover\Market\MarketServiceProvider::class,

```

*####3 - To publish package and migrate

and execute composer update again:
```
composer update
```

####4 - Run seed database

```
php artisan db:seed --class="MarketTableSeeder"
```

####5 - Activate package

Access to Pulsar Panel, and go to Administration -> Permissions -> Profiles, and set all permissions to your profile by clicking on the open lock.


## Configuration
We indicate configuration variables available, to change them what you should do from the file environment variables .env

##### Order id prefix [default value empty]
You can set a prefix for all your orders, for example, if you can set on all you orders the prefix ORDER, set this value on you .env file
```
ORDER_ID_PREFIX=ORDER
```

##### Tax default country [default value ES]
To set default country to calculate tax, you can use this parameter, for example to change to US, set this value on you .env file

```
TAX_DEFAULT_COUNTRY=US
```

##### Default customer class tax [default value 1]
Set default ID customer class value for calculate tax amount of products

```
TAX_DEFAULT_CUSTOMER_CLASS=1
```

##### Set product price tax [default value 1]
Set prices types from products concerning to taxes, you have two options

######Values
* ID: 1 Value: Excluding tax
* ID: 2 Value: Including tax

```
TAX_PRODUCT_PRICES=1
```

##### Set shipping price tax [default value 1]
Set prices from shipping concerning to taxes, you have two options

######Values
* ID: 1 Value: Excluding tax
* ID: 2 Value: Including tax

```
TAX_SHIPPING_PRICES=1
```