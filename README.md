# Simple Laravel Blog

A simple blog, implemented in PHP Laravel, to showcase some of Laravels
authorization features.

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
##### /blogEntries
Overview of all blog posts. Click to see a blog posts content.
Edit and delete options are only available if you are logged in as the author of a post, or as admin.

#### Login
##### /login
Login as any user. Password will always be "password".
Log in as admin with email address "lester@mail.com" and access `/users/showall` to get a list of all users.
##### /logout
Logs out the current user

#### Show all users
##### /users/showall
Only available as admin. See a list of all registered users, their roles, and Email-Addresses.

#### Create and edit Blog Posts
##### /blogEntries/create
Only available for users with role writer or admin. Write a new blog post, which appears on `/` for all users.
##### /blogEntries
If you are logged in and your role is writer, you can delete and edit your own posts.
If you are logged as admin you can delete and edit all posts.

