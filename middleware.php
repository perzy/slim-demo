<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 15/9/29
 * Time: 下午3:33
 */


class GlobalMiddleware extends \Slim\Middleware
{
    public function call()
    {
        // Get reference to application
        $app = $this->app;

        echo 'global middleware call';
        echo "<hr/>";

        // Run inner middleware and application
        $this->next->call();
    }
}