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

/* Route::get('/cars/{id?}', function ($id = 0) {
return "the cars is number " . $id;
})->whereNumber('id'); */

/* Route::get('user/{name}/{age}', function($name, $age){
return "Username is " . $name . " and age is " . $age;
})->where(['name'=>'[a-zA-Z]+','age'=>'[0-9]+']); */

# return ($age == 0)? "Username is " . $name: "Username is " . $name . " and age is " . $age

/* Route::get('user/{name}/{age?}', function ($name, $age = 0) {
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

 */
Route::prefix('accounts')->group(function () {
    Route::get('/', function () {
        return "welcome to index";
    });

    Route::get('/admin', function () {
        return "welcome to admin";
    });

    Route::get('/user', function () {
        return "welcome to user";
    });

});

Route::prefix('cars')->group(function () {
    Route::get('/', function () {
        return "welcome to cars";
    });

    Route::prefix('usa')->group(function () {

        Route::get('/ford', function () {
            return "welcome to usa ford";
        });

        Route::get('/tesla', function () {
            return "welcome to usa tesla";
        });

    });

    Route::prefix('ger')->group(function () {

        Route::get('/mercedes', function () {
            return "welcome to ger mercedes";
        });

        Route::get('/audi', function () {
            return "welcome to ger audi";
        });

        Route::get('/volkswagen', function () {
            return "welcome to ger volkswagen";
        });

    });

});
