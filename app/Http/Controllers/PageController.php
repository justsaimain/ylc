<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index()
    {
        $regions = Http::get('http://myancity.devsm.net/api/regions')->json();
        return view('welcome', compact('regions'));
    }
}
