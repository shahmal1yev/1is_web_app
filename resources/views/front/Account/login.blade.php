@extends('front.layouts.master')

{{-- <style> 
    .log-reg-tabs-wrapper {
        margin-top: 20px;
        width: 84%;
    }

    .log-reg-tabs {
    width: 80%;
    display: flex;
    margin: 0 auto;
    gap: 5px;
    background: #5B5B5B;
    border-radius: 40px;
    padding: 5px 7px;
    }   

    .log-tab, .reg-tab {
        width: 50%;
        padding-top: 8px;
        padding-bottom: 8px;
        border-radius: 40px;
        font-family: 'Outfit';
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 18px;
        color: #FFFFFF;
        text-align: center;
    }

    .log-tab.active {
        background: #8843E1;
        border: 1px solid #682DB3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.15);
    }
</style> --}}
<style>
    .select2-container--default .select2-selection--multiple {
        background-color: transparent!important;
        padding: 10px 15px;
    border: 1px solid #5b5b5b;
    border-radius: 8px;
    }
</style>
@section('content')
<section class="login-section">
        <div class="login-background">
            <div class="login-authentification">
                <img class="login-logo" src="{{asset('back/assets/images/icons/oneJob-login.png')}}" alt="oneJob-login" />
                <!-- <h3>@lang('front.saytagir')</h3> -->
                {{-- <div class="log-reg-tabs-wrapper">
                    <div class="log-reg-tabs">
                        <div class="log-tab active" id="log_tab">Log in</div>
                        <div class="reg-tab" id="reg_tab">Sign in</div>
                    </div>
                </div> --}}
                
                <div class="login-cont">
                    <!-- <ul class="nav nav-tabs" role="tablist" >
                        <li class="active"><a data-toggle="tab" href="#home">Log in</a></li>
                        <li><a data-toggle="tab" href="#menu1">Sign in</a></li>
                    </ul> -->

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                @lang('front.daxilol')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#menu1" role="tab" aria-controls="profile" aria-selected="false">
                                @lang('front.register')
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fadein active">
                            <form action="{{ route('login_post') }}" class="row login-form" method="POST" id="login_form">
                            @csrf
                            <div class="form-group login-form-group col-lg-9 col-md-7">
                                <label class='login-form-email' for="login_email">@lang('front.epoct')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                <input type="email" name="email" placeholder="@lang('front.emaildaxilet')" />
                            </div>
                            <div class="form-group login-form-group col-lg-9 col-md-7 password-input">
                                <label for="login_password">@lang('front.pass')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                <input id="login-pass" type="password" name="password" placeholder="@lang('front.sifredaxilet')" />
                                <img src="{{asset('back/assets/images/view.png')}}" id="view-id" alt="" />
                                <img src="{{asset('back/assets/images/hide.png')}}" id="hide-id" alt="" />
                            </div>
                            <div class="login-bottom">
                                <div class="remember-me-checkbox">
                                    <input type="checkbox" name="remember" id="remember" />
                                    <label for="remember"><b>@lang('front.remember')</b></label>
                                </div>
                                <a class="forgot-password" href="{{route('forget')}}"><b>@lang('front.sifreunut')</b></a>
                            </div>

                            <div class="col-lg-9 col-md-7 login-buttons">
                                <button class="login-registration" type="submit">@lang('front.daxilol')</button>                 
                                <span>@lang('front.veya')</span>
                                <a class="login-google-registration" href="{{ route('google.login') }}">
                                    <img src="{{asset('back/assets/images/google-play.png')}}" alt="google-play" />
                                    @lang('front.google')
                                </a>
                                
                            </div>
                        </form>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                                        
                            <form action="{{ route('register_post') }}" class="row mx-0 register-form mt-4"  id="register_form" method="POST">
                                @csrf
                                <div class="form-group login-form-group col-md-5">
                                    <label for="reg_name">@lang('front.ad')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                    <input placeholder="@lang('front.addaxilet')" type="text" name="name"/>
                                </div>
                                <div class="form-group login-form-group col-md-5">
                                    <label for="reg_name">@lang('front.soyad')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                    <input placeholder="@lang('front.soyaddaxil')" type="text" name="surname"/>
                                </div>
                                <div class="form-group login-form-group col-md-10">
                                    <label for="reg_email">@lang('front.epoct')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                    <input type="email" name="email" placeholder="@lang('front.emaildaxilet')"/>
                                    
                                </div>
                                <div class="form-group login-form-group col-md-10 sign-div">
                                    <label for="reg_password">@lang('front.pass')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                    <input id='sign-inpt1' type="password" name="password" placeholder="@lang('front.sifredaxilet')"/>
                                    <img src="{{asset('back/assets/images/view.png')}}" id="view-id2" alt="" />
                                    <img src="{{asset('back/assets/images/hide.png')}}" id="hide-id2" alt="" />
                                </div>
                                <div class="form-group login-form-group col-md-10 sign-div">
                                    <label for="reg_password">@lang('front.tekrarpass')<span style="color: rgba(192, 0, 0, 1)">*</span></label>
                                    <input id='sign-inpt2' type="password" name="password_confirmation" id="password_confirmation" placeholder="@lang('front.tekrarpass')"/>
                                    <img src="{{asset('back/assets/images/view.png')}}" id="view-id3" alt="" />
                                    <img src="{{asset('back/assets/images/hide.png')}}" id="hide-id3" alt="" />
                                </div>
                                
                                
                                <div class="form-group login-form-group col-md-10">
                                <div id="no-limit">
                                    <p>@lang('front.hobby')<span style="color: rgba(192, 0, 0, 1)">*</span></p>
                                    <select class="select2 form-select" style="width: 100%;" name="cat_id[]" multiple>
                                        <option value="" disabled></option>

                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title_az}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                
                            </div>

                                <div class="col-lg-10 col-md-7 login-buttons">
                                    <button class="login-registration" type="submit">@lang('front.register')</button>                 
                                    <span>@lang('front.veya')</span>
                                        <a class="login-google-registration" href="{{ route('google.login') }}">
                                            <img src="{{asset('back/assets/images/google-play.png')}}" alt="google-play" />
                                            @lang('front.google')
                                        </a>
                                        
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection

@section('js')
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

                return errorMessages[field][lang] || errorMessages[field]['AZ']; // Varsayılan olarak İngilizce mesaj kullan
            }

            $("#login_form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },

                messages: {
                    email: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        email: function() {
                            return getErrorMessage('email', lang);
                        },
                        
                    },

                    password: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                        
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                }
            });
        });

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
                email: {
                    'AZ': 'Düzgün bir email adresi daxil edin.',
                    'EN': 'Please enter a valid email address.',
                    'RU': 'Введите действительный адрес электронной почты.',
                    'TR': 'Geçerli bir email adresi giriniz.'
                },
                maxlength: {
                    'AZ': 'Bu sahə üçün maksimum  simvol limiti keçilməlidir!',
                    'EN': 'Maximum  characters limit should not be exceeded for this field!',
                    'RU': 'Максимальное количество символов для этого поля - !',
                    'TR': 'Bu alan için maksimum  karakter sınırı aşılmamalıdır!'
                },

                minlength: {
                    'AZ': 'Bu sahə üçün minimum 8 simvol limiti keçilməlidir!',
                    'EN': 'Minimum 8 characters limit should not be exceeded for this field!',
                    'RU': 'Минимальное количество символов для этого поля - 8!',
                    'TR': 'Bu alanda en az 8 karakter sınırı aşılmamalıdır!'
                },
                equalTo: {
                    'AZ': 'Bu sahə şifrə ilə uyğun olmalıdır!',
                    'EN': 'This field must match the password!',
                    'RU': 'Это поле должно совпадать с паролем!',
                    'TR': 'Bu alan şifreyle eşleşmelidir!'
                }
            };

            return errorMessages[field][lang] || errorMessages[field]['AZ']; // Varsayılan olarak İngilizce mesaj kullan
        }

        $("#register_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                name: {
                    required: true,
                    maxlength: 255,
                },
                surname: {
                    required: true,
                    maxlength: 255,
                },

                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#sign-inpt1",
                    minlength: 8

                },
                'cat_id[]': {
                    required: true
                }


            },
            messages: {
                email: {
                    required: function() {
                        return getErrorMessage('required', lang);
                    },
                    email: function() {
                        return getErrorMessage('email', lang);
                    },
                    
                },

                name: {
                    required: function() {
                        return getErrorMessage('required', lang);
                    },
                    
                    maxlength: function() {
                        return getErrorMessage('maxlength', lang);
                    }
                },

                surname: {
                    required: function() {
                        return getErrorMessage('required', lang);
                    },
                    
                    maxlength: function() {
                        return getErrorMessage('maxlength', lang);
                    }
                },

                password: {
                    required: function() {
                        return getErrorMessage('required', lang);
                    },
                    
                    minlength: function() {
                        return getErrorMessage('minlength', lang);
                    }
                },
                password_confirmation: {
                    required: function() {
                        return getErrorMessage('required', lang);
                    },
                    
                    equalTo: function() {
                        return getErrorMessage('equalTo', lang);
                    },
                    minlength: function() {
                        return getErrorMessage('minlength', lang);
                    }
                },
                'cat_id[]': {
                    required: function() {
                        return getErrorMessage('required', lang);
                    },
                    
                    
                },
            },
            submitHandler: function(form) {
                form.submit(); // Formu gönder
            }
        });
        });

    </script>


    <script>
        $(document).ready(function() {
        $('#no-limit .select2').select2({
            multiple: "multiple",
        });

        $('#limit-2 .select2').select2({
            multiple: "multiple",
            maximumSelectionLength: 2,
        });

        $('#limit-2-custom-message .select2').select2({
            multiple: "multiple",
            maximumSelectionLength: 2,
            language: {
            maximumSelected: (args) => args.maximum + ' 件しか選べないよ！'
            }
        });
        });
    </script>

    <script>
        const viewBtn = document.getElementById('view-id')
        const hideBtn = document.getElementById('hide-id')
        const loginPas = document.getElementById('login-pass')

        hideBtn.addEventListener('click' , () => {
            loginPas.type = 'text'
            hideBtn.style.display = 'none'
            viewBtn.style.display = 'block'
        })

        viewBtn.addEventListener('click' , () => {
            loginPas.type = 'password'
            viewBtn.style.display = 'none'
            hideBtn.style.display = 'block'
        })


        // SIGN SHOW AND HIDE
        const viewBtn2 = document.getElementById('view-id2')
        const hideBtn2 = document.getElementById('hide-id2')
        const loginPas2 = document.getElementById('sign-inpt1')
        const viewBtn3 = document.getElementById('view-id3')
        const hideBtn3 = document.getElementById('hide-id3')
        const loginPas3 = document.getElementById('sign-inpt2')

        hideBtn2.addEventListener('click' , () => {
            loginPas2.type = 'text'
            hideBtn2.style.display = 'none'
            viewBtn2.style.display = 'block'
        })

        viewBtn2.addEventListener('click' , () => {
            loginPas2.type = 'password'
            viewBtn2.style.display = 'none'
            hideBtn2.style.display = 'block'
        })

        hideBtn3.addEventListener('click' , () => {
            loginPas3.type = 'text'
            hideBtn3.style.display = 'none'
            viewBtn3.style.display = 'block'
        })

        viewBtn3.addEventListener('click' , () => {
            loginPas3.type = 'password'
            viewBtn3.style.display = 'none'
            hideBtn3.style.display = 'block'
        })

    </script>
@endsection

@section('css-link')
    <link rel="stylesheet" href="{{asset('front/css/login.css')}}">
@endsection