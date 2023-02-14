<?php

namespace App\Http\Controllers\FoodManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food\FoodRequest;
use App\Http\Requests\Food\StoreRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FoodResource;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = Food::orderBy('name', 'asc')->with('category')->filter(request()->only('search'))->paginate(5);
        $foods = FoodResource::collection($filters)->withQueryString();
        return Inertia::render('Food/Index',[
            'filters' => request()->all('search'),
            'foods' => $foods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return Inertia::render('Food/Create', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        Food::create($request->validated());
        return redirect()->route('food.index')->with('success', 'Food created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return Inertia::render('Food/Show', [
            'food' => FoodResource::make($food)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return Inertia::render('Food/Edit', [
            'food' => FoodResource::make($food),
            'categories' => CategoryResource::collection(Category::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, Food $food)
    {
        $food->update($request->validated());
        return redirect()->route('food.index')->with('success', 'Food updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('food.index')->with('success', 'Food deleted successfully');
    }
}
