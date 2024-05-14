<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Statamic\Facades\Entry;
use Statamic\Facades\Site;
use Statamic\Facades\Taxonomy;
use Statamic\Facades\Term;
use DuncanMcClean\SimpleCommerce\Products\EntryProductRepository;

class ProductController extends Controller
{
    public function show($product_id)
{
    $product = Entry::find($product_id);
    return view('product', ['product' => $product]);
}
}  
