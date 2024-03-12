<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PastEvent;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::orderby('date', 'asc')->paginate(3);
        $pastevents = PastEvent::orderby('date', 'desc')->paginate(4);
        foreach ($pastevents as $pastevent) {
            $date = \DateTime::createFromFormat('Y-m-d', $pastevent->date);
            $pastevent->date = $date->format('F j, Y');
        }
        return view('index', [
            'events' => $events,
            'pastevents' => $pastevents,
        ]);
    }
}
