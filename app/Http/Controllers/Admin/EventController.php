<?php
namespace App\Http\Controllers\Admin;

use App\Models\Event;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::with('category')->findOrFail($id);
        return view('event-detail', compact('event'));
    }

    public function checkout($id)
    {
        $event = Event::with('category')->findOrFail($id);
        return view('checkout', compact('event'));
    }

    public function ticket()
    {
        return view('ticket');
    }
}