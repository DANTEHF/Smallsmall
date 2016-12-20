<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/7/8
 * Time: 14:16
 */
require_once 'Route.php';

$route=new Route();

$route->get('/index.html',function(){
    echo "welcome ！";
});
$route->run();