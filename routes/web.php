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
    //$app->get('/countries', CountriesController::class . ':index')->setName('countries.index');

    $app->get('/countries', function (Request $request, Response $response, $args) {
        die('Umri muski');
        // Set up cache headers
       // $setup = new SetupCache();
      //  $setup->addCacheHeaders($this->cache, $request, $response);

        // Render countries API
       // return $this->renderer->render($response, 'countries.php', $args);
    });

};