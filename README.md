# PHP Challenge

Application made on PHP8.0.23

# Requirements

-   PHP 8.0.23


# Setup

You need to clone the project to create a local copy on your system.
Run the following on your terminal:

```
git clone git@github.com:emuroiwa/my-php-framework.git MVC
```

Then change into the project's directory by running the following on your terminal:

```
cd MVC
```

Composer install

```shell
composer i
```

Create your DB and import the SQL in the database folder
Configure your DB credentials in the config.php folder


Start the application

```shell
php -S localhost:3000
```

Then run these curl commands to test

http://localhost:3000/customer

```shell
curl --location --request POST 'http://localhost:3000/customer' \
--header 'Content-Type: application/json' \
--data-raw '{
    "name": "name",
    "surname": "surname",
    "company": "company",
    "street_address": "street_address",
    "city": "city",
    "state": "state",
    "phone": 111
}'
```

http://localhost:3000/invoice-details

```shell
curl --location --request POST 'http://localhost:3000/invoice-details' \
--header 'Content-Type: application/json' \
--data-raw '{
    "customer_id": "936DA01F9ABD4d9d80C702AF85C822A8",
    "due_date": "2022-12-02 12:25:55"
}'
```


http://localhost:3000/invoice-item

```shell
curl --location --request POST 'http://localhost:3000/invoice-item' \
--header 'Content-Type: application/json' \
--data-raw '{"description" : "xxxxxx", "taxed":1, "amount": "sss"}'
```

