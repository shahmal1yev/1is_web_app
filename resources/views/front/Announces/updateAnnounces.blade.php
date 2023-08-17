@extends('front.layouts.master')

@section('content')
        @foreach ($banner as $ban)

            <section class="header-info" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
                url({{asset($ban->image)}})">
       @endforeach

        <div>
            <h3>@lang('front.vacancies') </h3>
        </div>
        
    </section>

    <section class="edit-announce mt-3">
        <div class="container edit-announce-container">
            <form action="{{route('elanEditPost')}}" method="POST" enctype="multipart/form-data" class="tab-pane row company-announce-form fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <input type="hidden" name="id" value="{{$vacancy->id}}">
                    @csrf
                <div class="form-group company-announce-input-group col-12">
                    <label for="possession">@lang('front.vezife')<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="position" id="possession" placeholder="@lang('front.vezife')" value="{{$vacancy->position}}" />
                </div>
                <div class="form-group company-announce-input-group col-12">
                    <label for="city">@lang('front.city')<span class="text-danger">*</span></label>
                    <select name="city" id="companies" class="form-control" >
                        <option value="" selected disabled>@lang('front.birsec')...</option>
                        @php
                            $lang = config('app.locale');
                        @endphp
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($vacancy->city_id == $city->id) selected @endif>
                                @if ($lang == 'EN')
                                    {{$city->title_en}}
                                @elseif ($lang == 'RU')
                                    {{$city->title_ru}}
                                @elseif ($lang == 'TR')
                                    {{$city->title_tr}}
                                @else
                                    {{$city->title_az}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group company-announce-input-group col-md-6">
                    <label for="category">@lang('front.cats')<span class="text-danger">*</span></label>
                    <select class="form-control" name="category" id="category" >
                        <option value="" selected disabled>@lang('front.birsec')...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($vacancy->category_id == $category->id) selected @endif>
                                @if ($lang == 'EN')
                                    {{$category->title_en}}
                                @elseif ($lang == 'RU')
                                    {{$category->title_ru}}
                                @elseif ($lang == 'TR')
                                    {{$category->title_tr}}
                                @else
                                    {{$category->title_az}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group company-announce-input-group col-md-6">
                    <label for="work_graf">@lang('front.jobtype')<span class="text-danger">*</span></label>
                    <select name="jobtype" class="form-control" id="work_graf" >
                        @foreach($jobtypes as $jobtype)
                        <option value="{{$jobtype->id}}" @if($vacancy->job_type_id == $jobtype->id) selected @endif>
                            @if ($lang == 'EN')
                                        {{$jobtype->title_en}}
                                    @elseif ($lang == 'RU')
                                        {{$jobtype->title_ru}}
                                    @elseif ($lang == 'TR')
                                        {{$jobtype->title_tr}}
                                    @else
                                        {{$jobtype->title_az}}
                                    @endif
                                </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group company-announce-input-group col-md-5">
                    <label for="min">@lang('front.minsalary') (AZN)</label>
                    <input type="number" name="min_salary" class="form-control" id="min" placeholder="@lang('front.minsalary')" value="{{$vacancy->min_salary}}" @if($vacancy->salary_type != '0') @endif />
                </div>
                <div class="form-group company-announce-input-group col-md-5">
                    <label for="max">@lang('front.maxsal') (AZN)</label>
                    <input type="number" name="max_salary" class="form-control" id="max" placeholder="@lang('front.maxsal')" value="{{$vacancy->max_salary}}" @if($vacancy->salary_type != '0') @endif />
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-end mb-3">
                    <label for="musahibe" class="musahibe-check-label">@lang('front.musahibe')<span class="text-danger">*</span></label>
                    <input type="checkbox" class="musahibe-check-input" id="musahibe" name="salary_type" @if($vacancy->salary_type == '1') checked @endif> 
                </div>
                
                <div class="form-group company-announce-input-group col-md-3">
                    <label for="education">@lang('front.educ')<span class="text-danger">*</span></label>
                    <select name="education" class="form-control" id="education" >
                        <option value="" selected disabled>@lang('front.tehsilsec')...</option>
                        @foreach($educations as $education)
                            <option value="{{$education->id}}" @if($vacancy->education_id == $education->id) selected @endif>
                                @if ($lang == 'EN')
                                        {{$education->title_en}}
                                    @elseif ($lang == 'RU')
                                        {{$education->title_ru}}
                                    @elseif ($lang == 'TR')
                                        {{$education->title_tr}}
                                    @else
                                        {{$education->title_az}}
                                    @endif
                                </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group company-announce-input-group col-md-3">
                    <label for="age_min">@lang('front.minyas')<span class="text-danger">*</span></label>
                    <input type="number" name="min_age" class="form-control" id="age_min" placeholder="@lang('front.minyas'):" value="{{$vacancy->min_age}}"/>
                </div>
                <div class="form-group company-announce-input-group col-md-3">
                    <label for="age_max">@lang('front.maxyas')<span class="text-danger">*</span></label>
                    <input type="number" name="max_age" class="form-control" id="age_max" placeholder="@lang('front.maxyas'):" value="{{$vacancy->max_age}}"/>
                </div>
                <div class="form-group company-announce-input-group col-md-3">
                    <label for="work_exprience">@lang('front.exp')<span class="text-danger">*</span></label>
                    <select name="experience" class="form-control" id="work_exprience" >
                        <option value="" selected disabled>@lang('front.expsec')...</option>
                        @foreach($experiences as $experience)
                            <option value="{{$experience->id}}" @if($vacancy->experience_id == $experience->id) selected @endif>
                                @if ($lang == 'EN')
                                        {{$experience->title_en}}
                                    @elseif ($lang == 'RU')
                                        {{$experience->title_ru}}
                                    @elseif ($lang == 'TR')
                                        {{$experience->title_tr}}
                                    @else
                                        {{$experience->title_az}}
                                    @endif
                                </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group company-announce-input-group col-12">
                    <label for="demands">@lang('front.namteleb')<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="requirements" id="demands" rows="5" placeholder="@lang('front.melumatver')!" >
                        {!! $vacancy->requirement !!}</textarea>
                </div>
                <div class="form-group company-announce-input-group col-12">
                    <label for="about_work">@lang('front.ismelumat')<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" id="about_work" rows="5" placeholder="@lang('front.melumatver')!" >
                        {!! $vacancy->description !!}</textarea>
                </div>
                <div class="form-group company-announce-input-group col-6">
                    <label for="companies">@lang('front.companies')<span class="text-danger">*</span></label>
                    <select class="form-control" id="companies" name="company" >
                        <option value="" selected disabled>@lang('front.birsec')...</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}" @if($vacancy->company_id == $company->id) selected @endif>{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group company-announce-input-group col-6 pl-3">
                    <label for="responsible_person">@lang('front.elaqesexs')</label>
                    <input type="text" class="form-control" name="contact_name" id="responsible_person" placeholder="@lang('front.adsoyad')" value="{{$vacancy->contact_name}}"/>
                </div>
                <div class="form-group company-announce-input-group col-12">
                    <label for="accept_cv">@lang('front.cvqebull')<span class="text-danger">*</span></label>
                    <select name="accept_type" class="form-control" id="accept_cv" onchange="getContact(this.value)">
                      <option selected disabled>@lang('front.birsec')...</option>
                      @foreach($types as $key=>$type)
                        <option value="{{$key}}" @if($key == $vacancy->accept_type) selected @endif>
                            @if ($lang == 'EN')
                                        {{$type->title_en}}
                                    @elseif ($lang == 'RU')
                                        {{$type->title_ru}}
                                    @elseif ($lang == 'TR')
                                        {{$type->title_tr}}
                                    @else
                                        {{$type->title_az}}
                                    @endif</option>
                    @endforeach
                    </select>
                </div>
                
                <div class="col-lg-12 mb-4" id="type_link" style="@if($vacancy->accept_type == '2') display:none; @endif">
                    <label for="contact_link" class="form-label">@lang('front.contactlink') <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="contact_link" name="contact_link" placeholder="@lang('front.contactlink'):" value="@if($vacancy->accept_type == '2') {{$vacancy->contact_info}} @endif">
                </div>
                <div class="col-lg-12 mb-4" id="type_email" style="@if($vacancy->accept_type == '0') display:none; @endif;">
                    <label for="contact_email" class="form-label">@lang('front.conmail') <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="contact_email" name="contact_email" placeholder="@lang('front.conmail'):" value="@if($vacancy->accept_type == '0') {{$vacancy->contact_info}} @endif">
                </div>



                <div class="form-group company-announce-input-group col-12">
                    <label for="end_date">@lang('front.deadline')<span class="text-danger">*</span></label>
                    <input type="date" name="deadline" class="form-control" id="end_date" value="{{$vacancy->deadline}}"  />
                </div>
                <div class="d-flex justify-content-end edit-announce-buttons col-12 my-4">
                    <button class="save-announce" type="submit">@lang('front.elaveet')</button>
                </div>
            </form>
        </div>
    </section>
@endsection


@section('js-link')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var lang = "{{ app()->getLocale() }}"; // Dil seçimini al

            function getErrorMessage(field, lang) {
                var errorMessages = {
                    required: {
                        'AZ': 'Bu sahə doldurulmalıdır!',
                        'EN': 'This field is required!',
                        'RU': 'Поле обязательно для заполнения!',
                        'TR': 'Bu alan zorunludur!'
                    },
                    email: {
                        'AZ': 'Düzgün bir email adresi daxil edin.',
                        'EN': 'Please enter a valid email address.',
                        'RU': 'Введите действительный адрес электронной почты.',
                        'TR': 'Geçerli bir email adresi giriniz.'
                    },

                
                };

                return errorMessages[field][lang] || errorMessages[field]['AZ']; 
            }

            $("#v-pills-home").validate({
                onclick: false, // Tıklama yapıldığında hata mesajlarını gösterme
                
                rules: {
                    position: {
                        required: true,
                        maxlength: 1000,

                    },
                    city: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                    jobtype: {
                        required: true,
                    },
                    salary_type: {
                        required: function(element) {
                            return !$("#min").val() && !$("#max").val();
                        }
                    },
                    min_salary: {
                        required: function(element) {
                            return !$("#musahibe").is(":checked");
                        }
                    },
                    max_salary: {
                        required: function(element) {
                            return !$("#musahibe").is(":checked");
                        }
                    },
                    
                    experience: {
                        required: true,
                    },
                    education: {
                        required: true,
                    },
                    requirements: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                    company: {
                        required: true,
                    },
                    accept_type: {
                        required: true,
                    },
                    contact_link: {
                        required: function(element) {
                            return $("#accept_type").val() === '2';
                        }
                    },
                    contact_email: {
                        required: function(element) {
                            return $("#accept_type").val() === '0';
                        },
                        email: true,

                    },
                    deadline: {
                        required: true,
                    },
                    
                    

                },
                messages: {
                    position: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },


                    city: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    category: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    jobtype: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },

                    salary_type: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    experience: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    education: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    requirements: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    description: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    company: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    accept_type: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    contact_email: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        email: function() {
                            return getErrorMessage('email', lang);
                        },
                    
                    },
                    contact_link: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                    deadline: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },
                            
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                },
                errorPlacement: function(error, element) {
                error.insertAfter(element); // Hata mesajını alanın hemen altına yerleştirin
                }
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            var acceptType = $('#accept_cv').val();
            
            getContact(acceptType);
            
            $('#accept_cv').on('change', function() {
            var selectedType = $(this).val();
            
            getContact(selectedType);
            });
        });
        function getContact(id) {
            if (id == 1) {
                $('#type_email').slideUp();
                $('#type_link').slideUp();
            } else if (id == 0) {
                $('#type_email').slideDown();
                $('#type_link').slideUp();
            } else if (id == 2) {
                $('#type_email').slideUp();
                $('#type_link').slideDown();
            } else {
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

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#about_work' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#demands' ) )
            .catch( error => {
                console.error( error );
            } );

    </script>
@endsection

@section('css-link')
<link rel="stylesheet" href="{{asset('front/css/jobsearch.css')}}">
<link rel="stylesheet" href="{{asset('front/css/companies-announces.css')}}">
@endsection

