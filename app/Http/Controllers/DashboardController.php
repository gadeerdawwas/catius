<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Homeinformation;
use App\Models\Setting;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function order()
    {
        $contacts=Contact::orderBy('id','desc')->paginate('15');
        return view('dashboard.contact.index',compact('contacts'));
    }
    public function information()
    {
        $Setting=Setting::first();
        $Homeinformation=Homeinformation::first();
        $About=About::first();
        // return $information;
        return view('dashboard.info',compact('Setting','Homeinformation','About'));
    }
    public function setting(Request $request)
    {

        $Setting = Setting::first();

        if ($Setting == NULL) {
            $image_name = '';
            if ($request->has('file')) {
                $FileEx = $request->file('file')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('file')->move(public_path('upload/info'), $image_name);

            }
            Setting::create([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country,
                'hours' => $request->hours,
                'logo' => $image_name
            ]);
        } else {
            $image_name = $Setting->image;
            if ($request->has('file')) {
                $FileEx = $request->file('file')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('file')->move(public_path('upload/info'), $image_name);
            } else {
                $image_name = $Setting->logo;
            }

            Setting::find($Setting->id)->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country,
                'hours' => $request->hours,
                'logo' => $image_name
            ]);
        }
        return redirect()->route('admin.information')->with('success' ,'تم اضافة الاعدادات بنجاح');
    }
    public function Homeinformation(Request $request)
    {

        $Homeinformation = Homeinformation::first();

        if ($Homeinformation == NULL) {
            $image_name = '';
            if ($request->has('file')) {
                $FileEx = $request->file('file')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('file')->move(public_path('upload/info'), $image_name);

            }
            Homeinformation::create([
                'title' => $request->title,
                'link' => $request->link,
                'content' => $request->content,
                'image' => $image_name
            ]);
        } else {
            $image_name = $Homeinformation->image;
            if ($request->has('file')) {
                $FileEx = $request->file('file')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('file')->move(public_path('upload/info'), $image_name);
            } else {
                $image_name = $Homeinformation->logo;
            }

            Homeinformation::find($Homeinformation->id)->update([
                'title' => $request->title,
                'link' => $request->link,
                'content' => $request->content,
                'image' => $image_name
            ]);
        }

        return redirect()->route('admin.information')->with('success' ,'تم اضافة القسم الرئيسي بنجاح');
    }
    public function About(Request $request)
    {

        $About = About::first();

        if ($About == NULL) {
            $image_name = '';
            if ($request->has('file')) {
                $FileEx = $request->file('file')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('file')->move(public_path('upload/info'), $image_name);

            }
            About::create([
                'title' => $request->title,
                'who' => $request->who,
                'version' => $request->version,
                'history' => $request->history,
                'image' => $image_name
            ]);
        } else {
            $image_name = $About->image;
            if ($request->has('file')) {
                $FileEx = $request->file('file')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('file')->move(public_path('upload/info'), $image_name);
            } else {
                $image_name = $About->logo;
            }

            About::find($About->id)->update([
                'title' => $request->title,
                'who' => $request->who,
                'version' => $request->version,
                'history' => $request->history,
                'image' => $image_name
            ]);
        }

        return redirect()->route('admin.information')->with('success' ,'تم اضافة من نحن بنجاح');
    }
    public function contactsupdate($id)
    {
        Contact::find($id)->update([
            'state' => 1
        ]);
        return redirect()->route('admin.order')->with('success', 'تم  مشاهدة الطلب  بنجاح');

    }
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('admin.order')->with('success', 'تم عملية الحذف  بنجاح');
    }


}
