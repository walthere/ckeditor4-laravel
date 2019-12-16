<?php
use Illuminate\Support\Facades\Route;

Route::post('ck/image/upload', 'Walthere\CKEditor\Controller@upload')->name('ck.image.upload');
