## 1. Creamos el proyecto
```bash
laravel new da-ex1
```

## 2. Creamos un repositorio en GitHub
comandos git

## 3. Migraciones y modelos
```bash
php artisan make:model Vehicle -m
```
```bash
php artisan make:model Entry -m
```

## 4. Factories y/o seeders
```bash
php artisan make:factory VehicleFactory --model=Vehicle
```
```bash
php artisan make:factory EntryFactory --model=Entry
```

## 5. Si queremos ver las rutas
```bash
php artisan r:l
```

## 6. Controladores
```bash
php artisan make:controller VehicleController --model=Vehicle
```
```bash
php artisan make:controller EntryController --model=Entry
```

## 7. Datatables
Descomentabamos en php.ini extension=gd
```bash
composer require yajra/laravel-datatables-oracle:"^11.0"
```
```bash
php artisan vendor:publish --tag=datatables
```
```bash
composer require yajra/laravel-datatables:^11.0
```
copiar los archivos de public/assets
```bash
php artisan datatables:make Vehicle
```
```bash
php artisan datatables:make Entry
```

## 8. Vistas
Creamos las vistas

## 9. Brezee
```bash
composer require laravel/breeze --dev
```
```bash
php artisan breeze:install
```
```bash
php artisan migrate:refresh --seed
```
```bash
npm install
```
```bash
npm run dev
```

## 10. Dashboard
Agregar botones para vehicles.index y entries.index
