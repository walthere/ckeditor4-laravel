# CKEditor for laravel

## install 
```shell
composer require walthere/ckeditor4-laravel
php artisan vendor:publish --provider="Walthere\CKEditor\CKServiceProvider"
```

## config
```php
<?php
return [
    "date_folder" => true, // time foler 
    "img_folder"=>"image", // upload folder
];