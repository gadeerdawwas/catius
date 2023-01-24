<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Homeinformation;

class SiteController extends Controller
{
    public function index()
    {
        $Services=Service::orderBy('id','desc')->get();
        $blogs=Blog::orderBy('id','desc')->get();
        $Setting=Setting::first();
        $Homeinformation=Homeinformation::first();
        $About=About::first();

        return view('site.index',compact('Services','blogs','Setting','Homeinformation','About'));
    }
    public function contact(Request $request)
    {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('index')->with('success' ,'تم ارسال الطلب بنجاح');

    }
}
