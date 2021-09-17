<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settings()
    {
        $setting = Settings::first();
        return view('backend.settings.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request)
    {
        $setting = Settings::first();
        $status = $setting->update([
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'logo' => $request->logo,
            'favicon' => $request->favicon,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'fax' => $request->fax,
            'footer' => $request->footer,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'linkedin_url' => $request->linkedin_url,
            'pinterest_url' => $request->pinterest_url,
        ]);

        if ($status) {
            return back()->with('success', 'Successfully Updated');
        }
        else{
            return back()->with('error', 'Something went wrong');
        }
    }
}
