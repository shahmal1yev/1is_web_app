@extends('front.layouts.master')

@section('content')

    @foreach ($banner as $ban)

        <section class="header-info" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
            url({{asset($ban->image)}})">
    @endforeach

    </section>
    <section class="create-cv" >
        <div class="container create-cv-container">
            <div class="row m-0">   
                
                <div class="tab-content col-lg-8 m-auto" id="v-pills-tabContent">
                    <form action="{{route('cveditPost')}}" method="POST" enctype="multipart/form-data" class="tab-pane row create-cv-form fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <input type="hidden" name="id" value="{{$cv->id}}">

                        @csrf
                        <h3 class="col-12"></h3>
                        <img src="{{asset($cv->image)}}" alt="" width="200" height="200">

                        <div class="form-group create-cv-input-group col-md-12">
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
                        
                        

                        <div class="form-group create-cv-input-group col-md-6  ">
                            <label for="name">@lang('front.ad')  <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$cv->name}}" placeholder="@lang('front.addaxilet')" />
                             
                        </div>
                        <div class="form-group create-cv-input-group col-md-6 ">
                            <label for="surName">@lang('front.soyad')  <span class="text-danger">*</span></label>
                            <input type="text" name="surname" class="form-control" id="surName" value="{{$cv->surname}}" placeholder="@lang('front.soyaddaxil')" />
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-6 ">
                            <label for="fatherName">@lang('front.ata')  <span class="text-danger">*</span></label>
                            <input type="text" name="father_name" class="form-control" id="fatherName" value="{{$cv->father_name}}" placeholder="@lang('front.atadaxilet')"/>
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-6 ">
                            <label for="Email">@lang('front.epoct')  <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="Email" value="{{$cv->email}}" placeholder="@lang('front.emaildaxilet')" />
                            @error('email')
                                <span class="text-danger" style="font-size: 14x">@lang('validation.email_email')</span>
                                @enderror
                        </div>
                        <div class="form-group create-cv-input-group col-12  ">
                            <label for="possession">@lang('front.vezife')  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="position" value="{{$cv->position}}" id="possession" placeholder="@lang('front.vezifedaxilet')" />
                            
                        </div>
                        <h3 class="col-12">@lang('front.gostericiler')</h3>
                        <div class="form-group create-cv-input-group col-md-4  ">
                            <select class="form-control" name="category" id="cv_categories" >
                              <option disabled selected>@lang('front.cats')</option>
                              @php
                                $lang = config('app.locale');
                            @endphp
                              @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($cv->category_id == $category->id) selected @endif>
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
                            <option value="{{$city->id}}" @if($cv->city_id == $city->id) selected @endif>
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
                                    <option value="{{$education->id}}" @if($cv->education_id == $education->id) selected @endif>
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
                            <option value="{{$experience->id}}" @if($cv->experience_id == $experience->id) selected @endif>
                                @if ($lang == 'EN')
                                    {{$experience->title_en}}
                                @elseif ($lang == 'RU')
                                    {{$experience->title_ru}}
                                @elseif ($lang == 'TR')
                                    {{$experience->title_tr}}
                                @else
                                    {{$experience->title_az}}
                                @endif</option>
                            @endforeach
                            
                            </select>
                        </div>
                        <div class="form-group create-cv-input-group col-md-4  ">
                            <select class="form-control" name="jobtype" id="work_graf">
                                <option selected disabled>@lang('front.jobtype')...</option>
                                @foreach($jobtypes as $key=>$type)
                                    <option value="{{$key}}" @if($key == $cv->accept_type) selected @endif>
                                        @if ($lang == 'EN')
                                            {{$type->title_en}}
                                        @elseif ($lang == 'RU')
                                            {{$type->title_ru}}
                                        @elseif ($lang == 'TR')
                                            {{$type->title_tr}}
                                        @else
                                            {{$type->title_az}}
                                        @endif
                                    </option>
                                @endforeach
                               
                            </select>
                        </div>
                        <div class="form-group create-cv-input-group col-md-4">
                            <input type="number" class="form-control" name="salary" id="min-number" placeholder="@lang('front.minsalary')" value="{{$cv->salary}}"/>
                            
                        </div>
                        <h3 class="col-12">@lang('front.sexsi')</h3>
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <label for="training_date">@lang('front.dogum')</label>
                            <input type="date" class="form-control" name="birth" value="{{$cv->birth_date}}" id="birth_date"/>
                            
                        </div>
                        <div class="form-group create-cv-input-group col-md-4 ">
                            <label for="training_companies">@lang('front.cinssec')</label>
                            <select class="form-control" id="cins" name="gender">
                                <option selected disabled>@lang('front.cinssec')...</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}" @if($cv->gender_id == $gender->id) selected @endif>
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
                        
                        
                        <div class="form-group create-cv-input-group col-12 ">
                            <label for="training_information">@lang('front.tehsilhaq')</label>
                            <textarea class="form-control" name="about_education" id="education_information" rows="5" placeholder="Məlumat verin!">
                                {{ htmlspecialchars_decode($cv->about_education) }}</textarea>
                               
                        </div>
                        <div class="form-group create-cv-input-group col-12">
                            <label for="training_information">@lang('front.techaq')</label>
                            <textarea class="form-control" name="work_experience" id="exprience_information" rows="5" placeholder="Məlumat verin!">
                                {{ htmlspecialchars_decode($cv->work_experience) }}
                            </textarea>
                            
                        </div>
                        <div class="form-group create-cv-input-group col-12">
                            <label for="training_information">@lang('front.serthaq')</label>
                            <textarea class="form-control" name="skills" id="certificate_information" rows="5" placeholder="Məlumat verin!">
                                {{ htmlspecialchars_decode($cv->skills) }}</textarea>
                                
                        </div>

                        
                            
                                <div class="container" data-repeater-list="group-a">
                                    <div id="repeater">
                                        <label for="" class="form-label">@lang('front.portfolio')</label> <br>
                                        <input type="button" id="createElement" class="btn btn-danger" value="İş Yeri Əlavə Et" />
                                        <div class='row' id="structure" style="display:none">
                                            <div class='col-lg-3'>
                                                <label for='first-name'>@lang('front.isinadi')</label> <br>
                                                <input type="text" name="work_name" id="job_namee" value="" class="form-control" placeholder="@lang('front.daxilet')" />
                                            </div>
                                            <div class='col-lg-3'>
                                                <br>
                                                <label for='first-name'> @lang('front.companies')</label> <br>
                                                <input type="text" name="work_company" id="comp_namee" value="" class="form-control" placeholder="@lang('front.daxilet')" />
                                            </div>
                                            <div class='col-lg-3'>
                                            <br>
                                                <label for='first-name'>@lang('front.link')</label> <br>
                                                <input type="url" name="work_link" id="comp_linkk" value="" class="form-control" placeholder="@lang('front.daxilet')" />
                                            </div>
                                        </div>
                                        <div id="containerElement"></div>   
                                    </div>
                                </div>

                            <div class="container" data-repeater-list="group-a">

                            @php
                                $portfolio = json_decode($cv->portfolio, true);
                                $itm = $portfolio['portfolio'];
                                
                                if (!$itm || !isset($itm[0]['job_name'])) {
                                    $itm = [['job_name' => '', 'company' => '', 'link' => '']];
                                }
                                
                                $count = count($itm);
                            @endphp


                                @for ($i = 0; $i < $count; $i++)
                                @php
                                    $job_name = isset($itm[$i]['job_name']) ? $itm[$i]['job_name'] : '';
                                    $company = isset($itm[$i]['company']) ? $itm[$i]['company'] : '';
                                    $link = isset($itm[$i]['link']) ? $itm[$i]['link'] : '';
                                    $rnd =  rand().time();
                                    $portId = "port_id_" . $rnd;
                                
                                @endphp

                                <div class='row silinmeli' id="{{ $portId }}">
                                    <div class='col-lg-3'>
                                        <label for='first-name'>@lang('front.isinadi')</label> <br>
                                        <input type="text" name="group[{{ $rnd }}][work_name]" value="{{ $job_name }}" class="form-control" placeholder="@lang('front.daxilet')" />
                                    </div>
                                    <div class='col-lg-3'>
                                        <br>
                                        <label for='first-name'> @lang('front.companies')</label> <br>
                                        <input type="text" name="group[{{ $rnd }}][work_company]" value="{{ $company }}" class="form-control" placeholder="@lang('front.daxilet')" />
                                    </div>
                                    <div class='col-lg-3'>
                                        <br>
                                        <label for='first-name'>@lang('front.link')</label> <br>
                                        <input type="text" name="group[{{ $rnd }}][work_link]" value="{{ $link }}" class="form-control" placeholder="@lang('front.daxilet')" />
                                    </div>
                                    <button onclick="deleteRow('{{ $portId }}')" type="button" class="delete-btn">SIL</button>
                                </div>

                                <script>
                                function deleteRow(portId) {
                                    var element = document.getElementById(portId);
                                    element.parentNode.removeChild(element);
                                }
                                </script>

                                @endfor
                                </div>


                                <script>
                                    function deleteElement(){
                                        const deleteDiv=document.querySelector(".silinmeli");
                                        deleteDiv.remove()

                                    }
                                                                            
                                </script>
                        
                        
                        <h3 class="col-12">@lang('front.contact')</h3>
                        <div class="form-group create-cv-input-group col-md-12  ">
                            <label for="e_poçt">@lang('front.conmail')</label>
                            <input type="email" name="contact_mail" value="{{$cv->contact_mail}}" class="form-control" id="e_poçt" placeholder="@lang('front.emaildaxilet')"  />
                           
                        </div>
                        <div class="form-group create-cv-input-group col-12 ">
                            <label for="contact_number">@lang('front.contel')</label>
                            <input type="number" class="form-control" name="contact_phone" id="contact_number" value="{{$cv->contact_phone}}" placeholder="@lang('front.nomredaxilet')"  />
                           
                        </div>
                        
                        <div class="form-group create-cv-input-group col-12">
                            <label for="images2" class="add-cv-label">@lang('front.cv')<span class="text-danger">*</span></label>
                            <div class="custom-file add-cv-custom-file">cv
                                <input type="file" name="cv" value="" class="custom-file-input js-custom-file-input-enabled" accept="application/pdf,application/vnd.ms-excel" data-toggle="custom-file-input" id="images2">
                                <label class="custom-file-label" for="image">@lang('front.yalnizpng')</label>
                                <span id="file-name"></span> <!-- Dosya adını görüntülemek için eklenen <span> -->
                                <div id="preview-container"></div>

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
                            <p>Cari CV: </p>
                            @php
                            $fileExtension = pathinfo($cv->cv, PATHINFO_EXTENSION);
                        @endphp
                        
                        @if(in_array($fileExtension, ['png', 'jpg', 'jpeg', 'gif']))
                            <img src="{{ asset($cv->cv) }}" alt="Resim" width="50%" height="auto">
                        @else
                            <iframe src="{{ asset($cv->cv) }}" frameborder="0" width="50%" height="500px"></iframe>
                        @endif
                            </div>

                        <div class="create-cv-form-button">
                            <button type="submit">@lang('front.elaveet')</button>
                        </div>
                    </form>
       
                   
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

        .create-cv{
            margin-top: 50px;
        }

        #structure{
                align-items: flex-end;
            }

        #structure label{
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 17px;
            color: #020202;
        }

            #comp_linkk, #comp_namee, #job_namee, .silinmeli input{
            background: #FFFFFF;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            padding: 12px 14px!important;
        }

        .removeElement , .silinmeli button{
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

        .silinmeli{
            align-items: end;
            margin-bottom: 15px;
        }

        .silinmeli label{
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 17px;
            color: #020202;
        }
    </style>
@endsection

@section('js-link')
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/slick.min.js')}}"></script>
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
                    
                
                    
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                },
                errorPlacement: function(error, element) {
                error.insertAfter(element); 
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
    </script>


   
@endsection