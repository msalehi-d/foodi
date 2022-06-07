<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFoodReq;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $foods = Food::orderBy('id', 'DESC')->get();
        return view('admin.food.index', compact('foods', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFoodReq $request)
    {
        $food = new Food;
        $food->name = $request->name;
        $food->category_id = $request->category;
        $food->description = $request->description;
        $food->regular_price = $request->regular_price;
        $food->stock = $request->stock;
        $food->preparation_time = $request->preparation_time;
        $path = $request->file('image')->store('images/foods');
        $food->image = $path;

        $food->save();
        return redirect()->route('admin.food.index')->with('success', 'Food created successfully');
    }


    public function show(Food $food)
    {
        //
    }


    public function edit(Food $food)
    {
        $categories = Category::all();
        return view('admin.food.edit', compact('food', 'categories'));
    }


    public function update(Request $request, Food $food)
    {
        $food->name = $request->name;
        $food->category_id = $request->category;
        $food->description = $request->description;
        $food->regular_price = $request->regular_price;
        $food->stock = $request->stock;
        $food->preparation_time = $request->preparation_time;
        if ($request->hasFile('image')) {
            Storage::delete($food->image);
            $path = $request->file('image')->store('images/foods');
            $food->image = $path;
        }

        $food->save();
        return redirect()->route('admin.food.index')->with('success', 'Food created successfully');
    }


    public function destroy(Food $food)
    {
        $food->delete();
        return back();
    }
}
