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
        ]);

        if (Newsletter::isSubscribed($request->email)) {
            return redirect()->back()->with('success', 'This email is already subscribed, Thanks!');
        }
        Subscription::create($request->all());
        Newsletter::subscribe($request->email);

        return redirect()->back()->with('success', 'Thanks for subscribing!');
    }
}
