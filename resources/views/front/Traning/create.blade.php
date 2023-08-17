
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

    <section class="add-training">
        <div class="container add-training-container">
            <div class="row">   
                <div class="nav flex-column nav-pills add-training-tabs col-md-6" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active trending-nav-link1" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                        <img id="training_icon1" src="{{asset('back/assets/images/icons/add-training-white.png')}}" alt="add-training-white" /> @lang('front.telimadd')
                    </a>
                    <a class="nav-link nav-link-2 trending-nav-link2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                        <img id="training_icon2" src="{{asset('back/assets/images/icons/training-list-purple1.png')}}" alt="training-list-purple" /> @lang('front.telimlist')
                    </a>
                    
                </div>


                <div class="tab-pane add-training-form fade show active col-md-6" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form action="{{route('trainingAddPost')}}" method="POST" enctype="multipart/form-data" id="register_form">
                        @csrf
                    <div class="form-group add-training-input-group">
                        <label for="training_name">@lang('front.tad') <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" id="training_name" placeholder="@lang('front.tad')" value="{{old('title')}}" />
                        
                    </div>
                    <div class="form-group add-training-input-group">
                        <label for="training_date">@lang('front.sonmur') <span class="text-danger">*</span></label>
                        <input type="date" name="deadline" class="form-control" id="training_date" value="{{old('deadline')}}" />
                        
                    </div>
                    <div class="form-group add-training-input-group">
                        <label for="training_information">@lang('front.telhaq') <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="about" id="training_information" rows="5" placeholder="@lang('front.melumatver')!">{{old('about', isset($data) ? $data->about : '')}}</textarea>

                    </div>
                    
                    <div class="form-group add-training-input-group">
                        <label for="training_companies">@lang('front.companies') <span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" id="training_companies" name="company"  value="{{ old('company') }}" >
                            <option value="" selected disabled>@lang('front.sirketsec')...</option>
                            @foreach($companies as $company)
                                <option value="{{$company->id}}"@if(old('company') == $company->id) selected @endif>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group add-training-input-group">
                        <label for="training_url">@lang('front.yonlink') <span class="text-danger">*</span></label>
                        <input type="url" name="link" placeholder="@lang('front.urldaxilet')" class="form-control" id="training_url" value="{{old('link')}}" />
                        <label id="training_url-error" class="error" for="training_url">Bu sahə doldurulmalıdır!</label>

                    </div>
                    <div class="form-group add-training-input-group">
                        <label for="training_payment">@lang('front.odenistip') <span class="text-danger">*</span></label>
                        <select name="payment_type" class="form-control" id="training_payment" onchange="getPayment(this.value)" >
                            <option disabled selected>@lang('front.odenismetod')...</option>
                            <option value="0" {{ old('payment_type') == '0' ? 'selected' : '' }}>@lang('front.pulsuz')</option>
                            <option value="1" {{ old('payment_type') == '1' ? 'selected' : '' }}>@lang('front.pullu')</option>
                        </select>
                    </div>
                    
                    <div class="form-group add-training-input-group">
                        <div class="row mb-4" id="price" @if(old('payment_type') == '0' || !old('payment_type')) style="display: none" @endif>
                        <label for="training_name">@lang('front.qiymetpul')</label>
                            <input class="form-control" type="number" name="price" step="1" placeholder="@lang('front.qiymetpul'):" value="{{ old('price') }}">
                        </div>
                    </div>
                    
                    <div class="form-group add-training-input-group">
                        <label for="images">@lang('front.sekiladd') <span class="text-danger">*</span></label>
                        <div class="custom-file training-custom-file">
                          <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="images" name="image" accept="image/*">
                          <label class="custom-file-label add-image-label" for="images">@lang('front.sekilsec')</label>
                        </div>
                        <div id="image-preview-container"></div>
                      </div>
                      
                      <script>
                        $("#images").change(function() {
                          var file = $(this)[0].files[0];
                          if (file) {
                            $(".add-image-label").text(file.name); // Seçilen dosyanın adını etikete ata
                            var reader = new FileReader();
                            reader.onload = function(e) {
                              var previewHtml = '<img src="' + e.target.result + '" alt="Image Preview" class="image-preview">';
                              $("#image-preview-container").html(previewHtml); // Seçilen resmi önizleme alanına ekle
                            }
                            reader.readAsDataURL(file);
                          } else {
                            $(".add-image-label").text("@lang('front.sekilsec')");
                            $("#image-preview-container").html(""); // Önizleme alanını temizle
                          }
                        });
                      </script>
                      
                    <div class="add-training-form-button">
                        <button id="send" type="submit">@lang('front.elaveet')</button>
                    </div>
                </form>
                </div> 

                
                <div class="tab-pane add-training-card-wrapper col-12 fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="row mt-4">
                        @foreach($trainings as $key=>$train)
                        <div class="col-md-4 mb-3">
                            <div class="add-training-card">
                                <div class="add-training-card-image">
                                    <img src="{{asset($train->image)}}" alt="training-list-avatar" />
                                </div>
                                <p>{{$train->title}}</p>
                                @if($train->payment_type)
                                <span>{{$train->price}} AZN</span>
                                @else
                                <span>@lang('front.pulsuz')</span>
                              @endif
                                <a href="{{route('trainingsdetail', $train->id)}}" class="training-list-thin">@lang('front.readmore')</a>
                                <a href="{{route('traniningedit', $train->id)}}" class="training-list-edit">
                                    <img src="{{asset('back/assets/images/icons/training-list-message.png')}}" alt="training-list-edit" />
                                </a>
                                @if($train->status == 1)
                                    <img class="training-list-green" src="{{asset('back/assets/images/icons/training-list-green.png')}}" alt="training-list-green" />
                                @else
                                    <img class="training-list-green" src="{{asset('back/assets/images/icons/announce-yellow.png')}}" alt="training-list-green"  />
                                @endif
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="add-training-card-more-button">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection




@section('js-link')
    <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/slick.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#training_information' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


    <script>
        function getPayment(id){
            if(id == 1){
                $('#price').slideDown()
            }else{
                $('#price').slideUp()
            }
        }
    </script>

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
                        'AZ': 'Bu sahə üçün minimum 9 simvol limiti keçilməlidir!',
                        'EN': 'Minimum 9 characters limit should not be exceeded for this field!',
                        'RU': 'Минимальное количество символов для этого поля - 9!',
                        'TR': 'Bu alanda en az 9 karakter sınırı aşılmamalıdır!'
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

            $("#register_form").validate({
                onclick: false, // Tıklama yapıldığında hata mesajlarını gösterme
                
                rules: {
                    title: {
                        required: true,
                    },
                    deadline: {
                        required: true,
                    },
                    about: {
                        required: true,
                    },

                    company: {
                        required: true,
                    },

                    link: {
                        required: true,
                    },

                    payment_type: {
                        required: true,
                    },
                    price: {
                        required: function(element) {
                            return $("#training_payment").val() !== '0';
                        }
                    },


                    image: {
                        required: true,
                        
                    },
                    


                },
                messages: {
                    title: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    deadline: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    about: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    
                    },

                    company: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                        
                    },
                    link: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },
                    payment_type: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    price: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                    },

                    image: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                    },

                    
                    
                },
                submitHandler: function(form) {
                    if (form.checkValidity()) {
                        return true;
                    }
                },
                errorPlacement: function(error, element) {
            error.insertAfter(element); // Hata mesajını alanın hemen altına yerleştirin
        }
            });

        
        
        });

    
    </script>

    <script>
        const training_url = document.querySelector('#training_url');
        const register_form = document.querySelector('#register_form');
        const training_url_error = document.querySelector('#training_url-error');
        
        register_form.addEventListener('submit', (e) => {
            if(training_url.value === '') {
                training_url_error.style.display = 'block';
                e.preventDefault();
            }else {
                training_url_error.style.display = 'none';
            }
        });
    </script>

    <script>
        const sendBtn = document.getElementById("send");
        sendBtn.addEventListener("click", (e) => {

            var errorIn = document.getElementById("training_url-error");
            var nameVal = document.getElementById("training_url");
            var latestVal = nameVal.value;
            if (latestVal.length == 0) {
            errorIn.innerText = "Link is required";
            return false;
            }

            errorIn.innerText = "Valid Link";
            return true;
            
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection

@section('css-link')
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/add-training.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/header.css')}}">
    <style>
        .image-preview {
            width: 150px;
            height: 150px;
            }

    /* SELECT2  */
        .add-training-input-group span{
            height: 60px!important;
            border-radius: 8px!important;
        }

        .select2-selection__rendered {
            display: flex!important;
            align-items: center!important;
        }

    </style>
@endsection
