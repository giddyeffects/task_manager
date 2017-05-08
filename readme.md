## About Task Manager

The Task Manager is a system that will enable

- [Simple, fast routing engine](https://laravel.com/docs/routing).

## <a name="setup"></a> Server Setup

 - Provision the server using the Laravel provisioning(https://github.com/laravel/settler/blob/master/scripts/provision.sh) script. Note that MariaDB is used instead of MySql.
 - Setup Nginx, MySQL

## <a name="installation"></a> Installation

1. Clone the repository to `<yourdocumentroot>`

  `git clone https://bitbucket.org/nikimangroup/ci_tasks <yourdocumentroot>`

2. Install dependencies 
    `composer install`

3. Create your database
  `php artisan migrate`



