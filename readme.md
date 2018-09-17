## About gihandilanka-github/Laraveldocker

"`gihandilanka-github/Laraveldocker`"  is a laravel application build with the `Repository Design Pattern`.<br>
This can be run in following docker containers.
- Nginx 1.14
- Php 7.1
- MySql 5.7
- Phpmyadmin

You can change above versions as you wish.<br>
See, there is a directory called `docker` in root folder.<br>

You have to add following entry to `/etc/hosts` file to load the laravel site and phpmyadmin. <br>
`127.0.0.1 laraveldocker.local pma.laraveldocker.local`<br>

<strong>Now you can up your site on docker containers by:</strong><br>
Stop all other proceses running on port 80.<br>
Ex: If apache is running on port 80, you have to stop it before run the below command.<br>
`docker-compose up -d`<br>

Now you can access the site [http://laraveldocker.local](http://laraveldocker.local).<br>
phpmyadmin [http://pma.laraveldocker.local](http://pma.laraveldocker.local).

When you want run artisan command in project, do like below.<br>
`docker-compose exec app php artisan migrate`.

There is a `User` module. You can refer it as an example. You can see the repository design pattern and how it's working in user module.

To stop the containers you can run `docker-compose kill`. If you'd like to remove them all together, after stopping run `docker-compose rm`.



## License

The project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
