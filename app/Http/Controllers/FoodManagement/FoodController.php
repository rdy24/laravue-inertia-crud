<?php

namespace App\Http\Controllers\FoodManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Food\FoodRequest;
use App\Http\Requests\Food\StoreRequest;
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
        $foods = Food::with('category')
                    ->filter(request()->only('search'))
                    ->paginate(2)
                    ->withQueryString();
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
        $categories = Category::all();
        return Inertia::render('Food/Create', [
            'categories' => $categories
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
        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'uuid' => Str::uuid(),
        ]);
        Alert::success('Success', 'Food created successfully');
        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
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
            'food' => $food,
            'categories' => Category::all()
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
        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        Alert::success('Success', 'Food updated successfully');
        return redirect()->route('food.index');
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
        Alert::success('Success', 'Food deleted successfully');
        return redirect()->route('food.index');
    }
}
