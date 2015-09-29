<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 15/9/29
 * Time: 下午2:48
 */

require 'vendor/autoload.php';

$app = new \Slim\Slim();

/**
 * /index.php/hello/xx
 */
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/test/:name', function ($name) use ($app) {

    $headers = $app->request->headers;
    var_dump($headers);

    echo "Hello, $name";

});


$app->run();