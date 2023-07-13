<?php

namespace App\Http\Controllers\Back\ChangeDataController;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Trainings;
use App\Models\Vacancies;
use Illuminate\Http\Request;

class ChangeDataController extends Controller
{
    public function companiesDataIndex(){
        $companies = Companies::where('status','1')->get();
        return view('back.change.company',compact('companies'));
    }
    public function companiesDataPost(Request $request){
        $request->validate([
           'request_company'=>'required|numeric',
           'accept_company'=>'required|numeric',
        ]);
        if($request->request_company == $request->accept_company){
            return redirect()->back()->with('error',true);
        }
        $old_company = Companies::find($request->request_company);
        $new_company = Companies::find($request->accept_company);
        if(!$old_company || !$new_company){
            return redirect()->back()->with('error',true);
        }
        $new_company->sector_id = $old_company->sector_id;
        $new_company->about = $old_company->about;
        $new_company->hr = $old_company->hr;
        $new_company->address = $old_company->address;
        $new_company->website = $old_company->website;
        $new_company->map = $old_company->map;
        $new_company->instagram = $old_company->instagram;
        $new_company->linkedin = $old_company->linkedin;
        $new_company->facebook = $old_company->facebook;
        $new_company->twitter = $old_company->twitter;
        $new_company->image = $old_company->image;
        $new_company->view = $old_company->view;
        $new_company->status = $old_company->status;
        $new_company->save();
        $vacancies = Vacancies::where('company_id',$old_company->id)->get();
        foreach ($vacancies as $vacancy){
            $vacancy->company_id = $request->accept_company;
            $vacancy->save();
        }
        $trainings = Trainings::where('company_id',$old_company->id)->get();
        foreach ($trainings as $training){
            $training->company_id = $request->accept_company;
            $training->save();
        }
        $old_company->delete();
        return redirect()->back()->with('success',true);
    }
}
