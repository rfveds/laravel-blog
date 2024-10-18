# Template repo for Laravel Sail on Gitpod.io

## Try or Contribute

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io#https://github.com/Eetezadi/Gitpod-Laravel-Sail)

This is a template repo, you can create your own using this as a template. Or let Gitpod handle the fork on the first commit.

## What this does

* Installs Laravel Sail on Gitpod based on [Laravel installation guide](https://laravel.com/docs/11.x/installation#sail-on-linux).
* Runs the Laravel batch script, creates a default stack for *example-app* with a default stack of *mysql*, *redis*, *meilisearch*, *mailpit* and *selenium*.
* Starts Laravel Sail, migrates the database and is ready for development.
* Adds an alias for `vendor/bin/sail` to `sail` for comfort

## Things to do
* On first start wait until the preview window opens...it will take a while.
* You may change *example_app* to your app name. *example_app* is also set as ignored in *.gitignore*
* You may adopt the `.gitpod.yml` and the bash script using a *with* query. See the [Laravel installation guide](https://laravel.com/docs/11.x/installation#sail-on-linux) for details.
* Build your own project...hope this saved you some time :)

php artisan migrate:fresh --seed