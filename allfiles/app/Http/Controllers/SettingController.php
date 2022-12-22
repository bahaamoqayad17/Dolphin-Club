<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Models\Slider;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['is_admin', 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        $data = [];
        $sliders = Slider::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        return view('dashboard.settings', compact('data', 'sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        $data = json_encode($request->validated());
        $setting = Setting::updateOrCreate(
            ['key' => $request->key],
            [
                'key' => $request->key,
                'value' => $data,
            ]
        );

        return redirect()->route('dashboard.settings.index')->with('msg', 'Settings Updated Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesettingRequest  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, setting $setting)
    {
        $setting = Setting::updateOrCreate($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        $setting->delete();
    }
}
