<?php

namespace App\Http\Controllers;

use Newsletter;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:subscriptions',
        ], [
            'email.unique' => 'You are already subscribed to our newsletter.',
        ]);

        if (Newsletter::isSubscribed($request->email)) {
            return redirect()->back()->with('success', 'This email is already subscribed, Thanks!');
        }
        Subscription::create(['email' => $request->email]);
        Newsletter::subscribe($request->email);

        return redirect()->back()->with('success', 'Thanks for subscribing!');
    }
}
