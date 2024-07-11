<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return "welcome to our site";
});

/* Route::get('/cars/{id?}', function ($id=0) {
return "the cars is number ".$id;
})->where([
'id'=>'[0-9]+'
]); */

Route::get('/cars/{id?}', function ($id = 0) {
    return "the cars is number " . $id;
})->whereNumber('id');

/* Route::get('user/{name}/{age}', function($name, $age){
return "Username is " . $name . " and age is " . $age;
})->where(['name'=>'[a-zA-Z]+','age'=>'[0-9]+']); */

# return ($age == 0)? "Username is " . $name: "Username is " . $name . " and age is " . $age

Route::get('user/{name}/{age?}', function ($name, $age = 0) {
    if ($age == 0) {
        return "Username is " . $name;
    } else {
        return "Username is " . $name . " and age is " . $age;
    }
})->where(['name' => '[a-zA-Z]+', 'age' => '[0-9]+']);

Route::get('data/{month}/', function ($month) {
    return 'The month is ' . $month;
})->whereIn('month', ['March', 'April', 'May']);

Route::prefix('company')->group(function()
    {
        Route::get('/', function () {
            return "index";
        });

        Route::get('/IT', function () {
            return "welcome to IT";
        });

        Route::get('/users', function () {
            return "welcome to users";
        });

    });


