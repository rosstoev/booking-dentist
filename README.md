# Booking dentist

## Requirements

| Name       | version  |
|------------|:--------:|
| PHP        |   v8.1   |
| MariaDB    | v10.16.* |

## Optional tools

|  Name         | Description    | Installation                  |
| ------------- |----------------| ----------------------------- |
| Symfony cli   | developer tool | https://symfony.com/download  |

## Project setup
```shell
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console importmap:install
```