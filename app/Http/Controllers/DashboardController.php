<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $category = Category::count();
        $food = Food::count();

        return Inertia::render('Dashboard/Index', [
            'category' => $category,
            'food' => $food,
        ]);
    }
}
