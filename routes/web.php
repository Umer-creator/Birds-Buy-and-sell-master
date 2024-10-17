<?php


use Illuminate\Support\Facades\Route;


//frontend
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductFrontendController;
use App\Http\Controllers\Frontend\StoreFrontendController;
use App\Http\Controllers\Frontend\CategoryFrontendController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\StripePayment;
use App\Http\Controllers\Frontend\ForumController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;

//user
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserSellerController;

//admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminStoreController;
use App\Http\Controllers\Admin\UserController;



//seller modules Controllers
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerPaymentController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//frontend Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name("frontend.home");
    Route::get('about', 'about')->name("frontend.about");
});

Route::controller(ProductFrontendController::class)->group(function () {
    Route::get('products/{type?}/{name?}/{id?}', 'index')->name("frontend.view-products");
    Route::get('product/detail/{slug}', 'product_detail')->name("frontend.view-product-detail");
});



Route::controller(StoreFrontendController::class)->group(function () {
    Route::get('stores', 'index')->name("frontend.view-stores");
    Route::get('store/{slug}', 'store_detail')->name("frontend.storeDetail");
});

Route::controller(CategoryFrontendController::class)->group(function () {
    Route::get('category/{slug}', 'category_detail')->name("frontend.view-category");
    // Route::get('store/{slug}', 'store_detail')->name("frontend.storeDetail");
});



Route::controller(ForumController::class)->group(function () {
    Route::get('forum', 'index')->name("frontend.view.forum");
    Route::post("forum/add-discussion", 'addDiscussion')->name("frontend.add.discussion");
    Route::get('forum/discussions/{id}', 'discussions')->name("frontend.forum.discussions");
    Route::post("forum/add-reply/{id}", 'addReply')->name("frontend.forum.discussion.add-reply");
});




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->back();
    })->name('dashboard');
});





//user
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'userauth'])->group(function () {
    Route::controller(UserDashboardController::class)->group(function () {
        Route::get("user/dashboard", "index")->name("user.dashboard");
        Route::get("user/profile/edit", "user_profile")->name("user.profile.edit");
        Route::get("user/account/setting", "account_setting")->name("user.account.setting");
        Route::post("user/profile-update", "profile_update")->name("user.profile.update");
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('cart', 'index')->name("cart.view");
        // Route::post("add-to-cart", "add_to_cart")->name("product.addToCart");
    });

    Route::controller(WishlistController::class)->group(function () {
        Route::get('wishlist', 'index')->name("wishlist.view");
        // Route::post("add-to-cart", "add_to_cart")->name("product.addToCart");
    });

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('checkout', 'index')->name("checkout.view");
    });

    Route::controller(StripePayment::class)->group(function () {
        Route::post('order-payment', 'stripePay')->name("stripe.payment");
        Route::get('/payment-fail', 'paymentFail')->name('payment.fail');
        Route::get('/payment-success', 'paymentSuccess')->name('payment.success');
    });

    Route::controller(UserOrderController::class)->group(function () {
        Route::get('user/view-orders', 'index')->name("user.view.orders");
        Route::get('user/view-order/{id}', 'view_order')->name("user.view.order");
        Route::post("user/confirm-order-shipping", "confirmOrderShipping")->name("user.confirm.order.shipping");
    });

    Route::controller(UserSellerController::class)->group(function () {
        Route::get("user/become-a-seller", 'index')->name("user.become-a-seller.view");
        Route::post("user/user-become-a-seller", 'becomeASeller')->name("user.become-a-seller");
    });
});



//admin

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authadmin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get("admin/dashboard", "index")->name("admin.dashboard");
        Route::get("admin/account", "account")->name("admin.account");
        Route::get("admin/profile", "profile")->name("admin.profile");
        Route::post("admin/profile-update", "profile_update")->name("admin.profile.update");
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get("add-category", "index")->name("category.add");
        Route::post("add-category", "add")->name("caProductControllertegory.add");
        Route::get("view-categories", "get")->name("categories.get");
        Route::get("edit-category/{id}", "edit")->name("category.edit");
        Route::post("update-category/{id}", "update")->name("category.update");
        Route::get("delete-category/{id}", "delete")->name("category.delete");
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get("add-product", "index")->name("product.add");
        Route::post("add-product", "add")->name("product.add");
        Route::get("view-products", "getAdminStoreProduct")->name("products.get");
        Route::get("view-stores-products", "getStoresProducts")->name("stores.products.get");
        Route::get("edit-product/{id}", "edit")->name("product.edit");
        Route::post("update-product/{id?}", "update")->name("product.update");
        Route::get("admin-edit-product/{id}", "editProduct")->name("admin.product.edit");
        Route::post("admin-update-product/{id}", "updateProduct")->name("admin.product.update");
        Route::get('delete-product/{id}', 'delete')->name("product.delete");
    });

    Route::controller(AdminStoreController::class)->group(function () {
        Route::get("create-store", "index")->name("admin.store.create");
        Route::post("create-store", "create_store")->name("admin.store.create");
        Route::get("admin-view-admin-store", "store")->name("admin.store.view");
        Route::get("admin-approved-stores", "approvedStores")->name("admin.approved.stores");


        Route::get("admin-notApproved-stores", "notApprovedStores")->name("admin.notApproved.stores");
        Route::get("admin-view-seller-store/{id}", "viewSellerStore")->name("admin.seller.store.view");

        Route::get("admin-delete-seller-store/{id}", "deleteSellerStore")->name("admin.seller.store.delete");
        Route::post("admin-approve-seller-store", "approveSellerStore")->name("admin.approve.seller.store");
        Route::get("admin-store-settings", "adminStoreSettings")->name("admin.store.settings");
        Route::post("admin-store-update", "adminStoreUpdate")->name("admin.store.update");
    });


    Route::controller(UserController::class)->group(function () {
        Route::get("admin/users", "index")->name("admin.view.users");
        Route::get("admin/user-view/{id}", "view")->name("admin.user.view");
        Route::get("admin/user-delete/{id}", "delete")->name("admin.user.delete");
    });




    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('admin/view-orders', 'index')->name("admin.view.orders");
        Route::get('admin/view-order/{id}', 'view_order')->name("admin.view.order");
    });

    Route::controller(AdminPaymentController::class)->group(function () {
        Route::get('admin/stores-payments', 'stores_payments')->name("admin.view.store.payments");
        Route::get('admin/store-orders-payments/{id}', 'storeOrdersPayments')->name("admin.store.orders.payments");
        Route::post("admin/store-pay-pending-payments/{id}", "transferMoney")->name("admin.store.pay.pending.payments");
        Route::get('/store-payment-transfer-fail', 'StoreTransferPaymentFail')->name('store.payment.transfer.fail');
        Route::get('/store-payment-transfer-success/{id}', 'StoreTransferPaymentSuccess')->name('store.payment.transfer.success');

        //testing
        Route::get('admin/stores/transactions', 'listTransactions')->name('admin.stores.transactions');
        Route::get('store/{storeId}/transactions/{transactionId}', 'viewTransaction')->name('store.transactions.view');
    });
});





//seller routs

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'sellerauth'])->group(function () {

    Route::controller(SellerStoreController::class)->group(function () {
        Route::get("seller/dashboard", "index")->name("seller.dashboard");
        Route::get("seller/store-profile", 'storeProfileEdit')->name("seller.store.profile.edit");
        Route::post("seller/store-profile-update", 'storeProfileUpdate')->name("seller.store.profile.update");
        Route::get("seller-store/settings", "sellerStoreSettings")->name("seller.store.settings");
        Route::post("seller-store-update", "sellerStoreUpdate")->name("seller.store.update");
    });

    Route::controller(SellerProductController::class)->group(function () {
        Route::get("selller/view-products", "view")->name("seller.products.views");
        Route::get("seller/add-product", "viewAdd")->name("seller.product.add");
        Route::post("seller/add-product", "add")->name("seller.product.add");
        Route::get("seller/edit-product/{id}", "edit")->name("seller.product.edit");
        Route::post("seller/update-product/{id}", "update")->name("seller.product.update");
        Route::get("seller/product-detail/{id}", "productDetail")->name("seller.product.detail");
        Route::get("seller/delete-product/{id}", "delete")->name("seller.product.delete");
    });

    Route::controller(SellerOrderController::class)->group(function () {
        Route::get("seller/orders", "orders")->name("seller.orders");
        Route::get('seller/view-order/{id}', 'view_order')->name("seller.view.order");
        Route::post("seller/confirm-order-shipping", "confirmOrderShipping")->name("seller.confirm.order.shipping");
    });



    Route::controller(SellerPaymentController::class)->group(function () {
        //testing
        Route::get('seller/stores/transactions', 'listTransactions')->name('seller.store.transactions');
        Route::get('seller-store/transaction-view/{transactionId}', 'viewTransaction')->name('seller.store.transaction.view');
    });
});



//location api routes
Route::get('/api/location-iq-key', function () {
    return env('LOCATION_IQ_API_KEY');
});






















//testing ap


Route::get('/session', function () {
    dump(session()->all());
    die;
    return view('welcome');
});


//error
Route::get('/404', function () {
    return view('error.error404');
})->name("error.404");
