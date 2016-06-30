<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('coba', function () {
// Update the user's profile...
    return redirect('tes')->with('status', 'Profile updated!');
});
Route::get('/tes', 'MainController@test');

Route::get('/uploader', function() {
    return view('upload');
});
Route::post('/simpen', [
    'uses' => 'MainController@upload',
    'as' => 'upload',
    'middleware' => 'web']);
Route::get('/', [
    'uses' => 'MainController@home',
    'as' => 'home'
    ]);
Route::get('/berita', [
    'uses' => 'NewsController@news',
    'as' => 'news'
    ]);
Route::get('/product', [
    'uses' => 'ProductController@products',
    'as' => 'products'
    ]);
Route::get('/baitulmaal', [
    'uses' => 'BaitulController@baitulmaals',
    'as' => 'baitulmaals'
    ]);
Route::get('/berita/{tag}', [
    'uses' => 'MainController@viewTag',
    'as' => 'view.tag'
    ]);
Route::get('/berita/{tag}/{slug}.html', [
    'uses' => 'NewsController@viewNews',
    'as' => 'view.news'
    ]);
Route::get('/sejarah', [
    'uses' => 'ProfileController@sejarah',
    'as' => 'sejarah'
    ]);
Route::get('/visi-misi', [
    'uses' => 'ProfileController@visiMisi',
    'as' => 'visi.misi'
    ]);
Route::get('/struktur-organisasi', [
    'uses' => 'ProfileController@struktur',
    'as' => 'struktur.organisasi'
    ]);
Route::get('/kantor', [
    'uses' => 'KantorController@kantor',
    'as' => 'kantor'
    ]);

Route::get('/gambar', function()
{
    Image::make('upload/hinata.png',array(
            'width' => 100,
            'height' => 300,
            'grayscale' => true
        ))->save('upload/thumbnail.jpg');;
});

Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

 // Registration Routes...
        Route::get('register_admin', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@showRegistrationForm']);
        Route::post('register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@register']);

        // Password Reset Routes...
        Route::get('password/reset/{token?}', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@showResetForm']);
        Route::post('password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
        Route::post('password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);/*
Route::auth();*/

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [
        'uses' => 'AdminController@dashboard',
        'as' => 'dashboard'
        ]);
    Route::get('/dashboard/visi-misi', [
        'uses' => 'ProfileController@visiMisi_edit',
        'as' => 'dashboard.visi-misi'
        ]);
    Route::post('/dashboard/save-visi-misi', [
        'uses' => 'ProfileController@visiMisi_save',
        'as' => 'visi-misi.edit'
        ]);
    Route::get('/dashboard/sejarah', [
        'uses' => 'ProfileController@sejarah_edit',
        'as' => 'dashboard.sejarah'
        ]);
    Route::post('/dashboard/save-sejarah', [
        'uses' => 'ProfileController@sejarah_save',
        'as' => 'sejarah.edit'
        ]);
    Route::get('/dashboard/struktur-organisasi', [
    'uses' => 'ProfileController@struktur_edit',
    'as' => 'dashboard.struktur'
    ]);
    Route::post('/dashboard/save-struktur-organisasi', [
        'uses' => 'ProfileController@struktur_save',
        'as' => 'struktur.edit'
        ]);
    Route::get('/dashboard/tambah-berita', [
        'uses' => 'NewsController@addNews',
        'as' => 'dashboard.add-news'
        ]);
    Route::get('/dashboard/tambah-produk', [
        'uses' => 'ProductController@addProduct',
        'as' => 'dashboard.add-product'
        ]);
    Route::get('/dashboard/tambah-baitulmaal', [
        'uses' => 'BaitulController@addBaitulmaal',
        'as' => 'dashboard.add-baitulmaal'
        ]);
    // Tambah tag
    Route::post('/dashboard/addtag', [
        'uses' => 'AdminController@add_tag',
        'as' => 'dashboard.add-tag'
        ]);
    // Hapus Tag
    Route::post('/dashboard/deltag', [
        'uses' => 'AdminController@delTag',
        'as' => 'dashboard.del-tag'
        ]);
    // Proses DB edit Berita
    Route::post('/dashboard/editnews', [
        'uses' => 'NewsController@news_edit',
        'as' => 'news.edit'
        ]);
    // Proses DB tambah Berita
    Route::post('/dashboard/addnews', [
        'uses' => 'NewsController@news_add',
        'as' => 'news.add'
        ]);
    // Proses DB hapus Berita
    Route::post('/dashboard/delnews', [
        'uses' => 'NewsController@news_del',
        'as' => 'news.del'
        ]);
    // Proses DB tambah produk
    Route::post('/dashboard/addproduct', [
        'uses' => 'ProductController@product_add',
        'as' => 'product.add'
        ]);
    // Proses DB edit Product
    Route::post('/dashboard/editproduct', [
        'uses' => 'ProductController@product_edit',
        'as' => 'product.edit'
        ]);
    // Proses DB hapus Produk
    Route::post('/dashboard/delproduct', [
        'uses' => 'ProductController@product_del',
        'as' => 'product.del'
        ]);
    // Proses DB tambah Baitulmaal
    Route::post('/dashboard/addbaitulmaal', [
        'uses' => 'BaitulController@baitulmaal_add',
        'as' => 'baitulmaal.add'
        ]);
    // Proses DB edit Baitulmaal
    Route::post('/dashboard/editbaitulmaal', [
        'uses' => 'BaitulController@baitulmaal_edit',
        'as' => 'baitulmaal.edit'
        ]);
    // Proses DB hapus Baitulmaal
    Route::post('/dashboard/delbaitulmaal', [
        'uses' => 'BaitulController@baitulmaal_del',
        'as' => 'baitulmaal.del'
        ]);
    // List News
    Route::get('/dashboard/daftar-berita', [
        'uses' => 'NewsController@listNews',
        'as' => 'dashboard.list-news'
        ]);
    // List Product
    Route::get('/dashboard/daftar-produk', [
        'uses' => 'ProductController@listProduct',
        'as' => 'dashboard.list-product'
        ]);
    // List Baitulmaal
    Route::get('/dashboard/daftar-baitulmaal', [
        'uses' => 'BaitulController@listBaitulmaal',
        'as' => 'dashboard.list-baitulmaal'
        ]);
    // Form Edit News
    Route::get('/dashboard/edit-berita/{id}', [
        'uses' => 'NewsController@editNews',
        'as' => 'dashboard.edit-news'
        ]);
    // Form Edit Product
    Route::get('/dashboard/edit-produk/{id}', [
        'uses' => 'ProductController@editProduct',
        'as' => 'dashboard.edit-product'
        ]);
    // Form Edit Baitulmaal
    Route::get('/dashboard/edit-baitulmaal/{id}', [
        'uses' => 'BaitulController@editBaitulmaal',
        'as' => 'dashboard.edit-baitulmaal'
        ]);

    // Slider
    Route::get('/dashboard/slider', [
        'uses' => 'SlideController@slider',
        'as' => 'dashboard.slide']);
    // Form Tambah Slide
    Route::post('/dashboard/add-slide', [
        'uses' => 'SlideController@slide_add',
        'as' => 'slide.add'
        ]);
    // Form Edit Slide
    Route::get('/dashboard/edit-slide/{id}', [
        'uses' => 'SlideController@editSlide',
        'as' => 'dashboard.edit-slide'
        ]);
    // Proses DB hapus Slider
    Route::post('/dashboard/delslide', [
        'uses' => 'SlideController@slide_del',
        'as' => 'slide.del'
        ]);
    // Proses edit slide
    Route::post('/dashboard/editslide', [
        'uses' => 'SlideController@slide_edit',
        'as' => 'slide.edit'
        ]);
    Route::get('/dashboard/iklan', [
        'uses' => 'AdminController@iklan',
        'as' => 'dashboard.iklan'
        ]);
    Route::post('/dashboard/editiklan', [
        'uses' => 'AdminController@iklan_edit',
        'as' => 'iklan.edit'
        ]);
    Route::get('/katalog', [
        'uses' => 'AdminController@katalog',
        'as' => 'dashboard.katalog']);
    Route::post('/dashboard/editkatalog', [
        'uses' => 'AdminController@katalog_edit',
        'as' => 'katalog.edit'
        ]);
    // Kantor
    Route::get('/dashboard/kantor', [
        'uses' => 'AdminController@kantor',
        'as' => 'dashboard.kantor'
        ]);
    Route::get('/dashboard/form-edit-kantor/{id}', [
        'uses' => 'AdminController@form_edit_kantor',
        'as' => 'dashboard.form_edit_kantor'
        ]);
    Route::post('/dashboard/addkantor', [
        'uses' => 'AdminController@kantor_add',
        'as' => 'kantor.add'
        ]);
    Route::post('/dashboard/editkantor', [
        'uses' => 'AdminController@kantor_edit',
        'as' => 'kantor.edit'
        ]);
    Route::post('/dashboard/delkantor', [
        'uses' => 'AdminController@kantor_del',
        'as' => 'kantor.del'
        ]);

});
