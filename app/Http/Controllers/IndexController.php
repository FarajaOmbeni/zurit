<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::orderby('date', 'asc')->paginate(3);
        return view('index', [
            'events' => $events,
        ]);
    }
}
