

![logo](https://i.imgur.com/Xnu0l9w.jpg)

    
# About Lara Starter

Lara Starter is highly capable and customizable 
Laravel Starter pack. It provides you some powerful and handy
features out of the box. All you have to do just set up it.

## Wise Note
This is not any kind of laravel composer package. This is a laravel project itself
just has a backend with some good handy features that you need in almost every project.

## Features

- MultiAuth, Role, and Permission Builder (GUI).
- Dynamic Drag and Drop side Menu Builder (GUI).
- Server-side ENV editor (GUI).
- Site Settings (Edit: contact info, metas, logos, etc).
- Artisan View (create view file via command line).
- Dynamic Validation error handling with sweet toast.
- Backup Manager (GUI) [backup manager has a bug right now!]


## Dependency

Project requires `php "7.3|^8.2"`
   
## Installation 

For install just clone the repo and go inside of it and run 
These #1-#8 commands and that will do the job.

#1 `composer install`

#2 `cp .env.example .env`

#3 `php artisan key:generate`

#4 `php artisan migrate:fresh`

#5 `php artisan db:seed`

#6 `php artisan optimize:clear`

#7 `php artisan config:cache`

#8 `php artisan serve`


### Admin Login

Email: `super@admin.com`

Password: `password`

## Documentation

## Role and Permission
you can create role and Permission via Gui it really easy to use.
the GUI base on [Spatie Permission](https://spatie.be/docs/laravel-permission/v3/installation-laravel)
. so its works like same as spaite permission's documentation says.
but `Lara Starter` has some own command alongside it. Let's see
some basic handy commands.

---
suppose you have a Blog model and you want to make 4 basic permission for it
- readBlog
- writingBlog
- editBlog
- deleteBlog

and guess what you can create this basic resource permission with a single command

````bash
php artisan lara:permissions Blog
````
first, you have to write `lara:permissions` then define your
`model` name.

**Note**: It's not like resource permission name have to be a model name
you can give any name you want.

## Making single permission:

Now it's not like you always need
resource permissions some time you will need single permission for that you must command

````bash
php artisan lara:permissions Blog --single=create

````
that will create a single permission called `createBlog`.
first, define your `model` name then give a flag `--single`
and then write what kind of permission you need.

## Delete Permission:

````bash
php artisan lara:permission blog --delete=create

````

Deleting is the same as creating single permission. just you have to mention the `model` name
and add a flag of `--delete` and the name of the permission.

## Role:

After creating all the permissions now you can assign those permissions under a specific Role. Just go to Admin panel and go to `Access Control` then `Roles` you will find
a `+Add Role` Button one at the top. Click there to define a Role name and click one the permissions you like to assign for this particular role that's all.

> By default lara starter comes with an inbuild Super Admin Role. All kinds of permissions will automatically be assigned to the Super Admin.

## Use Role or Permission on Middleware:

The first thing that you have to know that Lara Starter Authentication by default uses a `admin guard`.
so be careful when you are defining Middleware you have to remember that you have to pass `guard` name with it
or Middleware won't work.

````bash
# if you want to Authnticat via permission
function __construct()
    {
        $this->middleware(['permission:createBlog', 'auth:admin']);

        # or multiple check

        $this->middleware(['permission:createBlog,editBlog,deleteBlog', 'auth:admin']);

    }

# if you want to Authnticat via Role
function __construct()
    {
        $this->middleware(['role:Publisher', 'auth:admin']);

        # or multiple checks
        
        $this->middleware(['role:SuperAdmin, Admin, Publisher, 'auth:admin']);

    }

# check user is logedin or not.
function __construct()
{
    $this->middleware('auth:admin');
}

````
## Authnticat in Blade:

Like middleware, we have to define the guard as well when we will Authnticat in Blade in blade.

````bash
# authnticate via permission
@if (auth('admin')->user()->hasAnyPermission('createBlog') # you can pass a array alwell
# do some thing.
@endif

# authnticate via role
@if (auth('admin')->user()->hasAnyPermission('publisher') # you can pass a array alwell
# do some thing.
@endif

````
--
# Artisan View:

This package adds a handful of view-related commands to Artisan in your Laravel project. Generate blade files that extend other views, scaffold out sections to add to those templates, and more. All from the command line, we know and love! credit: [artisan view](https://github.com/svenluijten/artisan-view#creating-views)

## Creating views

````bash
# Create a view 'index.blade.php' in the default directory
$ php artisan make:view index

# Create a view 'index.blade.php' in a subdirectory ('pages')
$ php artisan make:view pages.index

# Create a view with a different file extension ('index.html')
$ php artisan make:view index --extension=html

````
## Extending and sections

````bash
# Extend an existing view
$ php artisan make:view index --extends=app

# Add a section to the view
$ php artisan make:view index --section=content

# Add multiple sections to the view
$ php artisan make:view index --section=title --section=content

# Add an inline section to the view
# Remember to add quotes around the section if you want to use spaces
$ php artisan make:view index --section="title:Hello world"

# Create sections for each @yield statement in the extended view
$ php artisan make:view index --extends=app --with-yields

# Add @push directives for each @stack statement in the extended view
$ php artisan make:view index --extends=app --with-stacks

````

## REST resources

````
# Create a resource called 'products'
$ php artisan make:view products --resource

# Create a resource with only specific verbs
$ php artisan make:view products --resource --verb=index --verb=create --verb=edit

````

## Scrapping views

````
# Remove the view 'index.blade.php'
$ php artisan scrap:view index

# Remove the view by dot notation
$ php artisan scrap:view pages.index

````

## Scrapping a REST resource

````
# Remove the resource called 'products'
$ php artisan scrap:view products --resource

````
--

# Dynamic Validation error showing:
suppose you don't want to validate a form and you don't want to take pain for showing errors in the frontend.
thats why to make easy you work lara starter have a way to handle you validate error'.

goto .env and make add `SWEET_TOAST_FOR_ERROR=true`

````
SWEET_TOAST_FOR_ERROR=true

````

or you can go in `config folder` and find sweetalert.php and make `SWEET_TOAST_FOR_ERROR` to `true`
