<?php

//Route::get('/', FjordApp\Controllers\DashboardController::class)->name('dashboard');

// Employee
Route::get("/export-employees", FjordApp\Controllers\Crud\EmployeeController::class . "@exportEmployees");

// Project
Route::post("/set-project-state/{project}", FjordApp\Controllers\Crud\ProjectController::class . "@setProjectState");
