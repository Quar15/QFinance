<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        $items = auth()->user()->items()->latest()->with(['category'])->filter(request(['search', 'category']))->get();
        $plus = 0;
        $minus = 0;

        $categories = [];

        foreach ($items as $item) {
            if($item->value > 0)
                $plus += $item->value;
            else
                $minus += $item->value;

            if(!in_array($item->category, $categories))
            {
                $categories[] = $item->category;
            }
        }

        return view('dashboard', [
            'items' => $items,
            'categories' => $categories,
            'plus' => $plus,
            'minus' => $minus
        ]);
    }

    public function add()
    {
        // Create new Item for logged in user
        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'value' => ['required'],
            'category_id' => ['required']
        ]);

        if(!Category::find(request('category_id')))
        {
            return redirect('/dashboard')->with('fail', 'Something went wrong');
        }
            

        $attributes['user_id'] = auth()->user()->id;

        $item = Item::create($attributes);

        return redirect('/dashboard')->with('success', 'Item added');
    }

    public function update()
    {
        $item = Item::find(request('id'));

        // Item with this id doesn't exist
        if(!$item)
            return redirect('/dashboard')->with('fail', 'Something went wrong');

        // Active user doesn't match with item owner
        if(!auth()->user()->id == $item->user->id)
            return redirect('/dashboard')->with('fail', 'Something went wrong');
        
        // Category doesn't exist
        if(!Category::find(request('category_id')))
            return redirect('/dashboard')->with('fail', 'Something went wrong');

        $item['title'] = request('title');
        $item['value'] = request('value');
        $item['category_id'] = request('category_id');
        $item->save();

        return redirect('/dashboard')->with('success', 'Item updated');
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
