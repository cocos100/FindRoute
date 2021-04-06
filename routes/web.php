<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\TimeTableController;

use Slim\Http\Request;
use Slim\Http\Response;

return function (Slim\App $app)
{
    $app->get('/', HomeController::class . ':index')->setName('home.index');
    $app->get('/about', AboutController::class . ':index')->setName('about.index');
    $app->get('/timetable', TimeTableController::class . ':index')->setName('timetable.index');
    $app->get('/contact', ContactController::class . ':index')->setName('contact.index');
};
