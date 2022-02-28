# The Project

This is a simple PHP Laravel Project to showcase the functionality of Laravels authorization features.

## Setup

Fill the database with example data:
```sh
php artisan migrate
php artisan db:seed
```

## Usage
Start the server by issuing the following command.
```sh
php artisan serve
```
A server should be started at port 8000. 

#### Show Blog Posts
##### localhost:8000/ (restrictions for editing and deleting posts)
Overview of all blog posts, click to see a blog posts content.
Edit and delete options are only available if you are logged in as the author of a post, or as admin.

#### Login
##### localhost:8000/login (no restriction, only available when not logged in)
Login as any user. The password will always be "password". To see a list of all users first login as admin with the E-Mail Address "lester@mail.com" and access the "Show all users" route.
##### localhost:8000/logout (no restriction)
Logs out the current user.

#### Show all users
##### localhost:8000/users/showall (only as admin)
See a list of all registered users and their E-Mail addresses.

