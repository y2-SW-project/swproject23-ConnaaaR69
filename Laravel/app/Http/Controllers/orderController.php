<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function create()
    {
        Auth::user();

        $users = User::all()->except(Auth::user()->id);
        return view('admin.orders.create')->with('users', $users);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'user_id' => 'required',
        ]);

        Order::create([
            'uuid' => Str::uuid(),
            'user_id' => $request->user_id,
        ]);

        return to_route('admin.index');
    }
}
