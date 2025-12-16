<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;


Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/order/{event}', [OrderController::class, 'form'])->name('order.form');
Route::post('/order/{event}', [OrderController::class, 'store'])->name('order.store');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

// Riwayat pesanan user
Route::get('/riwayat', [OrderController::class, 'history'])->name('orders.history');


// Halaman Admin
Route::get('/admin', [EventController::class, 'adminDashboard'])->name('admin.dashboard');

// CRUD Event (tanpa middleware)
Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');


// Order management
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::post('/admin/orders/{order}/confirm', [OrderController::class, 'confirm'])->name('admin.orders.confirm');
