<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Entry;
use Statamic\Facades\Site;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Entry::whereCollection('categories')->get();

        return inertia('Categories', [
            'categories' => $categories,
        ]);
    }

    public function show($slug)
    {
        $category = Entry::whereCollection('categories')->where('slug', $slug)->first();

        if (!$category) {
            abort(404);
        }

        $products = $category->products()->get();

        return inertia('Category', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}