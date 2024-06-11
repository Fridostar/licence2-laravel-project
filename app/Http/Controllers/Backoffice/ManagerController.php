<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function home() {

        return view('backoffice.managers.home', [
            'subscribersList' => '500',
            'subscriptionsList' => '1000'
        ]);
    }


    // Route::get('/backoffice/manager/subscription', [ManagerController::class, 'subscriptions'])->name('dashboard.manager.subscription');
        
        // Route::get('/backoffice/manager/rooms', [ManagerController::class, 'roomsList'])->name('dashboard.manager.rooms.list');
        // Route::get('/backoffice/manager/rooms/store', [ManagerController::class, 'form'])->name('dashboard.manager.rooms.form');
        // Route::post('/backoffice/manager/rooms/store', [ManagerController::class, 'roomStore'])->name('dashboard.manager.rooms.store');
        // Route::get('/backoffice/manager/rooms/{id}', [ManagerController::class, 'roomShow'])->name('dashboard.manager.rooms.show');
        // Route::put('/backoffice/manager/rooms/{id}', [ManagerController::class, 'roomEdit'])->name('dashboard.manager.rooms.update');
        // Route::delete('/backoffice/manager/rooms/{id}', [ManagerController::class, 'roomDestroy'])->name('dashboard.manager.rooms.destroy');

        // Route::get('/backoffice/manager/outfits', [ManagerController::class, 'outfitsList'])->name('dashboard.manager.outfits.list');
        // Route::get('/backoffice/manager/rooms/store', [ManagerController::class, 'form'])->name('dashboard.manager.outfits.form');
        // Route::post('/backoffice/manager/outfits', [ManagerController::class, 'home'])->name('dashboard.manager.outfits.store;');
        // Route::get('/backoffice/manager/outfits-{id}', [ManagerController::class, 'home'])->name('dashboard.manager.outfits.show;');
        // Route::put('/backoffice/manager/outfits-{id}', [ManagerController::class, 'home'])->name('dashboard.manager.outfits.update;');
        // Route::delete('/backoffice/manager/outfits-{id}', [ManagerController::class, 'home'])->name('dashboard.manager.outfits.destroy;');
}
