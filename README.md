# NextMedia Coding challenge

Software Engineer - Coding challenge

### Installing Steps

First of all run :

```
git clone https://github.com/razaq-hossam/tech-challenge.git --branch master
```

Then in the project folder run the following commands using Command Line : 

1 - Install the composer Files :

```
composer install
```

2 - Install Web Dependencies & Compile the files : 

```
npm install && npm run dev
```

3 - Generate App Key : 

```
php artisan key:generate
```

3 - Your Database Config | Copy the .env.example : 

```
cp .env.example .env
```

4 - Change these {your_} :

```
DB_CONNECTION= mysql
DB_HOST= {your_localhost} 
DB_PORT= {your_localhost_port} 
DB_DATABASE= {your_database_name} 
DB_USERNAME= {your_datebase_username} 
DB_PASSWORD= {your_database_password} 
```

5 - Run Migrations :

```
php artisan migrate
```

### CLI Features

Create category

```
php artisan create:category
```

Add Product

```
php artisan create:product
```

Drop category

```
php artisan drop:category {category_id}
```

Drop Product
```
php artisan drop:product {product_id}
```

## Running the Unit Tests

```
php artisan test
```

## How to run the web App ?

1 - Open a first Cmd and run :

```
npm run watch
```

1 - Open a second Cmd and run :

```
php artisan serve
```

## Developed With

* [Laravel](https://laravel.com/) - on The Back-end
* [Vuejs](https://vuejs.org/) - on The Font-end
* [Tailwind css](https://tailwindcss.com/) - For Css Styling

## Author

* **Razaq Hossam | Software Engineer & Full Stack Developer**