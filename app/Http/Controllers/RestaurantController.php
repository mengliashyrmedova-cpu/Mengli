<?php

namespace App\Http\Controllers;

use \App\Models\Restourant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurantIndex()
    {
        $restaurants = Restourant::get();
        return view("restaurants.index", compact('restaurants'));
    }
    public function restaurantShow($id)
    {
        $pag = Restourant::paginate(8);
        $restourant = Restourant::with('foods.category')->findOrFail($id);
        return view("restaurants.show", compact('restourant','pag'));
    }
}