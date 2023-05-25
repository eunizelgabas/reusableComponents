<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {

        $items = Item::orderBy('name')
            ->with('office')
            ->get();

        return inertia('Items', compact('items'));
    }
}
