Technologies used :

1: AWS -> I have created a AWS ec2 (Ubuntu with Lamp Stack and PHPMYADMIN) instance for this test project. 



2: Laravel 5.8 (Passport, Auth, Middleware)

This Application has two parts. Web and REST API. 

Web Authentication using  Laravel's built in Auth system. Web routes are protected by Auth:web middleware.

Rest Authentication using Laravel's default rest api auth package (Passport). Api routes are protected by Auth:api middleware.

For frontend, I have used laravel default setup that comes with bootstrap and I have used jQuery to send ajax request to handle products.


Installation : 

Step 1 : Make database connection changes in .env file.

Step 2 : Create Database, I have created a migration for the database with which database can easily be created.
			
			Run : php artisan migrate
			
Step 3 : Setting Up Passport Personal Access Client. I have created API using laravel's default package 'Passport'.
			
			Run : php artisan --force passport:install
			
			