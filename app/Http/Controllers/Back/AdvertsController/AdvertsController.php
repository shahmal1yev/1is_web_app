<?php

namespace App\Http\Controllers\Back\AdvertsController;

use App\Http\Controllers\Controller;
use App\Models\Adverts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertsController extends Controller
{
    public function advertListIndex(){
        $ads = Adverts::all();
        return view('back.adverts.ads',compact('ads'));
    }
    public function advertListPost(Request $request) {
        $request->validate([
            'redirect_link' => 'required',
            'image_az' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:6000',
            'image_en' => 'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:6000',
            'image_ru' => 'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:6000',
            'image_tr' => 'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:6000',
        ]);
    
        $ads = new Adverts();
        $ads->redirect_link = $request->redirect_link;
    
        if ($request->hasFile('image_az')) {
            $image_az = $request->file('image_az');
            $name_az = 'advert_az' . '_' . Str::random(6) . '.' . $image_az->getClientOriginalExtension();
            $directory_az = 'back/assets/images/adverts/';
            $image_az->move($directory_az, $name_az);
            $name_az = $directory_az . $name_az;
            $ads->image_az = $name_az;
        }
  
        if ($request->hasFile('image_en')) {
            $image_en = $request->file('image_en');
            $name_en = 'advert_en' . '_' . Str::random(6) . '.' . $image_en->getClientOriginalExtension();
            $directory_en = 'back/assets/images/adverts/';
            $image_en->move($directory_en, $name_en);
            $name_en = $directory_en . $name_en;
            $ads->image_en = $name_en;
        }
     
        if ($request->hasFile('image_ru')) {
            $image_ru = $request->file('image_ru');
            $name_ru = 'advert_ru' . '_' . Str::random(6) . '.' . $image_ru->getClientOriginalExtension();
            $directory_ru = 'back/assets/images/adverts/';
            $image_ru->move($directory_ru, $name_ru);
            $name_ru = $directory_ru . $name_ru;
            $ads->image_ru = $name_ru;
        }
    
        if ($request->hasFile('image_tr')) {
            $image_tr = $request->file('image_tr');
            $name_tr = 'advert_tr' . '_' . Str::random(6) . '.' . $image_tr->getClientOriginalExtension();
            $directory_tr = 'back/assets/images/adverts/';
            $image_tr->move($directory_tr, $name_tr);
            $name_tr = $directory_tr . $name_tr;
            $ads->image_tr = $name_tr;
        }

        return redirect()->back()->with($ads->save() ? 'success' : 'error', true);
    }
    
    public function advertStatus(Request $request){
        $ads = Adverts::find($request->id);
        if(!$ads){
            return '0';
        }
        $ads->status = $ads->status == '1' ? '0' : '1';
        return $ads->save() ? '1' : '0';
    }
    public function advertDelete(Request $request){
        $ads = Adverts::find($request->id);
        if(!$ads){
            return '0';
        }
        return $ads->delete() ? '1' : '0';
    }
}
