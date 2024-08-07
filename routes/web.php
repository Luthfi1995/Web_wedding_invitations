<?php

use App\Http\Controllers\BiodataPria;
use App\Http\Controllers\BiodataPriaController;
use App\Http\Controllers\BiodataWanita;
use App\Http\Controllers\BiodataWanitaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('auth/login');
    });

    // Handle route register
    Route::match(["GET", "POST"], "/register", function () {
        return redirect("/login");
    })->name("register");

    Auth::routes();

    // Route Home
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

    // Route Info
    Route::get('/info', [InfoController::class, 'index'])->name('info.index');
    Route::get('/info/create', [InfoController::class, 'create'])->name('info.create');
    Route::post('/info', [InfoController::class, 'store'])->name('info.store');
    // Route::get('/info/{info}', [InfoController::class, 'show'])->name('info.show');
    Route::get('/info/{info}/edit', [InfoController::class, 'edit'])->name('info.edit');
    Route::put('/info/{info}', [InfoController::class, 'update'])->name('info.update');
    Route::delete('/info/{info}', [InfoController::class, 'destroy'])->name('info.destroy');

    // Route Story
    Route::get('/story', [StoryController::class, 'index'])->name('story.index');
    Route::get('/story/create', [StoryController::class, 'create'])->name('story.create');
    Route::post('/story', [StoryController::class, 'store'])->name('story.store');
    // Route::get('/story/{story}', [StoryController::class, 'show'])->name('story.show');
    Route::get('/story/{story}/edit', [StoryController::class, 'edit'])->name('story.edit');
    Route::put('/story/{story}', [StoryController::class, 'update'])->name('story.update');
    Route::delete('/story/{story}', [StoryController::class, 'destroy'])->name('story.destroy');

    // Route Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    // Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Route RSVP
    Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
    Route::get('/rsvp/create', [RsvpController::class, 'create'])->name('rsvp.create');
    Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
    // Route::get('/rsvp/{rsvp}', [RsvpController::class, 'show'])->name('rsvp.show');
    Route::get('/rsvp/{rsvp}/edit', [RsvpController::class, 'edit'])->name('rsvp.edit');
    Route::put('/rsvp/{rsvp}', [RsvpController::class, 'update'])->name('rsvp.update');
    Route::delete('/rsvp/{rsvp}', [RsvpController::class, 'destroy'])->name('rsvp.destroy');

    // Route Gifts
    Route::get('/gifts', [GiftsController::class, 'index'])->name('gifts.index');
    Route::get('/gifts/create', [GiftsController::class, 'create'])->name('gifts.create');
    Route::post('/gifts', [GiftsController::class, 'store'])->name('gifts.store');
    // Route::get('/gifts/{gift}', [GiftsController::class, 'show'])->name('gifts.show');
    Route::get('/gifts/{gift}/edit', [GiftsController::class, 'edit'])->name('gifts.edit');
    Route::put('/gifts/{gift}', [GiftsController::class, 'update'])->name('gifts.update');
    Route::delete('/gifts/{gift}', [GiftsController::class, 'destroy'])->name('gifts.destroy');


    //Route BiodataPria
    Route::get('/biodataPria', [BiodataPriaController::class, 'index'])->name('biodataPria.index');
    Route::get('/biodataPria/create', [BiodataPriaController::class, 'create'])->name('biodataPria.create');
    Route::post('/biodataPria', [BiodataPriaController::class, 'store'])->name('biodataPria.store');
    // Route::get('/biodataPria/{biodataPria}', [BiodataPriaController::class, 'show'])->name('biodataPria.show');
    Route::get('/biodataPria/{biodataPria}/edit', [BiodataPriaController::class, 'edit'])->name('biodataPria.edit');
    Route::put('/biodataPria/{biodataPria}', [BiodataPriaController::class, 'update'])->name('biodataPria.update');
    Route::delete('/biodataPria/{biodataPria}', [BiodataPriaController::class, 'destroy'])->name('biodataPria.destroy');

    //Route BiodataPria
    Route::get('/biodataWanita', [BiodataWanitaController::class, 'index'])->name('biodataWanita.index');
    Route::get('/biodataWanita/create', [BiodataWanitaController::class, 'create'])->name('biodataWanita.create');
    Route::post('/biodataWanita', [BiodataWanitaController::class, 'store'])->name('biodataWanita.store');
    // Route::get('/biodataWanita/{biodataWanita}', [BiodataWanitaController::class, 'show'])->name('biodataWanita.show');
    Route::get('/biodataWanita/{biodataWanita}/edit', [BiodataWanitaController::class, 'edit'])->name('biodataWanita.edit');
    Route::put('/biodataWanita/{biodataWanita}', [BiodataWanitaController::class, 'update'])->name('biodataWanita.update');
    Route::delete('/biodataWanita/{biodataWanita}', [BiodataWanitaController::class, 'destroy'])->name('biodataWanita.destroy');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
