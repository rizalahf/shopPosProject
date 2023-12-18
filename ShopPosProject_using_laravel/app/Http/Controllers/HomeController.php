<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catalog;
use App\Models\Suplier;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_count = User::count();
        $transaction_count = Transaction::count();
        $product_count = Product::count();
        $suplier_count = Suplier::count();
        $catalog_count = Catalog::count();

        return view('home', compact('user_count', 'transaction_count', 'product_count', 'suplier_count', 'catalog_count'));
    }
}
