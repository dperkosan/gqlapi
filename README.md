# gqlapi - GraphQL API for Clubber
API for Clubber application - Laravel + GraphQL

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
* PHP >= 7.1.3
* [Composer](https://getcomposer.org/)

### Installing
A step by step series of examples that tell you how to get a development env running

Clone this repo by typing in terminal:

```
git clone git@github.com:dperkosan/gqlapi.git
```

In terminal run "composer install" in the root of the cloned project

```
composer install
```

Create .env file and put it in the root folder of the project, from [here](https://docs.google.com/document/d/1rNTtJOXAJoz3ZqHMpejvzgwpmCQU5iW56QnMyoALldE/edit?usp=sharing) 

For quick starting of PHP built-in web server, in the root of the cloned project in terminal run:

```
php artisan serve
```
And go to: [http://127.0.0.1:8000/](http://127.0.0.1:8000/)

### Migration and seeding
If you need fresh and dummy data in your dev DB, run this command:

```
php artisan migrate:fresh --seed
```

### GraphQL playground
If you need to test GraphQL queries, go to this page in your browser to open GraphQL playground:

```
[http://127.0.0.1:8000/graphql-playground](http://127.0.0.1:8000/graphql-playground)
```