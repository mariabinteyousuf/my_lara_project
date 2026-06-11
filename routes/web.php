<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
   return view('home');
    
});

//show all job
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

//show a page to create new job
Route::get('/jobs/create',function(){
  return view('jobs.create');
});


//show single job
Route::get('/jobs/{id}', function ($id)  {
  
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});

