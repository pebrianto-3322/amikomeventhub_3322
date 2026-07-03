<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request; 

class WelcomeController extends Controller
{
    public function index(Request $request) 
    {
        $partners = Partner::all();
        $categories = Category::all();
        
        
        $query = Event::with('category');

        
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        
        $events = $query->latest()->get();

        return view('welcome', compact('partners', 'categories', 'events'));
    }
}