<?php

Auth::routes();

//==============Admin=================
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('/admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');

//=================Admin Side Category=================
Route::get('admin/category', 'Admin\CategoryController@index')->name('admin.category');
Route::post('admin/category-store', 'Admin\CategoryController@category_store')->name('category.store');
Route::get('admin/category/edit/{category_id}', 'Admin\CategoryController@category_edit');
Route::post('admin/category-update', 'Admin\CategoryController@category_update')->name('category.update');
Route::get('admin/category/delete/{category_id}', 'Admin\CategoryController@category_delete');
Route::get('admin/category/inactive/{category_id}', 'Admin\CategoryController@category_inactive');
Route::get('admin/category/active/{category_id}', 'Admin\CategoryController@category_active');

//=================Admin Side Brand=================
Route::get('admin/brand', 'Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-store', 'Admin\BrandController@brand_store')->name('brand.store');
Route::get('admin/brand/edit/{brand_id}', 'Admin\BrandController@brand_edit');
Route::post('admin/brand-update', 'Admin\BrandController@brand_update')->name('brand.update');
Route::get('admin/brand/delete/{brand_id}', 'Admin\BrandController@brand_delete');
Route::get('admin/brand/inactive/{brand_id}', 'Admin\BrandController@brand_inactive');
Route::get('admin/brand/active/{brand_id}', 'Admin\BrandController@brand_active');

//=================Admin Side Contact/Message=================
Route::get('admin/contact', 'Admin\ContactController@index')->name('admin.contact');
Route::get('admin/contact/view/{contact_id}', 'Admin\ContactController@contact_view');
Route::get('admin/contact/delete/{contact_id}', 'Admin\ContactController@contact_delete');

//=================Admin Side Subscriber=================
Route::get('admin/subscribe', 'Admin\ContactController@subscribe')->name('admin.subscriber');
Route::get('admin/subscriber/delete/{subscribe_id}', 'Admin\ContactController@subscribe_delete');

//=================Admin Side Info=================
Route::get('admin/info', 'Admin\InfoController@index')->name('admin.info');
Route::post('admin/info-store', 'Admin\InfoController@info_store')->name('info.store');
Route::get('admin/info/edit/{info_id}', 'Admin\InfoController@info_edit');
Route::post('admin/info-update', 'Admin\InfoController@info_update')->name('info.update');
Route::get('admin/info/delete/{info_id}', 'Admin\InfoController@info_delete');


//=================Admin Side Blog=================
Route::get('admin/blog', 'Admin\BlogController@index')->name('admin.blog');
Route::post('admin/blog-store', 'Admin\BlogController@blog_store')->name('blog.store');
Route::get('admin/blog/edit/{blog_id}', 'Admin\BlogController@blog_edit');
Route::post('admin/blog-update', 'Admin\BlogController@blog_update')->name('blog.update');
Route::get('admin/blog/delete/{blog_id}', 'Admin\BlogController@blog_delete');
Route::get('admin/blog/inactive/{blog_id}', 'Admin\BlogController@blog_inactive');
Route::get('admin/blog/active/{blog_id}', 'Admin\BlogController@blog_active');

//=================Admin Side Product=================
Route::get('admin/product/add', 'Admin\ProductController@index')->name('admin.product.add');
Route::post('admin/product-store', 'Admin\ProductController@product_store')->name('product.store');
Route::get('admin/product-manage', 'Admin\ProductController@product_manage')->name('admin.product.manage');
Route::get('admin/product/edit/{product_id}', 'Admin\ProductController@product_edit');
Route::post('admin/product-data-update', 'Admin\ProductController@product_data_update')->name('product.data.update');
Route::post('admin/product-image-update', 'Admin\ProductController@product_image_update')->name('product.image.update');
Route::get('admin/product/delete/{product_id}', 'Admin\ProductController@product_delete');
Route::get('admin/product/inactive/{product_id}', 'Admin\ProductController@product_inactive');
Route::get('admin/product/active/{product_id}', 'Admin\ProductController@product_active');

//=================Admin Side Advertise=================
Route::get('admin/advertise/add', 'Admin\AdvertiseController@index')->name('admin.advertise.add');
Route::post('admin/advertise-store', 'Admin\AdvertiseController@advertise_store')->name('advertise.store');
Route::get('admin/advertise-manage', 'Admin\AdvertiseController@advertise_manage')->name('admin.advertise.manage');
Route::get('admin/advertise/edit/{advertise_id}', 'Admin\AdvertiseController@advertise_edit');
Route::post('admin/advertise-data-update', 'Admin\AdvertiseController@advertise_data_update')->name('advertise.data.update');
Route::post('admin/advertise-image-update', 'Admin\AdvertiseController@advertise_image_update')->name('advertise.image.update');
Route::get('admin/advertise/delete/{advertise_id}', 'Admin\AdvertiseController@advertise_delete');
Route::get('admin/advertise/inactive/{advertise_id}', 'Admin\AdvertiseController@advertise_inactive');
Route::get('admin/advertise/active/{advertise_id}', 'Admin\AdvertiseController@advertise_active');


//=================Admin Side Banner=================
Route::get('admin/banner/add', 'Admin\BannerController@index')->name('admin.banner.add');
Route::post('admin/banner-store', 'Admin\BannerController@banner_store')->name('banner.store');
Route::get('admin/banner-manage', 'Admin\BannerController@banner_manage')->name('admin.banner.manage');
Route::get('admin/banner/edit/{banner_id}', 'Admin\BannerController@banner_edit');
Route::post('admin/banner-data-update', 'Admin\BannerController@banner_data_update')->name('banner.data.update');
Route::post('admin/banner-image-update', 'Admin\BannerController@banner_image_update')->name('banner.image.update');
Route::get('admin/banner/delete/{banner_id}', 'Admin\BannerController@banner_delete');
Route::get('admin/banner/inactive/{banner_id}', 'Admin\BannerController@banner_inactive');
Route::get('admin/banner/active/{banner_id}', 'Admin\BannerController@banner_active');

//=================Admin Side Post=================
Route::get('admin/post/add', 'Admin\PostController@index')->name('admin.post.add');
Route::post('admin/post-store', 'Admin\PostController@post_store')->name('post.store');
Route::get('admin/post-manage', 'Admin\PostController@post_manage')->name('admin.post.manage');
Route::get('admin/post/edit/{post_id}', 'Admin\PostController@post_edit');
Route::post('admin/post-data-update', 'Admin\PostController@post_data_update')->name('post.data.update');
Route::post('admin/post-image-update', 'Admin\PostController@post_image_update')->name('post.image.update');
Route::get('admin/post/delete/{post_id}', 'Admin\PostController@post_delete');
Route::get('admin/post/inactive/{post_id}', 'Admin\PostController@post_inactive');
Route::get('admin/post/active/{post_id}', 'Admin\PostController@post_active');

//=================Admin Side Coupon=================
Route::get('admin/coupon', 'Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupon-store', 'Admin\CouponController@coupon_store')->name('coupon.store');
Route::get('admin/coupon/edit/{coupon_id}', 'Admin\CouponController@coupon_edit');
Route::post('admin/coupon-update', 'Admin\CouponController@coupon_update')->name('coupon.update');
Route::get('admin/coupon/delete/{coupon_id}', 'Admin\CouponController@coupon_delete');
Route::get('admin/coupon/inactive/{coupon_id}', 'Admin\CouponController@coupon_inactive');
Route::get('admin/coupon/active/{coupon_id}', 'Admin\CouponController@coupon_active');

//==============Admin Side Order==================
Route::get('admin/orders', 'Admin\OrderController@index')->name('admin.orders');
Route::get('admin/order/done/{order_id}', 'Admin\OrderController@order_done');
Route::get('admin/order/pending/{order_id}', 'Admin\OrderController@order_pending');
Route::get('admin/order/view/{order_id}', 'Admin\OrderController@order_view');


//===========cart==========
Route::post('add-to-cart/{product_id}', 'CartController@add_to_cart');
Route::get('/shoping-cart', 'CartController@shoping_cart')->name('shoping_cart');
Route::get('/cart/destroy/{cart_id}', 'CartController@destroy_cart');
Route::post('/cart/qty/update/{cart_id}', 'CartController@qty_update_cart');
Route::post('/coupon-apply', 'CartController@coupon_apply');
//==coupon==
Route::get('coupon-destroy', 'CartController@destroy_coupon');


//=======wishlist=========
Route::get('add-to-wishlist/{product_id}', 'WishlistController@add_to_wishlist');
Route::get('/wishlist', 'WishlistController@index')->name('wishlist');
Route::get('/wishlist/destroy/{wishlist_id}', 'WishlistController@destroy_wishlist');

//===Checkout Page===
Route::get('/checkout', 'CheckoutController@index');
//place-order
Route::post('place-order', 'CheckoutController@place_order')->name('place-order');



//=================User=================
Route::get('/', 'FrontendController@index')->name('homepage');
Route::get('/shop-details/{product_id}', 'FrontendController@shop_details')->name('shop_details');
Route::get('/shop-grid', 'FrontendController@shop_grid')->name('shop_grid');
Route::get('/category-grid/{cat_id}', 'FrontendController@category_grid')->name('category_grid');




//Route::get('/blog', 'FrontendController@blog')->name('blog');
//Route::get('/blog-details', 'FrontendController@blog_details')->name('blog_details');
Route::get('/contact', 'FrontendController@contact')->name('contact');





//===user profile===
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'UserController@index')->name('home');
Route::get('order/view/{order_id}', 'UserController@order_view');

//Search
Route::any('/search','FrontendController@search')->name('search');

//==blog==
Route::get('/blogs','FrontendController@blogs')->name('blogs');
Route::get('blog-detail/{id}', 'FrontendController@blog_details')->name('blog-details');

//====leave message===
Route::post('/submit', 'FrontendController@contact_store')->name('submit');
//===subscribers
Route::post('/email-submit', 'FrontendController@email_store')->name('email-submit');