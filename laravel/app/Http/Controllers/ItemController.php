<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard(User $user)
    {
        $items = $user->items()->with(['category'])->filter(request(['search', 'category']))->get();
        $plus = 0;
        $minus = 0;

        foreach ($items as $item) {
            if($item->value > 0)
                $plus += $item->value;
            else
                $minus += $item->value;
        }

        return view('dashboard', [
            'items' => $items,
            'plus' => $plus,
            'minus' => $minus
        ]);
    }

    public function stats()
    {
        return view('stats');
    }

    public function history()
    {
        return view('history');
    }
}
