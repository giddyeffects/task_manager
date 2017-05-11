## About Task Manager

The Task Manager system will enable efficient follow up to created and assigned tasks

## <a name="setup"></a> Server Setup

 - Provision the server using the Laravel provisioning(https://github.com/laravel/settler/blob/master/scripts/provision.sh) script.
 - If you are using Laravel Homestead for development you can copy config files from your local machine to the server then make relevent changes e.g. Change the vagrant user to your server user etc
 - Else Setup PHP7, Nginx, MySQL on your server.

## <a name="installation"></a> Installation

1. Clone the repository to `<yourdocumentroot>`

  `git clone https://bitbucket.org/nikimangroup/ci_tasks <yourdocumentroot>`

2. Change directory to <yourdocumentroot> and Install PHP dependencies 
    `composer install`

3. Create .env file and fill in your database details and other details as necessary. There is an example available that you can modify.

4. Create and seed your database
  `php artisan migrate --seed`

5. Install Javascript dependencies
	`npm install`

6. Create vendor configs (if not created yet)
	`php artisan vendor:publish`


