<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\UpdateLastSeen;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ChatController::class, 'index'])->name('dashboard');
});


Route::middleware('auth', UpdateLastSeen::class)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])
    ->middleware(['auth'])
    ->name('profile.updatePicture');



Route::middleware(['auth', UpdateLastSeen::class])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/messages/{type}/{id}', [ChatController::class, 'getMessages'])->middleware('auth');

    // Route::get('/chat/messages/{userId}', [ChatController::class, 'getMessages'])->name('chat.messages');
    Route::post('/chat/grupos', [ChatController::class, 'storeGrupo'])->name('chat.store');
    Route::get('/chat/grupo/{id}/usuarios', [ChatController::class, 'getGroupUsers'])->name('grupo.usuarios');
});



Route::post('/mensagem/enviar', [App\Http\Controllers\ChatController::class, 'send'])->middleware('auth');

require __DIR__.'/auth.php';
