<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $product_count = Product::count();
        $article_count = article::count();
        $cart_count = Customer::count();
        $user_count = User::count();

        return view('admin.home', [
           'title' => 'Trang Quản Trị Admin',
           'product_count' => $product_count,
           'article_count' => $article_count,
           'cart_count' => $cart_count,
           'user_count' => $user_count,
        ]);
    }
}
