<?php

namespace App\Http\Controllers\Appointment;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Notifications\AppointmentCreated;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function show(Request $request, User $user): View
    {
        return view('user.appointment', compact('user'));
    }

    public function submit(Request $request, User $user): View
    {



        $attributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'service_id' => 'required|exists:services,id',
            'starts_at' => 'required',
            'email' => 'required|email',
        ]);

        $customer = Customer::firstOrCreate([
            'user_id' => $user->id,
            'email' => $attributes['email']
        ], [
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'phone' => $attributes['phone'],
            'user_id' => $user->id,
        ]);

        $appointment = $user->appointments()->create([
            'customer_id' => $customer->id,
            'service_id' => $attributes['service_id'],
            'starts_at' => $attributes['starts_at'],
            'additional_notes' => $request->input('additional_notes'),
        ]);

        $user->notify(new AppointmentCreated($appointment));

        $message = 'Appointment success created to customer ' . $user->name;

        return view('user.success', compact('message'));
    }
}
