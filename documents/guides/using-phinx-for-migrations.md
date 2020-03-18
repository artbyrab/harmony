# Using Phinx for migrations

## To create a migration:

```shell
$ vendor/bin/phinx create MyNewMigration
```

Typically you would try and name your migration in a sensible way.

* To create a new table called tickets

```
$ vendor/bin/phinx create CreateTicketsTable
```

* This will create a new migration:
    * 20200318145930_create_tickets_table.php

## To run the migrations up

```shell
$ vendor/bin/phinx migrate
```

## To reverse the migrations

```shell
$ vendor/bin/phinx rollback
```

## To clear all migrations:

```shell
$ vendor/bin/phinx rollback
```