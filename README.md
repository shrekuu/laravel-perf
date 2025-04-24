# Simple Laravel Performance Test

> Laravel 12 from https://laravel.com/
>
> App running on 4c8g 20hdd AWS EC2 VPS.
>
> PostgresSQL 16.8 db.
>
> Requests are sent from the same server.

## Screenshots

### get landing page 140+ rps

![get landing page](get-landing-page.png)

### get users 150+ rps

![get users](./screenshots/get-users.png)

### with octane, get users 1100+ rps

![with octane](./screenshots/get-users-with-octane.png)

### with octane + redis, get users 1600+ rps

![with octane and redis](./screenshots/get-users-with-octane-and-redis.png)

### without octane + with redis, get users 600+ rps

![with out octane with redis](./screenshots/get-users-without-octane-with-redis.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
