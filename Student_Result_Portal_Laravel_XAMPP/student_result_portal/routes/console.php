<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about:portal', function () {
    $this->comment('Student Result Portal is ready.');
})->purpose('Display a short portal status message');
