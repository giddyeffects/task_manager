## About Task Manager

The Task Manager system (work in progress) will enable efficient follow up to created and assigned tasks

## Server Setup

 - Provision the server using the Laravel provisioning(https://github.com/laravel/settler/blob/master/scripts/provision.sh) script.
 - If you are using Laravel Homestead for development you can copy config files from your local machine to the server then make relevent changes e.g. Change the vagrant user to your server user etc
 - Else setup PHP7, Nginx, MySQL on your server.

## Installation

1. Clone the repository to `<yourdocumentroot>`

  `git clone https://github.com/giddyeffects/task_manager.git <yourdocumentroot>`

2. Change directory to <yourdocumentroot> and Install PHP dependencies 
    `composer install`

3. Create .env file and fill in your database details and other details as necessary. There is an example available that you can modify.

4. Create and seed your database
  `php artisan migrate --seed`

5. Install Javascript dependencies
	`npm install`

6. Create vendor configs (if not created yet)
	`php artisan vendor:publish`

7. Delete the .git directory.


