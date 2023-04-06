# Ejemplo
Lista de productos

## database-first

* iniciamos desde de la base de datos
* hacemos que nuestro codigo se ajuste a la base de datos.

## code-first

* iniciamos desde el codigo
* y este crea la base de datos.

## como trabajamos en code first?

* configurar el .env
* crear una migracion
* ejecutarla. En este paso se crean las tablas
* crear un modelo
* (opcional), crea un factory
* (opcional), crear un seeder

### creando la migracion

```shell
 php artisan make:migration crear_tabla_productos
 ```

[https://laravel.com/docs/10.x/migrations](https://laravel.com/docs/10.x/migrations)

y editarla.
```php
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id()->generateAs();
            $table->string('name',30);
            $table->string('descripcion',200);
            $table->integer('precio');
            $table->timestamps();
        });
    }
```

### ejecutar las migraciones pendientes

```shell
php artisan migrate:install
# borra todo y parte de cero
php artisan migrate:fresh
# refresca la migracion, intentando no borrar datos o estructuras
php artisan migrate:refresh
 ```

 ### crear el modelo
```shell
php artisan make:model Producto
```

### crear un factory
```shell
php artisan make:factory ProductoFactory
```

```php
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'descripcion' => fake()->text(100),
            'precio' => fake()->randomNumber(3),
        ];
    }
```



### crear el seeder
Puedo usar el archivo que ya existe, o agregar uno nuevo
Edite el archivo database/seeders/DatabaseSeeder.php
```php
   Producto::factory(20)->create();  // crear 20 productos con datos del factory
```

### ejecutar el seed

```shell
php artisan db:seed
```

### probar el codigo usando el tinker

```shell
php artisan tinker
> App\Models\Producto::all();   // all() Eloquent
```

## crear MVC

### crear controlador

```shell
php artisan make:controller ProductoController
```

```php
    public function listar() 
    {
        $productos=Producto::with(["categoria"])->get();
        return view("productos",['productos'=>$productos]);
    }
```

### crear la vista
Las vistas se crean en la carpeta resources/views y tienen extension .blade.php

```html
<h1>
<table>
    @foreach($productos as $prod)
    <tr>
        <td>{{$prod->name}}</td>
        <td>{{$prod->descripcion}}</td>
        <td>{{$prod->precio}}</td>
        <td>{{$prod->categoria->name}}</td>
    </tr>
    @endforeach    
</table>    
```
### editar el enrutador
Editar el archivo routes/web.php

```php
Route::get('/', [ProductoController::class,'listar']);
```

### ejecutar el servidor y probar

```php
php artisan serve
```

Y abrir la pagina web.

