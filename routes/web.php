<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcom');
});

Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create' , [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice',[InvoiceController::class, 'store'])->name('invoice.store');
Route::get('/invoice/{id}/edit',[InvoiceController::class,'edit'])->name('invoice.edit');
Route::put('/invoice/{id}',[InvoiceController::class,'update'])->name('invoice.update');
Route::delete('/invoice/{id}',[InvoiceController::class,'destroy'])->name('invoice.destroy');
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
