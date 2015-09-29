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

$app->post('/books', function () use ($app) {
    //Create book
    $body = $app->request->getBody();

    echo $body;
});

$app->delete('/books/:id', function ($id) {
    //Delete book identified by $id
});


$app->run();