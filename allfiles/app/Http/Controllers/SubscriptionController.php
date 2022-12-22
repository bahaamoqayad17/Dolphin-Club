<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Setting;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['is_admin', 'auth'])->except('store', 'create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('keyword')) {
            $subscriptions = Subscription::with('course')->where('id_number', 'like', '%' . request()->keyword . '%')->get();
        } else {
            $subscriptions = Subscription::with('course')->get();
        }

        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->all() !== []) {
            $course = Course::findOrFail(request()->keys()[0]);
        } else {
            $course = null;
        }
        $courses = Course::where('status', '0')->get();
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }

        return view('site.subscriptions', compact('courses', 'data', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            Subscription::createRules()
        );
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        Subscription::updateOrCreate(
            ['id' => $request->id],
            $validator->validated()
        );
        if (Auth::user() !== null) {
            return redirect()->route('subscriptions.index')->with('msg', 'Subscription Added Successfully')->with('type', 'success');
        } else {
            return redirect()->route('site.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        // dd($subscription);
        return view('dashboard.subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        return view('dashboard.subscriptions.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $subscription->update([
            'flag' => $request->flag,
        ]);

        return redirect()->route('subscriptions.index')->with('msg', 'Subscription Updated Successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('msg', 'Subscription Deleted Successfully')->with('type', 'error');
    }
}
