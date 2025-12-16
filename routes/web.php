<?php

use App\Livewire\Cart\Show as CartShow;
use App\Livewire\Dashboard;
use App\Livewire\Foodtrucks\Index as FoodtruckIndex;
use App\Livewire\Foodtrucks\Menu as FoodtruckMenu;
use App\Livewire\Orders\Index as OrdersIndex;
use App\Livewire\Orders\Show as OrdersShow;
use App\Livewire\Pages\LineupPage;
use App\Livewire\Pages\MapPage;
use App\Livewire\Pages\StagePage;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/foodtrucks', FoodtruckIndex::class)->name('foodtrucks.index');
    Route::get('/foodtrucks/{foodtruck:slug}/menu', FoodtruckMenu::class)->name('foodtrucks.menu');

    Route::get('/cart', CartShow::class)->name('cart.show');

    Route::get('/orders', OrdersIndex::class)->name('orders.index');
    Route::get('/orders/{order}', OrdersShow::class)->name('orders.show')->can('view', 'order');

    Route::get('/map', MapPage::class)->name('map');
    Route::get('/lineup', LineupPage::class)->name('lineup');
    Route::get('/stages/{stage}', StagePage::class)->name('stages.show');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
