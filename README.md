# Harmony

A micro PHP framework that works in harmony.

## Installation

* Clone the repo

```shell
$ git clone artbyrab/harmony
```

* Run composer install
    * From the project root in a terminal run:

```shell
$ composer install
```

* Create a database on your localhost called 'harmony_dev'
* Create a .env file
    * Copy the .env.example file and update the database information with your localhost database information
* Create a phinx.php file
    * Copy the example.phinx.php file
    * You should not have to update any information as it will all be passed via the .env file
* Run the migrations
    * From the project root run the following:

```shell
$ vendor/bin/phinx migrate
```

* Run the fixtures

```shell
$ php vendor/bin/phinx seed:run
```

* If you view your database now you should see that the tables have been created and your data is present

## Rolling back the database

* You can rollback the database migrations one by one
* Run the following as many times as you require:

```shell
$ vendor/bin/phinx rollback
```

## Starting the php server

To view the site start a php server:

* Navigate to the app root
* Run the following:

```shell
$ php -S localhost:8888
```

* Navigate to http://localhost:8888 to view in your browser

## Structure

* documents/
    * guides/
        - 'Useful guides'
* src/
    - 'The app folder'
    * database/
        * fixtures/
            - 'Database fixtures or seeds'
        * migrations/
            - 'Database migration files to create or update tables'
    * models/
        - 'For any future models'

## Resources

* Phinx documentation
    * https://book.cakephp.org/phinx/0/en/index.html