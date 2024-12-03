<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;


// Redirige vers dashboard en cas d'erreur sur l'url
Route::fallback([RedirectionController::class, 'redirectToHome']);

// Permet de checker la langue défini par l'utilisateur
Route::middleware(['web', 'lang.toggle'])->group(function () {

    // Route pour changer la langue
    Route::get('lang/{locale}', function (string $locale) {
        if (! in_array($locale, ['en', 'fr'])) {
            return redirect()->back()->with('error', __('messages.langage_not_supported'));
        }
        
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back(); 
    })->name('lang.switch');

    // Permet de rediriger vers la page d'accueil, pour séléctionner entrepot ou magasin
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // Redifirige vers la page de connexion
    Route::get('/warehouse', function () {
        return redirect()->route('warehouse.login');
    });

    // Routes concernant les utilisateurs de l'entrepot
    Route::prefix('warehouse')->name('warehouse.')->group(function () {
        Route::get('/login', function () {
            if (auth()->guard('warehouse')->check()) {
                return redirect()->route('warehouse.dashboard');
            }
            return (new AuthController)->showLoginFormWarehouse();
        })->name('login');

        Route::post('/login', [AuthController::class, 'loginWarehouse'])->name('login.submit');

        Route::get('/logout', [AuthController::class, 'logoutWarehouse'])->name('logout');

        // Routes lorsque user est authentifié
        Route::middleware('auth:warehouse')->group(function () {
            Route::fallback([RedirectionController::class, 'redirectToDashboardWarehouse']);

            Route::get('/dashboard', [DashboardController::class, 'indexWarehouse'])->name('dashboard');

            Route::prefix('product')->name('product.')->group(function () {
                Route::get('/search', [ProductController::class, 'index'])->name('index');
                Route::get('/search/results', [ProductController::class, 'searchProducts'])->name('search');
                Route::get('/{product_id}/add', [ProductController::class, 'addProduct'])->name('add');
                Route::post('/add', [ProductController::class, 'addProductSubmit'])->name('add.submit');
            });

            Route::prefix('stock')->name('stock.')->group(function () {
                Route::get('/', [StockController::class, 'index'])->name('index');

                Route::get('/list', [StockController::class, 'stockList'])->name('list');

                Route::prefix('supply')->name('supply.')->group(function() {
                    Route::get('/make', [StockController::class, 'makeSupplyStock'])->name('make');
                    Route::post('/make', [StockController::class, 'makeSupplyStockSubmit'])->name('make.submit');
                });

                Route::prefix('product')->name('product.')->group(function () {
                    Route::get('/{stock_id}/info', [StockController::class, 'infoProduct'])->name('info');
                    Route::get('/{stock_id}/edit', [StockController::class, 'editProduct'])->name('edit');
                    Route::post('/edit', [StockController::class, 'editProductSubmit'])->name('edit.submit');
                    Route::get('/{stock_id}/supply', [StockController::class, 'supplyProduct'])->name('supply');
                    Route::post('/supply', [StockController::class, 'supplyProductSubmit'])->name('supply.submit');
                    Route::get('/{stock_id}/remove', [StockController::class, 'removeProduct'])->name('remove');
                    Route::post('/remove/quantity', [StockController::class, 'removeQuantityProductSubmit'])->name('remove.quantity.submit');
                    Route::post('/remove/product', [StockController::class, 'removeProductSubmit'])->name('remove.product.submit');
                });
            });
        });
    });

    Route::get('/store', function () {
        return redirect()->route('store.login');
    });

    Route::prefix('store')->name('store.')->group(function () {
        Route::get('/login', function () {
            if (auth()->guard('store')->check()) {
                return redirect()->route('store.dashboard');
            }
            return (new AuthController)->showLoginFormStore();
        })->name('login');

        Route::post('/login', [AuthController::class, 'loginStore'])->name('login.submit');

        Route::get('/logout', [AuthController::class, 'logoutStore'])->name('logout');
        
        // Routes concernant les utilisateurs du magasin
        Route::middleware('auth:store')->group(function () {
            Route::fallback([RedirectionController::class, 'redirectToDashboardStore']);

            Route::get('/dashboard', [DashboardController::class, 'indexStore'])->name('dashboard');

            // Tableau de bord des commandes (liste fonctionnalités commandes)
            Route::prefix('order')->name('order.')->group(function () {
                Route::get('/', [OrderController::class, 'indexStore'])->name('index');

                Route::get('/place', [OrderController::class, 'placeOrderStore'])->name('place');

                Route::post('/place', [OrderController::class, 'storeDataInTheCartStore'])->name('store');

                Route::get('/place/recap', [OrderController::class, 'recapOrderStore'])->name('recap');
                
                Route::post('/place/confirm', [OrderController::class, 'confirmOrderStore'])->name('confirm');
            });

        });
    });
});



