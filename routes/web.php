<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Cowsayphp\Farm\Cow;
use Cowsayphp\Farm\Whale;
use Cowsayphp\Farm\Dragon;
use Cowsayphp\Farm\Tux;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Cowsayphp\Farm;

Route::get('/', [HomeController::class, 'welcome']);
Route::get('/marc', function () {
   echo '<h1>marc</h1>';
});
Route::resource('jobs', JobController::class);

//Route::get('/jobs', [JobController::class, 'index']);
//Route::get('/jobs/create', [JobController::class, 'create']);
//Route::post('/jobs', [JobController::class, 'store']);
//Route::get('/jobs/{id}', [JobController::class, 'show']);
//Route::get('/jobs/{id}/edit', [JobController::class, 'edit']);
//Route::put('/jobs/{id}', [JobController::class, 'update']);
//Route::delete('/jobs/{id}', [JobController::class, 'destroy']);

//Route::get('/post/{id}', function (string $id) {
//    return 'Post '.$id;
//});
//
//Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
//    return 'Post '.$postId.' Comment '.$commentId;
//});

//Route::get('/user/{name?}', function ($name = null) {
//    return $name ? 'User '.$name : 'No user specified';
//});

//Route::get('/user/{id}', function ($id) {
//    return 'User '.$id;
//})->where('id', '[0-9]+');

//Route::get('/user/{id}', function ($id) {
//    return 'User ' . $id;
//});
//
//Route::get('/user', function (Request $request) {
//    return $request->only(['name', 'age']);
//    return $request->all();
//    return $request->has('name');
//    return $request->input('name', 'Default Name');
//    return $request->except(['name']);
//});

//Route::get('/user/{id}/{name}', function (string $id, string $name) {
//    return 'User ' . $id . ' ' . $name;
//})->whereNumber('id')->whereAlpha('name');
//
//
//Route::get('/jobs', function () {
//    return '<h1>Available Jobs</h1>';
//})->name('jobs');
//
//Route::get('/test', function () {
//    $url = route('jobs');
//    return "<a href='$url'>Click here</a>";
//});
//
//Route::get('/test2', function (Request $request) {
//    return $request->query('name');
//});
//
//Route::get('/say/{animal?}/{message?}', function ($animal = null, $message = null) {
//    $animal = $animal ? strtolower($animal) : "cow";
//    if($animal == "whale") {
//        $class = Whale::class;
//    } else if($animal == "dragon") {
//        $class = Dragon::class;
//    } else if($animal == "penguin") {
//        $class = Tux::class;
//    } else {
//        $class = Cow::class;
//    }
//    $message = $message ? $message : "Ohmg I'm a " . $animal . "!";
//    $cow = Farm::create($class);
//    echo '<pre>'.$cow->say($message).'</pre>';
//});
//
//Route::get('/test3', function (Request $request) {
//    return [
//        'method' => $request->method(),
//        'url' => $request->url(),
//        'path' => $request->path(),
//        'fullUrl' => $request->fullUrl(),
//        'ip' => $request->ip(),
//        'userAgent' => $request->userAgent(),
//        'header' => $request->header(),
//    ];
//});
//
//Route::get('/test4', function () {
//    return response('Hello, World!');
//    return response('Hello World', 200);
//    return response('Not Found', 404);
//    return response('<h1>Hello World</h1>')->header('Content-Type', 'text/plain');
//    return response('Hello World')->cookie('name1', 'John Doe');
//});
//
//Route::get('/read-cookie', function (Request $request) {
//    $cookieValue = $request->cookie('name');
//    return response()->json(['cookie' => $cookieValue]);
//});
//
//Route::get('/api/users', function () {
//    return [
//        'name' => 'John Doe',
//        'email' => 'john@gmail.com',
//    ];
//    return response()->json(['name' => 'John Doe',
//        'email' => 'john@gmail.com']);
//});
//
//Route::get('/download', function () {
//    return response()->download(public_path('favicon.ico'));
//});
//
//Route::redirect('/here', '/there');
//
//Route::get('/there', function () {
//    return '<h1>You have arrived</h1>';
//});

//Route::post('/submit', function () {
//    return 'Submitted!';
//});

//Route::match(['get', 'post'], '/submit', function () {
//    return 'Submitted!';
//});
