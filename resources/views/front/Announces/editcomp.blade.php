@extends('front.layouts.master')

@section('content')
@foreach ($banner as $ban)

<section class="header-info" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
      url({{asset($ban->image)}})">
       @endforeach

        <div class="header-links-div">
            <a class="header-links" href="{{route('profile')}}">
                @lang('front.umumi')
             </a>
             <a class="header-links" href="{{route('traningcreate')}}">
                 @lang('front.training')
             </a>
             <a class="header-links" href="{{route('cvindex')}}">
                 @lang('front.jobsearch')
             </a>
             <a class="header-links" href="{{route('announcesindex')}}">
                 @lang('front.isegotur')
             </a>
        </div>
    </section>

    <section class="company-announce">
        <div class="container company-announce-container">
            <div class="row m-0">   
                <div class="nav flex-column nav-pills company-announce-tabs col-lg-6 col-md-8" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active trending-nav-link1" href="{{route('announcesindex')}}">
                        <img id="training_icon1" src="https://1is.butagrup.az/back/assets/images/icons/companies-white.png" alt="company-white" /> @lang('front.sirketlerim')
                    </a>
                    <a class="nav-link nav-link-2 trending-nav-link2" href="{{route('createAnnounces')}}">
                        <img id="training_icon2" src="https://1is-new.netlify.app/images/companies-announces/create-announces-purple.png" alt="create-announce-purple" />@lang('front.elanyarat')
                    </a>
                    <a class="nav-link nav-link-2 trending-nav-link3" href="{{route('myAnnounces')}}">
                        <img id="training_icon3" src="https://1is.butagrup.az/back/assets/images/icons/announces-purple.png" alt="announces-purple" />@lang('front.elanlarim')
                    </a>
                    <a class="nav-link nav-link-2 trending-nav-link4" href="{{route('candidate')}}">
                        <img id="training_icon4" src="https://1is.butagrup.az/back/assets/images/icons/namizedler-purple.png" alt="namizedler-purple" /> @lang('front.namizedler')
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="tab-pane row create-announce-row" id="elan-yarat">
                        <form action="{{route('companiesEditPost')}}" method="POST" enctype="multipart/form-data" class="tab-pane row company-announce-form fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                               
                                <input type="hidden" name="id" value="{{$company->id}}">
                                @csrf
                            <div class="form-group company-announce-input-group col-12">
                                <label for="possession">@lang('front.ad')<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$company->name}}" placeholder="@lang('front.ad')"  />
                                
                                
                            </div>
                            <div class="form-group company-announce-input-group col-12  ">
                                <label for="city">@lang('front.sektor')<span class="text-danger">*</span></label>
                                <select class="form-control" name="sector" id="category"  >
                                    <option value="" selected disabled>@lang('front.birsec')...</option>
                                    @php
                                $lang = config('app.locale');
                            @endphp
                                    @foreach($sectors as $sector)
                                        <option value="{{$sector->id}}" @if($company->sector_id == $sector->id) selected @endif>
                                            @if ($lang == 'EN')
                                            {{$sector->title_en}}
                                        @elseif ($lang == 'RU')
                                            {{$sector->title_ru}}
                                        @elseif ($lang == 'TR')
                                            {{$sector->title_tr}}
                                        @else
                                            {{$sector->title_az}}
                                        @endif
                                    </option>
                                    @endforeach
                                  </select>  
                                                           
                                </div>
                               
                            
                                <div class="form-group company-announce-input-group col-12 ">
                                    <label for="possession">@lang('front.unvan')<span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" id="name" value="{{$company->address}}" placeholder="@lang('front.daxilet')" />
                                    
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12  ">
                                    <label for="possession">@lang('front.vebsayt')<span class="text-danger">*</span></label>
                                    <input type="text" name="website" class="form-control" id="possession" placeholder="@lang('front.daxilet')" value="{{$company->website}}"/>
                                    
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12 ">
                                    <label for="possession">@lang('front.vezife')<span class="text-danger">*</span></label>
                                    <input type="text" name="map" class="form-control" id="possession" placeholder="@lang('front.daxilet')" value="{{$company->map}}" />
                                   
                                </div>
                                <div class="form-group company-announce-input-group col-12 ">
                                    <label for="possession">@lang('front.about')<span class="text-danger">*</span></label>
                                    <input type="text" name="about" class="form-control" id="possession" placeholder="@lang('front.daxilet')" value="{{$company->about}}" />
                                    
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12 ">
                                    <label for="possession">@lang('front.hr')</label>
                                    <input type="text" name="hr" class="form-control" id="possession" placeholder="@lang('front.hr')" value="{{$company->hr}}" />
                                
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12  ">
                                    <label for="possession">@lang('front.instagram')</label>
                                    <input type="text" name="instagram" class="form-control" id="possession" placeholder="@lang('front.instagram')" value="{{$company->instagram}}" />
                                    
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12 ">
                                    <label for="possession">@lang('front.linkedin')</label>
                                    <input type="text" name="linkedin" class="form-control" id="possession" placeholder="@lang('front.linkedin')" value="{{$company->linkedin}}" />
                                    
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12  ">
                                    <label for="possession">@lang('front.facebook')</label>
                                    <input type="text" name="facebook" class="form-control" id="possession" placeholder="@lang('front.facebook')" value="{{$company->facebook}}" />
                                    
                                    
                                </div>
                                <div class="form-group company-announce-input-group col-12  ">
                                    <label for="possession">@lang('front.tvitter')</label>
                                    <input type="text" name="twitter" class="form-control" id="possession" placeholder="@lang('front.tvitter')" value="{{$company->twitter}}" />
                                    
                                    
                                </div>
                                <img src="{{asset($company->image)}}" alt="" width="200" height="200">

                                <div class="form-group company-announce-input-group col-12  ">
                                    <label for="possession">@lang('front.sekiladd')<span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" id="possession" placeholder="@lang('front.sekilsec')"/>
                                    
                                    
                                </div>
                            
                            
            
                            <div class="company-announce-form-button col-md-4">
                                <button type="submit">@lang('front.elaveet')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection






@section('js-link')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

    <script src="{{asset('front/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('front/js/slick.min.js')}}"></script>
    <script src="{{asset('front/js/companies-announces.js')}}"></script>
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
    
                    minlength: {
                        'AZ': 'Bu sahə üçün minimum 20 simvol limiti keçilməlidir!',
                        'EN': 'Minimum 20 characters limit should not be exceeded for this field!',
                        'RU': 'Минимальное количество символов для этого поля - 20!',
                        'TR': 'Bu alanda en az 20 karakter sınırı aşılmamalıdır!'
                    },
                   
                };
    
                return errorMessages[field][lang] || errorMessages[field]['AZ']; 
            }
    
            $("#v-pills-home").validate({
                onclick: false, // Tıklama yapıldığında hata mesajlarını gösterme
                
                rules: {
                    name: {
                        required: true,
    
                    },
                    sector: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    website: {
                        required: true,
                    },
                    
                    map: {
                        required: true,
                    },
                    about: {
                        required: true,
                        minlength: 20,
    
                    },
                    
     
                },
                messages: {
                    name: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },
    
    
                    sector: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },
    
                    address: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                      
                    },
                    website: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                      
                    },
    
                    map: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                      
                    },
                    about: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        minlength: function() {
                            return getErrorMessage('minlength', lang);
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



@section('css-link')
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/companies-announces.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jobsearch.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/header.css')}}">
@endsection