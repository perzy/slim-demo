<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 15/9/29
 * Time: 下午2:48
 */

require 'vendor/autoload.php';
require './middleware.php';

$app = new \Slim\Slim();


// add global middleware
$app->add(new GlobalMiddleware());

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


// middleware for special route
$authenticateForRole = function ( $role = 'member' ) {
    return function () use ( $role ) {
        // ...
    };
};
$app->get('/admin', $authenticateForRole('admin'), function () {
    //Display admin control panel
});



// middleware for json route
$jsonParser = function($app){
    return function() use($app){
        $data = json_decode($app->request->getBody());
        // for example: $app->request->setBody($data);
    };
};


// route for application/json after json parser middleware
$app->add(new \Slim\Middleware\ContentTypes());

/**
 * request: {"name":"jerry"}
 *
 * response:
 * global middleware call<hr/>array(1) {
 *  ["name"]=>
 *  string(5) "jerry"
 * }
 */
$app->post('/json', function () use ($app){
    //Create book

    $data = $app->request->getBody();
    var_dump($data);
});


$app->run();