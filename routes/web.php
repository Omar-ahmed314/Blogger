<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about.about');
});

$movies = [
    ["id" => 1, "name" => "The intern", "date" => 2012],
    ["id" => 2, "name" => "Quiet place", "date" => 2017],
    ["id" => 3, "name" => "The martian", "date" => 2016],
    ["id" => 4, "name" => "Mad Max Fury road", "date" => 2016],
];

Route::get('/movies', function () use ($movies) {
    // send the movies into the template
    return view('movies.index', ["movies" => $movies]);
});


Route::get('/movies/{id}', function ($id) use ($movies) {
    // get the move by id and send it to the view
    $movie = array_filter($movies, function ($m) use ($id) {
        return $m['id'] === (int)$id;
    });
    return view('movies.movieById', ["movie" => ($movie[0] ?? "Error 404, the movie not found")]);
});
