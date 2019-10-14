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
http://127.0.0.1:8000/graphql-playground
```

### GraphQL query examples
Return 5 (klabana) clubs for second page with pager information:

```
{
  clubs(first:5 page: 2  klabana: 1){
    data{
      id
      name
      events{
        id
        name
      }
      users{
        name
      }
    }
    paginatorInfo {
      hasMorePages
      currentPage
      lastPage
      count
      firstItem
      lastItem
      perPage
      total
    }
  }
}
```

Return data for club with ID 1:

```
{
  club(id: 1){
    id
    name
    events{
      id
      name
    }
    users{
      name
    }
  }
}
```

Create new club, associate existing user and return ID and users name:

```
mutation{
  createClub(input: {
    name: "New club" 
    image: "https://lorempixel.com/640/480/?25908" 
    klabana: 0 
    phone: "111222" 
    rank: 0
  	users: {
    	connect: [4]
  	}
  }){
    id
    users{
      name
    }
  }
}
```

Update club name, change it's user (disconnect existing one and connect new one) and return ID and new users name:

```
mutation{
  updateClub(input: {
    id: 101
    name: "New name"
  	users: {
      disconnect: [4]
      connect: [5]
  	}
  }){
    id
    users{
      name
    }
  }
}
```

Delete club and return ID:

```
mutation{
  deleteClub(id: 101){
    id
  }
}
```
Create new event and return ID:

```
mutation{
  createEvent(
    club_id: 100
    name: "event name"
    description: "event description"
    start_time: "2019-10-01 13:00:00"
    end_time: "2019-10-01 14:00:00"
    place: "jolly"
    country: "SR"
    city: "Beograd"
    street: "M.O. 13"
    zip: "11000"
    latitude: "0"
    longitude: "0"
    image: "https://lorempixel.com/640/480/?50623"
  ){
    id
  }
}
```

Update event name and return ID:

```
mutation{
  updateEvent(
    id: 1001
    name: "new name"
  ){
    id
  }
}
```

Delete event and return ID:

```
mutation{
  deleteEvent(id: 1001){
    id
  }
}
```

### Authentication (GraphQL with Laravel passport)
[https://github.com/joselfonseca/lighthouse-graphql-passport-auth](https://github.com/joselfonseca/lighthouse-graphql-passport-auth)

Login and get token:

```
mutation{
  login(input:{
    username: "admin@example.com"
    password: "password"
  }){
    access_token
  }
}
```

Get authenticated user data (with token):

```
query{
  me{
    id
    name
    email
  }
}
```

In order for this to work, you must pass token of authenticated user. So in HTTP header there must be:
```
{
 "Authorization": "Bearer $TOKEN"
}
```

Logout (don't forget to pass the token also):
```
mutation{
  logout{
    status
    message
  }
}
```

Forgot password - get link for password reset (no need for token :) ):
```
mutation{
  forgotPassword(input:{
    email: "admin@example.com"
  }){
    status
    message
  }
}
```

Update forgotten password (with token from previous step):
```
mutation{
  updateForgottenPassword(input:{
    email: "admin@example.com"
    token: "bad6785907c6aba61f6856bae29fa3bf02e117c20452635f0a6fd3ce9484ac9c"
    password: "newpassword"
    password_confirmation: "newpassword"
  }){
    status
    message
  }
}
```