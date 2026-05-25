<?php
namespace App\Http\Controllers;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Event;

class WelcomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $categories = Category::all();
        $events = Event::with('category')->latest()->get();
        return view('welcome', compact('partners', 'categories', 'events'));
    }
}