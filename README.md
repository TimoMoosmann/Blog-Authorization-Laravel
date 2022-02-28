# The Project

Simple PHP Laravel Project to showcase some of Laravels authorization features.

## Setup
Open a terminal and `cd` into the project folder.

Fill the database with example users and blog posts.
```sh
php artisan migrate
php artisan db:seed
```

## Usage
Start server.
```sh
php artisan serve
```
A server should be started at port 8000. Access it with `localhost:8000` from your browser.
Then access one of the following routes.

#### Show Blog Posts
##### /
Overview of all blog posts. Click to see a blog posts content.
Edit and delete options are only available if you are logged in as the author of a post, or as admin.

#### Login
##### /login
Login as any user. The password will always be "password". To see a list of all users login as admin with email address "lester@mail.com" and access the "Show all users" route.
##### /logout
Logs out the current user.

#### Show all users
##### /users/showall
Only available as admin. See a list of all registered users and their E-Mail addresses.

