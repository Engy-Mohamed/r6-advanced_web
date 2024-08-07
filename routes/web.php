<?php

use App\Http\Controllers\carController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\exampleController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

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

Route::get('cars', [CarController::class, 'index'])->name('cars.index');
Route::get('cars/{id}', [CarController::class, 'edit'])->name('cars.edit')->whereNumber('id');
Route::post('cars/{id}', [CarController::class, 'update'])->name('cars.update');
Route::get('cars/show/{id}', [CarController::class, 'show'])->name('cars.show');
Route::get('cars/destroy/{id}', [CarController::class, 'destroy'])->name('cars.destroy');
Route::get('cars/trashed', [CarController::class, 'showDeleted'])->name('cars.showDeleted');
Route::patch('cars/restore', [CarController::class, 'restore'])->name('cars.restore');
Route::delete('cars/trashed/delete', [CarController::class, 'force_delete'])->name('cars.force_delete');

#task5
#begin
Route::get('classes', [ClassController::class, 'index'])->name('classes.index');
Route::get('classes/{id}', [ClassController::class, 'edit'])->name('classes.edit')->whereNumber('id');
#end

#task6
#begin
Route::get('classes/{class}/show', [ClassController::class, 'show'])->name('classes.show')->whereNumber('id');
Route::delete('classes/delete', [ClassController::class, 'destroy'])->name('classes.destroy');
Route::put('classes/{id}/', [ClassController::class, 'update'])->name('classes.update')->whereNumber('id');
Route::get('classes/trashed', [ClassController::class, 'showDeleted'])->name('classes.showDeleted');
#end

#task7
#begin
Route::patch('classes/restore', [ClassController::class, 'restore'])->name('classes.restore');
Route::delete('classes/trashed/delete', [ClassController::class, 'force_delete'])->name('classes.force_delete');
#end

Route::get('uploadForm', [ExampleController::class, 'uploadForm'])->name('uploadForm');
Route::post('upload', [ExampleController::class, 'upload'])->name('upload');

Route::get('index', [ExampleController::class, 'index'])->name('index');

#for task9
#begin
Route::controller(ProductController::class)->group(function(){
    Route::get('products/create','create')->name('product.create');
    Route::post('products','store')->name('product.store');
});
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
