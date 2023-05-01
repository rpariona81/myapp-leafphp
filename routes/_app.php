<?php

app()->get('/', function () {
    response()->page(viewsPath('index.html', false));
});

app()->get('/home', 'TestsController@index');

app()->get('/users', 'TestsController@users');

app()->get('/roles', 'TestsController@roles');

app()->get('/menus', 'TestsController@menus');

app()->get('/example', 'HomeController@index');

app()->get('/login', 'LoginController@index');

app()->post('/acceder', 'LoginController@acceder');

