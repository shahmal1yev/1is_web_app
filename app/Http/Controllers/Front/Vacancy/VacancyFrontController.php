<?php

namespace App\Http\Controllers\Front\Vacancy;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Companies;
use App\Models\Vacancies;
use App\Models\JobType;
use App\Models\Sectors;
use App\Models\Educations;
use App\Models\Experiences;
use App\Models\Cities;
use App\Models\Cv;
use App\Models\Candidates;
use App\Models\Regions;
use App\Models\Favorits;
use App\Models\AcceptType;
use App\Models\BannerImage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\vacRequest;
use Illuminate\Support\Str;
use App\Mail\SendVac;
use App\Mail\SendCompMail;

use Illuminate\Support\Facades\Mail;
use DB;


class VacancyFrontController extends Controller
{ 

 
    public function like(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $vacancy_id = $request->input('vacancy_id');
        $user_id = auth()->user()->id;

        $favorite = new Favorits();
        $favorite->vacancy_id = $vacancy_id;
        $favorite->user_id = $user_id;

        $favorite->save();
    }



    public function dislike(Request $request)
        {
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        $vacancy_id = $request->input('vacancy_id');
        $user_id = auth()->user()->id;

        $favorite = Favorits::where('user_id', $user_id)->where('vacancy_id', $vacancy_id)->first();

        $favorite->delete();
        
    }

    public function elanPost(Request $request){
        try {

        $vacancy = new Vacancies();
        $vacancy->user_id = Auth::user()->id;
        $vacancy->company_id = $request->company;
        $vacancy->city_id = $request->city;

        if ($request->city == 1) {
        $request->validate([
        'region' => 'numeric'
        ]);
        $vacancy->village_id = $request->region;
        }

        $vacancy->category_id = $request->category;
        $vacancy->job_type_id = $request->jobtype;
        $vacancy->experience_id = $request->experience;
        $vacancy->education_id = $request->education;
        $vacancy->position = $request->position;
        $slug = Str::slug($request->position);

        if (Vacancies::where('slug', $slug)->first()) {
        $slug = $slug . '_' . rand(1000, 9999);
        }

        $vacancy->slug = $slug;
        if($request->salary_type == 'on'){
            $vacancy->salary_type = '1';
        }else{
            $vacancy->salary_type = '0';
            $request->validate([
                'min_salary'=>'required|numeric',
                'max_salary'=>'required|numeric',
            ]);
            $vacancy->min_salary = $request->min_salary;
            $vacancy->max_salary = $request->max_salary;
        }

        $vacancy->min_age = $request->min_age;
        $vacancy->max_age = $request->max_age;
        $vacancy->requirement = $request->requirements;
        $vacancy->description = $request->description;
        $vacancy->contact_name = $request->contact_name;

        if ($request->accept_type == '0') {
            $request->validate([
                'contact_email' => 'email'
            ]);
            $vacancy->contact_info = $request->contact_email;
        } else if ($request->accept_type == '2') {
            $request->validate([
                'contact_link' => 'required'
            ]);
            $vacancy->contact_info = $request->contact_link;
        }
        $vacancy->accept_type = $request->accept_type;



        $vacancy->deadline = $request->deadline;


        $user = Auth::user();
        if ($user) {
        $userEmail = $user->email;

        }
        $vacancy->save();
        if ($request->status == 1) {
            $company = Companies::find($request->company);
            $company->vacancy_count++;
            $company->save();
        }
        return redirect()->route('createAnnounces')->with('success', __('messages.succelan'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', __('messages.nesexeta'));
            }
    }

    public function companies(){
        $banner = BannerImage::where('status','1')->get();

        $userId = auth()->user()->id;
        $companies = Companies::where('user_id', $userId)->paginate(10);
        $sectors = Sectors::where('status','1')->orderBy('title_az','ASC')->get();
        
                    
        return View('front.Announces.announces', get_defined_vars());
    }

    public function addcompany(Request $request){        
        {
        $req = $request->all();
        $rules = [
            'about'=>'min:20',
            'address'=>'max:255',
            'website'=>'max:255',
            'instagram'=>'max:255',
            'facebook'=>'max:255',
            'linkedin'=>'max:255',
            'twitter'=>'max:255',
            'image'=>'max:5120',
        ];
            
            
            $request->validate($rules);
            

        try {
            $company = new Companies();
            $company->user_id = Auth::user()->id;
            $company->sector_id  = $request->sector;
            $company->name = $request->name;
            $slug = Str::slug($request->name);
            if(Companies::where('slug',$slug)->first()){
                $slug = $slug.rand(1000,9999);
            }
            $company->slug = $slug;
            $company->about = $request->about;
            $company->hr = $request->hr;
            $company->address = $request->address;
            $company->website = $request->website;
            $company->map = $request->map;
            $company->instagram = $request->instagram;
            $company->facebook = $request->facebook;
            $company->linkedin = $request->linkedin;
            $company->twitter = $request->twitter;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = 'company_'.Str::random(6).'.'.$image->getClientOriginalExtension();
                $directory = 'back/assets/images/companies/';
                $image->move($directory, $name);
                $name = $directory.$name;
                $company->image = $name;
        }
        
        $company->save();
        
        if ($request->status == 1) {
            $company = Companies::find($request->company);
            $company->view++;
            $company->save();
        }
        
        return redirect()->route('announcesindex')->with('success', __('messages.succomp'));
        } 
        catch (\Throwable $e) {
            return redirect()->back()->with('error', __('messages.nesexeta'));
        }
     }

    }

    public function elanEdit($id){
        $banner = BannerImage::where('status','1')->get();

        $userId = auth()->user()->id;
        $vacancy = Vacancies::find($id);
       
        if(!$vacancy || $vacancy->user_id !== $userId) {
            abort(404);
        }
        $companies = Companies::where('user_id', $userId)->get();
        $categories = Categories::all();
        $cities = Cities::all();
        $regions = Regions::all();
        $jobtypes = JobType::all();
        $experiences = Experiences::all();
        $educations = Educations::all();
        $types = AcceptType::all();
        return view('front.Announces.updateAnnounces', get_defined_vars());
    }

    public function elanEditPost(Request $request){   
        try{
            $vacancy = Vacancies::findOrFail($request->id);
            $vacancy->user_id = Auth::user()->id;
            $vacancy->company_id = $request->company;
            $vacancy->city_id = $request->city;
    
            if ($request->city == 1) {
            $request->validate([
            'region' => 'numeric'
            ]);
            $vacancy->village_id = $request->region;
            }
    
            $vacancy->category_id = $request->category;
            $vacancy->job_type_id = $request->jobtype;
            $vacancy->experience_id = $request->experience;
            $vacancy->education_id = $request->education;
            $vacancy->position = $request->position;
            $slug = Str::slug($request->position);
    
            if (Vacancies::where('slug', $slug)->first()) {
            $slug = $slug . '_' . rand(1000, 9999);
            }
    
            $vacancy->slug = $slug;
            if($request->salary_type == 'on'){
                $vacancy->salary_type = '1';
                $vacancy->min_salary = NULL;
                $vacancy->max_salary = NULL;
            }else{
                $vacancy->salary_type = '0';
                $request->validate([
                    'min_salary'=>'required|numeric',
                    'max_salary'=>'required|numeric',
                ]);
                $vacancy->min_salary = $request->min_salary;
                $vacancy->max_salary = $request->max_salary;
            }
            
            
            $vacancy->min_age = $request->min_age;
            $vacancy->max_age = $request->max_age;
            $vacancy->requirement = $request->requirements;
            $vacancy->description = $request->description;
            $vacancy->contact_name = $request->contact_name;
    
            if ($request->accept_type == '0') {
                $request->validate([
                    'contact_email' => 'required|email'
                ]);
                $vacancy->contact_info = $request->contact_email;
            } else if ($request->accept_type == '2') {
                $request->validate([
                    'contact_link' => 'required'
                ]);
                $vacancy->contact_info = $request->contact_link;
            }
            $vacancy->accept_type = $request->accept_type;
    
            $vacancy->deadline = $request->deadline;
            
            
            $user = Auth::user();
            if ($user) {
            $userEmail = $user->email;
    
            }
            $vacancy->save();
            return redirect()->route('myAnnounces')->with('success', __('messages.elanyeni'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('messages.nesexeta'));
        }
    }
    

    public function compedit($id){
        $banner = BannerImage::where('status','1')->get();

        $company = Companies::find($id);
        $userId = auth()->user()->id;

        if(!$company || $company->user_id !== $userId) {
            abort(404);
        }
        $sectors = Sectors::where('status','1')->get();
        return View('front.Announces.editcomp', get_defined_vars());
    }


    public function companiesEditPost(Request $request){
        {
            $req = $request->all();
            $rules = [
                'about'=>'min:20',
                'address'=>'max:255',
                'website'=>'max:255',
                'instagram'=>'max:255',
                'facebook'=>'max:255',
                'linkedin'=>'max:255',
                'twitter'=>'max:255',
                'image'=>'max:5120',
            ];
                
                
                $request->validate($rules);
                
    
            try {
        $company = Companies::find($request->id);
        $company->sector_id  = $request->sector;
        $company->name = $request->name;
        $slug = Str::slug($request->name);
        if(Companies::where([['slug',$slug],['id','<>',$company->id]])->first()){
            $slug = $slug.rand(1000,9999);
        }
        $company->slug = $slug;
        $company->about = $request->about;
        $company->hr = $request->hr;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->map = $request->map;
        $company->instagram = $request->instagram;
        $company->facebook = $request->facebook;
        $company->linkedin = $request->linkedin;
        $company->twitter = $request->twitter;
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
            ]);
            $image = $request->file('image');
            $name = 'company_'.Str::random(6).'.'.$image->getClientOriginalExtension();
            $old_image = $company->image;
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $directory = 'back/assets/images/companies/';
            $image->move($directory, $name);
            $name = $directory.$name;
            $company->image = $name;
            $company->status = 0;
            }

           

        $user = Auth::user();
        if ($user) {
        $userEmail = $user->email;

        }
        
        $company->save();
        return redirect()->route('announcesindex')->with('success', __('messages.compyeni'));
        } 
        catch (\Throwable $e) {
            return redirect()->back()->with('error', __('messages.nesexeta'));
        }
        }
    }


    public function createAnnounces(){
        $banner = BannerImage::where('status','1')->get();

        $userId = auth()->user()->id;
        $companies = Companies::where('user_id', $userId)->get();
        $categories = Categories::all();
        $cities = Cities::all();
        $regions = Regions::all();
        $jobtypes = JobType::all();
        $experiences = Experiences::all();
        $educations = Educations::all();
        $types = AcceptType::all();
        return View('front.Announces.createAnnounces', get_defined_vars());
    }

    public function delete($id)
        {
            $vacancy = Vacancies::findOrFail($id);
                        
            $vacancy->delete();
            
            return redirect()->back()->with('success', __('messages.vacsil'));
    }
   
    
    public function myAnnounces(){ 
        $banner = BannerImage::where('status','1')->get();

        $userId = auth()->user()->id;
        $companies = Companies::where('user_id', $userId)->get();
        $vacancies = Vacancies::join('companies','companies.id','=','vacancies.company_id')
        ->join('users','users.id','=','vacancies.user_id')
        ->join('sectors','sectors.id','=','companies.sector_id')
        ->join('categories','categories.id','=','vacancies.category_id')
        ->select('vacancies.id','companies.id as company_id','categories.id as category_id','companies.name','vacancies.position','vacancies.view','vacancies.created_at','users.id as user_id','sectors.id as sector_id','categories.title_az as sectors_title', 'vacancies.status')
        ->where('vacancies.user_id', $userId)
        ->orderBy('vacancies.created_at','desc')
        ->get();
        return View('front.Announces.myAnnounces', get_defined_vars());
    }  

    
   
    public function candidate()
        {
            $banner = BannerImage::where('status','1')->get();

        $userId = auth()->user()->id;
        $candidates = Candidates::where('user_id', $userId)->orderBy('created_at','desc')->get();

        return view('front.Announces.candidate', get_defined_vars());
        
    }


    public function downloadCV($id)
        {
        $candidate = Candidates::find($id);
        $file_path = $candidate->cv;
        
        
        if (file_exists($file_path)) {
            return response()->download($file_path);
        } else {
            return "File tapılmadı!";
        }
    }


    public function detail($id) { 
        $job = Vacancies::find($id);
        $banner = BannerImage::where('status','1')->get();

        if (!$job || $job->status == 0) {
            abort(404);
        }
        
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $cvs = Cv::where('user_id', $userId)->get();
        } else {
            $cvs = [];
        }
        

        $vacdetail = Vacancies::join('companies', 'companies.id', '=', 'vacancies.company_id')
        ->join('sectors', 'sectors.id', '=', 'companies.sector_id')
        ->join('cities','cities.id','=','vacancies.city_id')
        ->join('categories','categories.id','=','vacancies.category_id')
        ->join('job_type','job_type.id','=','vacancies.job_type_id')
        ->join('experiences','experiences.id','=','vacancies.experience_id')

        ->where('vacancies.id', $id)
        ->select('job_type.id as job_type_id','job_type.title_az as job_type_title','companies.id as company_id','cities.id as city_id','categories.id as category_id','cities.title_az as city_title', 'companies.name', 'vacancies.id as vacancy_id',  'sectors.id as sector_id', 'categories.title_az as sectors_title','experiences.title_az as experience_title','vacancies.*')
        ->first();
        $job->view++;
        $job->save();

        return view('front.Vacancy.detail', get_defined_vars());
    }


    public function selectcv(Request $request)
        {
            $vacancyId = $request->input('vacancy_id');
            $userId = auth()->user()->id;
            $selectedCvId = $request->input('my-cv');
            $cv = Cv::where('user_id', $userId)->find($selectedCvId);

            if ($cv) {
                $candidate = new Candidates();
                $candidate->name = $cv->name;
                $candidate->surname = $cv->surname;
                $candidate->phone = $cv->contact_phone;
                $candidate->mail = $cv->email;
                $candidate->cv = $cv->cv;
                $candidate->vacancy_id = $vacancyId;
                $candidate->user_id = $userId;


                $candidate->save();

                return redirect()->back()->with('success', __('messages.succv'));
            }

            // CV bulunamadıysa veya hata varsa yapılacaklar

            return redirect()->back()->with('error', __('messages.nesexeta'));
    }


    public function asantmur(Request $request)
        {
        $req = $request->all();
        $rules = [
            'phone'=>'numeric',
            'cv'=>'max:5120',
            
        ];
            
            $request->validate($rules);
            

        try {
            $vacancyId = $request->input('vacancy_id');

            $candidate = new Candidates();
            $candidate->user_id = Auth::user()->id;
            $candidate->name = $request->name;
            $candidate->surname = $request->surname;
            $candidate->mail = $request->mail;
            $candidate->phone = $request->phone;
            $candidate->vacancy_id = $vacancyId;

            if ($request->hasFile('cv')) {
                $image = $request->file('cv');
                $name = 'cv_'.Str::random(6).'.'.$image->getClientOriginalExtension();
                $directory = 'back/assets/images/cvs/';
                $image->move($directory, $name);
                $name = $directory.$name;
                $candidate->cv = $name;
            }  
            $candidate->save();
        

        
            return redirect()->back()->with('success', __('messages.succv'));
        } 
        catch (\Throwable $e) {
            return redirect()->back()->with('error', __('messages.nesexeta'));
        }
    }

    


    public function vacancies(Request $request){
        $allcategories = Categories::where('status','1')->get();
        $job_types=JobType::where('status','1')->get();
        $educations=Educations::where('status','1')->get();
        $experiences=Experiences::where('status','1')->get();
        $cities=Cities::where('status','1')->get();
        $banner = BannerImage::where('status','1')->get();

        $allcompanies = Companies::where('status','1')->orderBy('name','ASC')->get();
        if(auth()->check()){
            $likes = Favorits::whereUserId(auth()->user()->id)->get()->pluck('vacancy_id')->toArray();}
            else {
            $likes = [];
        }
        

        $vacancies = Vacancies::join('companies','companies.id','=','vacancies.company_id')
                ->join('sectors','sectors.id','=','companies.sector_id')
                ->join('cities','cities.id','=','vacancies.city_id')
                ->join('categories','categories.id','=','vacancies.category_id')
                ->join('job_type','job_type.id','=','vacancies.job_type_id')
                ->join('educations','educations.id','=','vacancies.education_id')
                ->join('experiences','experiences.id','=','vacancies.experience_id')
                ->select('vacancies.id','job_type.id as job_type_id','companies.id as company_id','sectors.id as sector_id','cities.id as city_id','categories.id as category_id','companies.name','vacancies.position','educations.id as education_id','experiences.id as experience_id','vacancies.status','vacancies.view','categories.title_az as sectors_title','vacancies.deadline','vacancies.created_at')

                ->where('vacancies.status','1')
                ->orderBy('created_at', 'DESC');
            
            $vacancies = $vacancies->paginate(30)->appends(request()->except('page'));


            return view('front.Vacancy.vacancy', get_defined_vars());
                
    }
      
    
    public function vsearch(Request $request){

        $allcategories = Categories::where('status','1')->get();
        $job_types=JobType::where('status','1')->get();
        $educations=Educations::where('status','1')->get();
        $experiences=Experiences::where('status','1')->get();
        $cities=Cities::where('status','1')->get();
        $banner = BannerImage::where('status','1')->get();

        $allcompanies = Companies::where('status','1')->orderBy('name','ASC')->get();
        if(auth()->check()){
            $likes = Favorits::whereUserId(auth()->user()->id)->get()->pluck('vacancy_id')->toArray();}
            else {
            $likes = [];
        }
        

        $city = $request->input('city');
        $category = $request->input('category');
        $find_worker = $request->input('find_worker');
        $education = $request->input('education');
        $experience = $request->input('experience');
        $company = $request->input('company');

        $query = Vacancies::query();
        $vacname = $request->input('query');
        $sort_by = $request->input('sort_by');
        $is_expired = $request->input('expired');

        $query = $query->join('companies','companies.id','=','vacancies.company_id')
        ->join('sectors','sectors.id','=','companies.sector_id')
        ->join('cities','cities.id','=','vacancies.city_id')
        ->join('categories','categories.id','=','vacancies.category_id')
        ->join('job_type','job_type.id','=','vacancies.job_type_id')
        ->join('educations','educations.id','=','vacancies.education_id')
        ->join('experiences','experiences.id','=','vacancies.experience_id')
        ->select('vacancies.id as vacancy_id','job_type.id as job_type_id','companies.id as company_id','sectors.id as sector_id','cities.id as city_id','categories.id as category_id','companies.name','vacancies.position','educations.id as education_id','experiences.id as experience_id','vacancies.status','vacancies.view','categories.title_az as sectors_title','vacancies.created_at','vacancies.deadline')
        ->where('vacancies.status','1');
        
         
        if (!empty($vacname)) {
            $query->where(function ($subQuery) use ($vacname) {
                $subQuery->where('vacancies.slug', 'like', '%' . $vacname . '%')
                    ->orWhere('vacancies.description', 'like', '%' . $vacname . '%')
                    ->orWhere('vacancies.requirement', 'like', '%' . $vacname . '%')
                    ->orWhere('vacancies.position', 'like', '%' . $vacname . '%');
            });
        }    
        if ($city) {
            $query->where('city_id', $city);
        }
        if ($category) {
            $query->where('category_id', $category);
        }
        if ($find_worker) {
            $query->where('job_type_id', $find_worker);
        }
        if ($education) {
            $query->where('education_id', $education);
        }
        if ($experience) {
            $query->where('experience_id', $experience);
        }
        if ($company) {
            $query->where('company_id', $company);
        }
    

        if ($sort_by == '1') {
            $query->orderBy('created_at', 'DESC');
        } if ($sort_by == '2') {
            $query->orderBy('position', 'ASC');
        } if ($sort_by == '3') {
            $query->orderBy('position', 'DESC');
        } if ($sort_by == '4') {
            $query->orderBy('view', 'DESC');
        }
        if ($is_expired == 'on') {
            $now = now();
            $query->whereDate('deadline', '>=', $now->toDateString()); 
        }
        
             
        $query->where('vacancies.status','1');

        $vacancies = $query->orderBy('created_at', 'DESC')->paginate(30)->appends(request()->except('page'));

        
        return view('front.Vacancy.axtar', get_defined_vars());
    }

    public function vacanciesAdd(){
        $banner = BannerImage::where('status','1')->get();

        $companies = Companies::where('status','1')->get();
        $categories = Categories::all();
        $cities = Cities::all();
        $regions = Regions::all();
        $jobtypes = JobType::all();
        $experiences = Experiences::all();
        $educations = Educations::all();
        $types = AcceptType::all();
        return view('front.Vacancies.announces', get_defined_vars());
    }

    public function setLang(Request $request, $id)
        {
            $locale = $request->query('locale');
            if ($locale) {
                App::setLocale($locale);
                Session::put('locale', $locale);
            }
            
            $referer = $request->headers->get('referer');
            
            $updatedReferer = preg_replace('/\blocale=\w+\b/', 'locale=' . $locale, $referer);
            
            return redirect($updatedReferer);
    }

    
    


}
