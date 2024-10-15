<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function show(Request $request, User $user): View
    {
        return view('user.message', compact('user'));
    }

    public function submit(Request $request, User $user): View
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'details' => 'required',
        ]);


        $customer = Customer::firstOrCreate([
            'email' => $attributes['email']
        ], [
            'first_name' => $attributes['first_name'],
            'user_id' => $user->id,
        ]);

        $message = $user->messages()->create([
            'details' => $attributes['details'],
            'customer_id' => $customer->id,
        ]);



        $message = 'Success sent message to user ' . $user->name;

        return view('user.success', compact('message'));
    }
}
