<?php

use App\Http\Controllers\exampleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\carController;
use App\Http\Controllers\ClassController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return "welcome to our site";
})->name('w');

Route::get('/link', function () {
    $url = route('w');
    return "<a href='$url'> go to welcome page </a>";
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login_accepted', function () {
    return "submit successfully";
})->name('login_accepted');

Route::get('/cv', function () {
    return view('cv');
});

#for task3 
#the task is to send the form data to another page
#and to show the data in a proper format
#begin
Route::get('/contactUs_task3', function () {
    return view('task3_contactUs');
});

Route::post('/submit_Page', function () {
    return view('task3_response', $_POST);
})->name('submit_Page');
#end

Route::get('test', [exampleController::class, 'my_data']);
Route::get('car/create', [carController::class, 'create']);
Route::post('cars', [carController::class, 'store'])->name('car.store');

#for task4
#the task is to save the class data in the database
#using controller and Model
#begin
Route::get('class/create', [ClassController::class, 'create']);
Route::post('classes', [ClassController::class, 'store'])->name('class.store');
#end

/* Route::get('/submit_page', function () {
return "submi";
})->name('submit_page'); */

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
/* Route::prefix('accounts')->group(function () {
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
 */
/* Route::fallback(function () {
return redirect('/welcome');
}); */


