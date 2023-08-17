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
    
    <section class="create-cv" >
        <div class="container create-cv-container">
            <div class="row m-0">   
                <div class="nav flex-column nav-pills create-cv-tabs col-lg-4 col-md-8" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active nav-link-2 trending-nav-link2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <img id="training_icon2" src="{{asset('back/assets/images/icons/training-list-white.png')}}" alt="training-list-purple" /> @lang('front.cvler')
                    </a>
                    <a class="nav-link trending-nav-link1" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <img id="training_icon1" src="{{asset('back/assets/images/icons/add-training-purple.png')}}" alt="add-training-white" /> @lang('front.cvadd')
                    </a>
                    <a class="nav-link nav-link-2 trending-nav-link3" id="v-pills-liked-cv-tab" data-toggle="pill" href="#v-pills-liked-cv" role="tab" aria-controls="v-pills-liked-cv" aria-selected="false">
                        <img id="training_icon3" src="{{asset('back/assets/images/icons/training-list-purple1.png')}}" alt="training-list-purple" /> @lang('front.likecv')
                    </a>
                </div>
                <div class="tab-content col-lg-8" id="v-pills-tabContent">
                    <form class="tab-pane row create-cv-form fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" method="POST" action="{{route('cvPost')}}" enctype="multipart/form-data">
                        @csrf
                        <h3 class="col-12"></h3>
                        <div class="form-group create-cv-input-group col-md-6">
                            <label for="name">@lang('front.ad')  <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="@lang('front.addaxilet')" value="{{ old('name') }}"  />
                           
                        </div>
                        <div class="form-group create-cv-input-group col-md-6">
                            <label for="surName">@lang('front.soyad')  <span class="text-danger">*</span></label>
                            <input type="text" name="surname" class="form-control" id="surName" placeholder="@lang('front.soyaddaxil')" value="{{ old('surname') }}"  />
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-6">
                            <label for="fatherName">@lang('front.ata')  <span class="text-danger">*</span></label>
                            <input type="text" name="father_name" class="form-control" id="fatherName" placeholder="@lang('front.atadaxilet')" value="{{ old('father_name') }}"  />
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-6">
                            <label for="Email">@lang('front.epoct') <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="Email" placeholder="@lang('front.emaildaxilet')" value="{{ old('email') }}" />
                           
                        </div>
                        <div class="form-group create-cv-input-group col-12 ">
                            <label for="possession">@lang('front.vezife')  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="position" id="possession" placeholder="@lang('front.vezifedaxilet')" value="{{ old('position') }}" />
                           
                        </div>
                        <h3 class="col-12">@lang('front.gostericiler')</h3>
                        <div class="form-group create-cv-input-group col-md-4">
                            <select class="form-control" name="category" id="cv_categories"  >
                              <option disabled selected>@lang('front.cats')</option>
                              @php
                                $lang = config('app.locale');
                            @endphp
                              @foreach($categories as $category)
                                <option value="{{$category->id}}">
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
                        <div class="form-group create-cv-input-group col-md-4  ">
                            <select class="form-control" name="city" id="city">
                              <option  disabled selected>@lang('front.city')</option>
                              @foreach($cities as $city)
                                <option value="{{$city->id}}">
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
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <select class="form-control" name="education" id="education">
                                <option selected disabled>@lang('front.educ')...</option>
                                @foreach($educations as $education)
                                    <option value="{{$education->id}}">
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
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <select class="form-control" name="experience" id="exprience">
                                <option selected disabled>@lang('front.exp')...</option>
                                @foreach($experiences as $experience)
                                    <option value="{{$experience->id}}">
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
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <select class="form-control" name="jobtype" id="work_graf">
                                <option selected disabled>@lang('front.jobtype')...</option>
                                @foreach($jobtypes as $jobtype)
                                    <option value="{{$jobtype->id}}">
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
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <input type="number" class="form-control" name="salary" id="min-number" placeholder="@lang('front.minsalary')" />
                            
                        </div>
                        <h3 class="col-12">@lang('front.dogum')</h3>
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <label for="training_date">@lang('front.dogum')</label>
                            <input type="date" class="form-control" name="birth" id="birth_date"/>
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <label for="training_companies">@lang('front.cinssec')</label>
                            <select class="form-control" id="cins" name="gender">
                                <option selected disabled>@lang('front.cinssec')...</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}">
                                        @if ($lang == 'EN')
                                            {{$gender->title_en}}
                                        @elseif ($lang == 'RU')
                                            {{$gender->title_ru}}
                                        @elseif ($lang == 'TR')
                                            {{$gender->title_tr}}
                                        @else
                                            {{$gender->title_az}}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group create-cv-input-group col-md-4">
                            <label for="images">@lang('front.sekilsec') <span class="text-danger">*</span></label>
                            <div class="custom-file create-cv-custom-file">
                                <input type="file" name="image" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="images" accept="image/png, image/jpeg, image/svg+xml, image/webp">
                                <label class="custom-file-label add-image-label" for="image">@lang('front.elaveet')</label>
                            </div>
                        </div>
                        <div id="preview-container"></div>
                        
                        <script>
                            document.getElementById('images').addEventListener('change', function(e) {
                                var file = e.target.files[0];
                                var allowedImageExtensions = /(\.png|\.jpg|\.jpeg|\.gif|\.svg|\.webp)$/i;
                        
                                if (allowedImageExtensions.exec(file.name)) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        var img = document.createElement('img');
                                        img.src = e.target.result;
                                        img.style.maxWidth = '200px';
                                        img.style.maxHeight = '200px';
                                        img.style.objectFit = 'cover';
                                        var previewContainer = document.getElementById('preview-container');
                                        previewContainer.innerHTML = '';
                                        previewContainer.appendChild(img);
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    // Uygun resim dosyası değilse, önizlemeyi kaldır
                                    var previewContainer = document.getElementById('preview-container');
                                    previewContainer.innerHTML = '';
                                }
                            });
                        </script>
                        
                        
                        <div class="form-group create-cv-input-group col-12  ">
                            <label for="training_information">@lang('front.tehsilhaq')</label>
                            <textarea class="form-control" name="about_education" id="education_information" rows="5" placeholder="@lang('front.melumatver')!" value="{{ old('about_education') }}"></textarea>
                            
                        </div>
                        <div class="form-group create-cv-input-group col-12 ">
                            <label for="training_information">@lang('front.techaq')</label>
                            <textarea class="form-control" name="work_experience" id="exprience_information" rows="5" placeholder="@lang('front.melumatver')!" value="{{ old('work_experince') }}"></textarea>
                            
                        </div>
                        <div class="form-group create-cv-input-group col-12 ">
                            <label for="training_information">@lang('front.serthaq')</label>
                            <textarea class="form-control" name="skills" id="certificate_information" rows="5" placeholder="@lang('front.melumatver')!" value="{{ old('skills') }}"></textarea>
                            
                        </div>
                        
                        <div class="container" data-repeater-list="group-a">
                            <div id="repeater">
                                <label for="" class="form-label">@lang('front.portfolio')</label> <br>
                                <input type="button" id="createElement" class="btn btn-danger" value="İş Yeri Əlavə Et" />
                                <div class='row' id="structure" style="display:none">
                                    <div class='col-lg-3'>
                                        <label for='first-name'>@lang('front.isinadi')</label> <br>
                                        <input type="text" name="work_name" id="job_name" value="" class="form-control" placeholder="@lang('front.daxilet')" />
                                    </div>
                                    <div class='col-lg-3'>
                                        <br>
                                        <label for='first-name'> @lang('front.companies')</label> <br>
                                        <input type="text" name="work_company" id="comp_name" value="" class="form-control" placeholder="@lang('front.daxilet')" />
                                    </div>
                                    <div class='col-lg-3'>
                                    <br>
                                        <label for='first-name'>@lang('front.link')</label> <br>
                                        <input type="url" name="work_link" id="comp_link" value="" class="form-control" placeholder="@lang('front.daxilet')" />
                                    </div>
                                </div>
                                <div id="containerElement"></div>   
                            </div>
   
                        </div>  


                        <h3 class="col-12 mt-3">@lang('front.contact')</h3>
                        <div class="form-group create-cv-input-group col-md-6 @error('contact_email') has-error @enderror">
                            <label for="e_poçt">@lang('front.conmail')</label>
                            <input type="email" name="contact_mail" class="form-control" id="e_poçt" placeholder="@lang('front.emaildaxilet')" value="{{ old('contact_email') }}"  />
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-6 @error('contact_phone') has-error @enderror">
                            <label for="contact_number">@lang('front.contel')</label>
                            <input type="number" class="form-control" name="contact_phone" id="contact_number" placeholder="@lang('front.nomredaxilet')" value="{{ old('contact_phone') }}" />
                            
                        </div>
                        
                        <div class="form-group create-cv-input-group col-12 ">
                            <label for="images2" class="add-cv-label">@lang('front.cv')  <span class="text-danger">*</span></label>
                            <div class="custom-file add-cv-custom-file">
                                <input type="file" name="cv" class="custom-file-input js-custom-file-input-enabled" accept="application/pdf,application/vnd.ms-excel" data-toggle="custom-file-input" id="images2">
                                <label class="custom-file-label" for="image" id="file-label">@lang('front.yalnizpng')</label>
                                <span id="file-name"></span> <!-- Dosya adını görüntülemek için eklenen <span> -->
                                <div id="preview-container"></div>
                                
                            </div>
                        </div>
                        
                        <script>
                            document.getElementById('images2').addEventListener('change', function(e) {
                                var file = e.target.files[0];
                                var fileName = file.name;
                                document.getElementById('file-name').textContent = fileName;
                        
                                var allowedExtensions = /(\.png|\.jpg|\.jpeg|\.gif)$/i;
                                var fileLabel = document.getElementById('file-label');
                                var previewContainer = document.getElementById('preview-container');
                        
                                if (allowedExtensions.exec(fileName)) {
                                    fileLabel.textContent = fileName;
                                    
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        var img = document.createElement('img');
                                        img.src = e.target.result;
                                        img.style.maxWidth = '200px';
                                        img.style.maxHeight = '200px';
                                        img.style.objectFit = 'cover';
                                        previewContainer.innerHTML = '';
                                        previewContainer.appendChild(img);
                                    };
                                    reader.readAsDataURL(file);
                                } 
                            });
                        </script>
                        
                        
                                                

                        <div class="create-cv-form-button">
                            <button type="submit">@lang('front.elaveet')</button>
                        </div>
                    </form>
                    <div class="tab-pane create-cv-card-wrapper fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="row">
                            @foreach($cvs as $key=>$cv)
                            <div class="col-lg-6 col-md-6 d-flex justify-content-center create-cv-card-col">
                                <a href="{{route('cvedit', $cv->id)}}" class="job-search-card cv-jobsearcher cv-jobsearcher">
                                    <img class="job-search-avatar" src="{{$cv->image}}" alt="job-search-card1">
                                    <img class="job-edit-img" src="{{asset('back/assets/images/icons/training-list-message.png')}}" alt=""/>

                                    <div class="jobsearch-card-information">
                                        <h4>{{$cv->name}} {{$cv->surname}}</h4>
                                        <p>{{$cv->position}}</p>
                                        <h3>{{ $cv->salary ? $cv->salary.'₼' : '~' }}</h3>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            <div class="add-training-card-more-button">
                            </div>
                        </div>
                        
                    <nav aria-label="..." class="d-flex justify-content-center">
                        @if ($cvs->hasPages())
                        <ul class="pagination pagination-ul">
                            {{-- Previous Page Link --}}
                            @if ($cvs->onFirstPage())
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $cvs->appends(request()->except('page'))->previousPageUrl() }}" rel="prev">«</a></li>
                            @endif
                    
                            @if($cvs->currentPage() > 3)
                                <li class="page-item" class="hidden-xs"><a class="page-link" href="{{ $cvs->appends(request()->except('page'))->url(1) }}">1</a></li>
                            @endif
                            @if($cvs->currentPage() > 4)
                            <li class="page-item"><a class="page-link">...</a></li>
                            @endif
                            @foreach(range(1, $cvs->lastPage()) as $i)
                                @if($i >= $cvs->currentPage() - 1 && $i <= $cvs->currentPage() + 1)
                                    @if ($i == $cvs->currentPage())
                                        <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
                                    @else
                                        <li class="page-item "><a class="page-link" href="{{ $cvs->appends(request()->except('page'))->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endif
                            @endforeach
                            @if($cvs->currentPage() < $cvs->lastPage() - 2)
                            <li class="page-item"><a class="page-link">...</a></li>
                            @endif
                            @if($cvs->currentPage() < $cvs->lastPage() - 1)
                                <li class="page-item hidden-xs"><a class="page-link" href="{{ $cvs->appends(request()->except('page'))->url($cvs->lastPage()) }}">{{ $cvs->lastPage() }}</a></li>
                            @endif
                    
                            {{-- Next Page Link --}}
                            @if ($cvs->hasMorePages())
                                <li><a class="page-link" href="{{ $cvs->appends(request()->except('page'))->nextPageUrl() }}" rel="next">»</a></li>
                            @endif
                        </ul>               
                        @endif
    
                    </nav>
                    </div>
                    <div class="tab-pane row cv-liked-card-wrapper fade" id="v-pills-liked-cv" role="tabpanel" aria-labelledby="v-pills-liked-cv-tab">
                        @foreach ($favorits as $fav)
                            
                        <div class="col-lg-6 jobsearch-card-col mt-3">
                            <div class="job-search-card">
                                <img class="job-search-avatar" src="{{$fav->image}}" alt="job-search-card1">
                                
                                <img src="{{ asset('back/assets/images/icons/heart.png') }}" alt="heart" class="heart-icon" data-cv-id="{{$fav->id}}" style="{{ in_array($fav->id, $likes) ? 'display: none;' : 'display: inline-block;' }}">
                                <img src="{{ asset('back/assets/images/icons/red-heart.png') }}" alt="red-heart" class="red-heart-icon" data-cv-id="{{$fav->id}}" style="{{in_array($fav->id, $likes) ? 'display: inline-block;' : 'display: none;' }}">
                                <div class="jobsearch-card-information">
                                    <a href="{{ route('jobsearchdetail', $fav->id) }}"><h4>{{$fav->name}} {{$fav->surname}}</h4></a>
                                    <p>{{$fav->position}}</p>
                                    <h3>{{ $fav->salary ? $fav->salary.'₼' : '~' }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
@endsection

@section('css-link')
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/create-cv.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jobsearch.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/header.css')}}">
    <style>
        .tox-notifications-container{
            display:none !important;
        }
    </style>
    <style>
        #structure{
            align-items: flex-end;
        }

        #comp_link, #comp_name, #job_name{
            background: #FFFFFF;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            padding: 12px 14px!important;
        }

        .removeElement{
            margin-left: 15px;
            /* padding: 0px 15px; */
            padding: 15px 29px;
            border: none;
            background: #9559E5;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 17px;
            color: #FFFFFF;
        }
    </style>

@endsection

@section('js-link')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var heartIcons = document.querySelectorAll('.red-heart-icon');

        heartIcons.forEach(function (icon) {
            icon.addEventListener('click', function () {
                var cvId = this.getAttribute('data-cv-id');
                var redHeartIcon = document.querySelector('.heart-icon[data-cv-id="' + cvId + '"]');
                var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

                if (isLoggedIn) {
                    this.style.display = 'none';
                    redHeartIcon.style.display = 'inline-block';
                }

                // AJAX isteği
                var xhr = new XMLHttpRequest();
                var url = '{{ route('cvdislike') }}'; // Dislike işlemi için uygun URL'yi buraya yazın
                var params = 'cv_id=' + cvId + '&_token=' + '{{ csrf_token() }}';

                xhr.open('POST', url, true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            if (!isLoggedIn) {
                                redHeartIcon.style.display = 'inline-block';
                                icon.style.display = 'none'; // Hide the white heart icon for anonymous users

                            }
                        } else if (xhr.status === 403) {
                            var response = JSON.parse(xhr.responseText);
                            alert(response.error);
                        }
                    }
                };

                xhr.send(params);
            });
        });
        });
    </script>
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/slick.min.js')}}"></script>
    <script src="{{asset('front/js/add-training.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="{{asset('front/js/repeater.js')}}"></script>
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
                    
                    maxlength: {
                        'AZ': 'Bu sahə üçün maksimum 100 simvol limiti keçilməlidir!',
                        'EN': 'Maximum 100 characters limit should not be exceeded for this field!',
                        'RU': 'Максимальное количество символов для этого поля - 100!',
                        'TR': 'Bu alan için maksimum 100 karakter sınırı aşılmamalıdır!'
                    },
                    maxFileSize: {
                        'AZ': 'Şəkil üçün maksimum fayl ölçüsü 5MB olmalıdır!',
                        'EN': 'The maximum file size for the image should be 5MB!',
                        'RU': 'Максимальный размер файла для изображения должен быть 5 МБ!',
                        'TR': 'Resim için maksimum dosya boyutu 5MB olmalıdır!'
                    },
                    accept: {
                        'AZ': 'Lütfen bir resim dosyası seçin!',
                        'EN': 'Please select an image file!',
                        'RU': 'Пожалуйста, выберите файл изображения!',
                        'TR': 'Lütfen bir resim dosyası seçin!'
                    },

                
                };

                return errorMessages[field][lang] || errorMessages[field]['AZ']; 
            }

            $("#v-pills-home").validate({
                onclick: false, // Tıklama yapıldığında hata mesajlarını gösterme
                
                rules: {
                    position: {
                        required: true,
                        maxlength: 255,

                    },
                    name: {
                        required: true,
                    },
                    surname: {
                        required: true,
                    },
                    father_name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,

                    },
                    image: {
                        required: true,
                    },
                    cv: {
                        required: true,
                    },
                    
                    

                },
                messages: {
                    position: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                        maxlength: function() {
                            return getErrorMessage('maxlength', lang);
                        }
                    },


                    name: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    surname: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },

                    father_name: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                        
                    },
                    email: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        email: function() {
                            return getErrorMessage('email', lang);
                        },
                        
                    },
                    
                    image: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },
                    cv: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    
                    
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                },
                errorPlacement: function(error, element) {
        // Hata mesajlarını görüntülemek için gerekli işlemleri yapın
        error.insertAfter(element); // Hata mesajını alanın hemen altına yerleştirin
                }
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#education_information' ) )
            .catch( error => {
                console.error( error );
            } );
    
        ClassicEditor
            .create( document.querySelector( '#exprience_information' ) )
            .catch( error => {
                console.error( error );
            } );
    
        ClassicEditor
            .create( document.querySelector( '#certificate_information' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    
    

    <script>
      $(function () {
        $("#repeater").repeater({
          items: [
            {
              elements: [
                {
                  id: "first_name",
                  value: "",
                },
                {
                  id: "languages",
                  value: "css",
                },
              ],
            },
          ],
        });
      });

      const removeBtn = document.querySelector('.removeElement')
      console.log('Remove BTN',removeBtn)
    </script>

   
@endsection