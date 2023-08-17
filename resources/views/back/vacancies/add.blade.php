@extends('back.layouts.master')

@section('title','1is | Vakansiyalar | Vakansiya Əlavə et')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Vakansiya əlavə et</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Əsas Səhifə</a></li>
                        <li class="breadcrumb-item active">Vakansiya əlavə et</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Vakansiya əlavə et</h4>
                    @include('back.layouts.messages')
                    <form action="{{route('vacanciesAddPost')}}" method="POST" id="addTraining" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-lg-6 mb-4">
                                <label for="category" class="form-label"> Kateqoriya  <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="0" selected disabled>Kateqoriya seçin...</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label for="companies" class="form-label"> Şirkət  <span class="text-danger">*</span></label>
                                <select name="company" id="companies" class="form-control ">
                                    <option value="0" selected disabled>Şirkət seçin...</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label for="city" class="form-label"> Şəhər  <span class="text-danger">*</span></label>
                                <select name="city" id="city" class="form-control mb-4" onchange="getRegion(this.value)">
                                    <option value="0" selected disabled>Şəhər seçin...</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label for="jobtype" class="form-label"> İş rejimi  <span class="text-danger">*</span></label>
                                <select name="jobtype" id="jobtype" class="form-control" >
                                    <option value="0" selected disabled>İş rejimi seçin...</option>
                                    @foreach($jobtypes as $jobtype)
                                        <option value="{{$jobtype->id}}">{{$jobtype->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-4" id="type_region" style="display: none">
                                <label for="region" class="form-label d-block"> Bakı rayonları  <span class="text-danger">*</span></label>
                                <select name="region" id="region" class="form-control mb-4">
                                    <option value="0" selected disabled>Bakı rayonu...</option>
                                    @foreach($regions as $region)
                                        <option value="{{$region->id}}">{{$region->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label for="experience" class="form-label"> Təcrübə  <span class="text-danger">*</span></label>
                                <select name="experience" id="experience" class="form-control">
                                    <option value="0" selected disabled>Təcrübə seçin...</option>
                                    @foreach($experiences as $experience)
                                        <option value="{{$experience->id}}">{{$experience->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <label for="education" class="form-label"> Təhsil  <span class="text-danger">*</span></label>
                                <select name="education" id="education" class="form-control">
                                    <option value="0" selected disabled>Təhsil seçin...</option>
                                    @foreach($educations as $education)
                                        <option value="{{$education->id}}">{{$education->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-8 mb-4">
                                <label for="title" class="form-label">Vakansiya adı <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="title" name="title" placeholder="Vakansiyanın adı daxil edin:" value="{{old('title')}}">
                            </div>
                            <div class="col-lg-2 mb-4">
                                <label for="min_age" class="form-label">Minimum yaş <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" min="15" id="min_age" name="min_age" placeholder="Minimum yaş daxil edin:" value="{{old('min_age')}}">
                            </div>
                            <div class="col-lg-2 mb-4">
                                <label for="max_age" class="form-label">Maksimum yaş <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" min="18"  id="max_age" name="max_age" placeholder="Maksimum yaş daxil edin:" value="{{old('max_age')}}">
                            </div>
                            <div class="col-lg-5 mb-4">
                                <label for="min_salary" class="form-label">Minimum maaş </label>
                                <input class="form-control" type="number" id="min_salary" name="min_salary" placeholder="Minimum maaş daxil edin:" value="{{old('min_salary')}}">
                            </div>
                            <div class="col-lg-5 mb-4">
                                <label for="max_salary" class="form-label">Maksimum maaş </label>
                                <input class="form-control" type="number" id="max_salary" name="max_salary" placeholder="Maksimum maaş daxil edin:" value="{{old('max_salary')}}">
                            </div>
                            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                <label for="salary_type" class="form-label">və ya müsahibə əsasında<input  type="checkbox" class="mx-2" id="salary_type" name="salary_type"></label>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12 mb-4">
                                <label for="requirements" class="form-label">Namizədə tələblər <span class="text-danger">*</span></label>
                                <textarea name="requirements" id="requirements" cols="30" rows="5" class="editor" placeholder="Namizədə tələblər haqqında məlumat daxil edin:">{{old('requirements')}}</textarea>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="description" class="form-label">İş barədə məlumat <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="30" rows="5" class="editor" placeholder="İş barədə məlumat məlumat daxil edin:">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-12 mb-4">
                                <label for="contact_name" class="form-label">Əlaqə saxlanılacaq şəxsin adı və soyad</label>
                                <input class="form-control" type="text" id="contact_name" name="contact_name" placeholder="Ad və Soyad daxil edin:" value="{{old('contact_name')}}">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="accept_type" class="form-label"> CV'lərin qəbulu  <span class="text-danger">*</span></label>
                                <select name="accept_type" id="accept_type" class="form-control" onchange="getContact(this.value)">
                                    <option selected disabled>CV'lərin qəbulu seçin...</option>
                                    @foreach($types as $key=>$type)
                                        <option value="{{$key}}">{{$type->title_az}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-4" id="type_link" style="display:none;">
                                <label for="contact_link" class="form-label">Əlaqə linki <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="contact_link" name="contact_link" placeholder="Əlaqə linki daxil edin:" value="{{old('contact_link')}}">
                            </div>
                            <div class="col-lg-12 mb-4" id="type_email" style="display:none;">
                                <label for="contact_email" class="form-label">Əlaqə maili <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="contact_email" name="contact_email" placeholder="Əlaqə maili daxil edin:" value="{{old('contact_email')}}">
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <label for="deadline" class="form-label">Son müraciət tarixi <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="deadline"  name="deadline" placeholder="Son müraciət tarixi daxil edin:" value="{{old('deadline')}}">
                            </div>
                        </div>

                        <div class="row justify-content-end" >
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary">Əlavə et</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>

        /* For other boilerplate styles, see: /docs/general-configuration-guide/boilerplate-content-css/ */
        /*
        * For rendering images inserted using the image plugin.
        * Includes image captions using the HTML5 figure element.
        */

        figure.image {
            display: inline-block;
            border: 1px solid gray;
            margin: 0 2px 0 1px;
            background: #f5f2f0;
        }

        figure.align-left {
            float: left;
        }

        figure.align-right {
            float: right;
        }

        figure.image img {
            margin: 8px 8px 0 8px;
        }

        figure.image figcaption {
            margin: 6px 8px 6px 8px;
            text-align: center;
        }


        /*
         Alignment using classes rather than inline styles
         check out the "formats" option
        */

        img.align-left {
            float: left;
        }

        img.align-right {
            float: right;
        }

        /* Basic styles for Table of Contents plugin (toc) */
        .mce-toc {
            border: 1px solid gray;
        }

        .mce-toc h2 {
            margin: 4px;
        }

        .mce-toc li {
            list-style-type: none;
        }
        .tox-mbtn__select-label{
            color: white !important;
        }

    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    
        ClassicEditor
            .create( document.querySelector( '#requirements' ) )
            .catch( error => {
                console.error( error );
            } );
    
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#companies').select2();
            $('#category').select2();

            $('#city').select2();
        });
        function getContact(id){
                if(id == 0){
                    $('#type_email').slideDown();
                    $('#type_link').slideUp();
                }else if(id == 2){
                    $('#type_link').slideDown();
                    $('#type_email').slideUp();
                }else{
                    $('#type_email').slideUp();
                    $('#type_link').slideUp();
                }
        }
        function getRegion(id){
            if(id == 1){
                $('#type_region').slideDown()

            }else{
                $('#type_region').slideUp()
            }
        }
    </script>


@endsection


