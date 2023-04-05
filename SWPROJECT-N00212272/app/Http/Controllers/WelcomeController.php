<?php
namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Product;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {

        $products = Product::all();

      


        return view('welcome')->with('products', $products);
    }

    
}
