# Modulo about permissions and dynamic roles without libraries.


## REQUIREMENTS

* Composer
* Laravel
* XAMPP 


## CLONE THE REPOSITORY

In the folder C: \ xampp \ htdocs
Open Command Prompt

~~~
: git clone https://github.com/lmedinaC/dynamicRole.git
~~~

## COMPOSER INSTALLATION 

cd dynamicRole

~~~
:composer install
~~~


## CONNECTION TO DB

In the folder C: \ xampp \ htdocs \ dynamicRole 
Create a copy of the .env.example file, with the name .env and modify the following variable 

~~~
DB_DATABASE=dynamic_rol
~~~
And run in Command Prompt 

~~~
: php artisan key:generate
: php artisan db:create dynamic_rol
: php artisan migrate
: php artisan db:seed
~~~


## RUN VIEWS FROM SQL

Run the file "db_views.sql"


## RUN PROYECT 

In the folder C: \ xampp \ htdocs \ dynamicRole 
Open Command Prompt run

~~~
:php artisan serve --port=3000
~~~

Autor: @lmedinaC
