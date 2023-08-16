<!DOCTYPE html>

@extends('front.layouts.master')

<style>
    .comp-card {
            width: 100%;
            background: linear-gradient(180deg, #966ace 0%, #7235c0 100%);
            border-radius: 10px;
            display: flex;
            margin: 10px;
            gap: 10px;
            
        }

        .company-content {
            width: calc(100% - 100px);
            position: relative;
        }

        .company-pag{
            justify-content: center;
            position: absolute;
            bottom: 0;
        }

        .inner1 {
            padding: 0 5px;
        }

        .inner2 {
            width: 100px!important;
            height: 100px!important;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
        .inner2-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background-color: #fff;
            border-radius: 5px;
        }
        
        .look-comp {
            position: absolute;
            right: 10px;
        }

        .inner3 {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
        }


        .add-company{
            display: flex;
            align-items: center;
            }


    .add-company > button{
        width: 100%;
        height: 58px;
        margin-top: 30px;
        background: #FFFFFF;
        box-shadow: 0px 0px 5px 1px rgba(253, 253, 253, 0.25);
        border-radius: 10px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 17px;
        color: #9559E5;
    }

    .add-company-modal{
        padding: 30px;
        position: relative;
    }

    .add-comp-close{
        position: absolute;
        right: 10px;
        top: 5px;
        padding: 5px 10px;
        background: transparent;
        border-radius: 10px;
        border: 1px solid black;
        font-weight: bold;
    }

    .company-announce-social {
        position: relative;
    }

    .company-announce-social input {
        padding-left: 47px!important;
    }

    .comp-insta-img {
        position: absolute;
        top: 40px;
    left: 8px;
    }

    .inner-right a {
        margin-right: 5px;
    }

    @media screen and (max-width: 992px) {
        .company-pag{
            position: absolute;
            bottom: -45px;
            left: 0;
            right: 0;
        }
    }
</style>

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
        <div class="container company-announce-container" style="margin-bottom: 20px">
            <div class="row m-0"> 

                <div class="col-lg-6 col-md-8">
                    <div class="nav flex-column nav-pills company-announce-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
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
                    <div class="add-company">
                        <button type="button"  data-toggle="modal" data-target=".bd-example-modal-lg">
                            @lang('front.sirketadd')
                            <img src="https://1is-new.netlify.app/images/plus.png" alt="">
                        </button>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content add-company-modal">
                                    <button type="button" class="add-comp-close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <form class="tab-pane add-training-form fade show active col-12" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" action="{{route('addcompany')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group add-training-input-group">
                                            <label for="training_name">@lang('front.ad')<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="training_name" placeholder="@lang('front.ad')"  value="{{ old('name') }}" />
                                            
                                        </div>
                                        <div class="form-group add-training-input-group">
                                            <label for="training_companies">@lang('front.sektor')<span class="text-danger">*</span></label>
                                            <select class="form-control" name="sector" id="training_companies">
                                            <option value="" disabled selected>@lang('front.birsec')</option>
                                            @php
                                                $lang = config('app.locale');
                                            @endphp
                                            @foreach($sectors as $sector)
                                                <option value="{{$sector->id}}"@if(old('sector') == $sector->id) selected @endif>
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
                                        <div class="form-group add-training-input-group ">
                                            <label for="training_name">@lang('front.unvan')<span class="text-danger">*</span></label>
                                            <input type="text" name="address" class="form-control" id="training_name" placeholder="@lang('front.unvan')"  value="{{ old('address') }}"  />
                                            
                                        </div>
                                        <div class="form-group add-training-input-group ">
                                            <label for="website">@lang('front.vebsayt')<span class="text-danger">*</span></label>
                                            <textarea class="form-control editor" name="website" id="website" placeholder="@lang('front.vebsayt')" rows="5" >{{ old('website') }}</textarea>
                                            
                                        </div>
                                        
                                        <div class="form-group add-training-input-group ">
                                            <label for="map">@lang('front.xerite')<span class="text-danger">*</span></label>
                                            <textarea class="form-control editor" name="map" id="map" placeholder="@lang('front.xerite')" rows="5" >{{ old('map') }}</textarea>
                                        </div>
                                        
                                        <div class="form-group add-training-input-group ">
                                            <label for="about">@lang('front.about')<span class="text-danger">*</span></label>
                                            <textarea class="form-control editor" name="about" id="about" placeholder="@lang('front.about')" rows="5" >{{ old('about') }}</textarea>
                                           
                                        </div>
                                        
                                        <div class="form-group add-training-input-group">
                                            <label for="hr">@lang('front.hr')</label>
                                            <textarea class="form-control editor" name="hr" id="hr" placeholder="@lang('front.hr')" rows="5">{{ old('hr') }}</textarea>
                                        </div>
                                        
                                        <div class="form-group add-training-input-group company-announce-social ">
                                            <label for="instagram">@lang('front.instagram')</label>
                                            <input type="text" name="instagram" placeholder="@lang('front.instagram')" class="form-control" id="instagram" value="{{ old('instagram') }}" /> 
                                            <img class="comp-insta-img" src="https://1is-new.netlify.app/images/companies-announces/insta_company_modal.png" alt="insta">
                                            
                                        </div>
                                        <div class="form-group add-training-input-group company-announce-social ">
                                            <label for="linkedin">@lang('front.linkedin')</label>
                                            <input type="text" name="linkedin" placeholder="@lang('front.linkedin')" class="form-control" id="linkedin" value="{{ old('linkedin') }}" /> 
                                            <img class="comp-insta-img" src="https://1is-new.netlify.app/images/companies-announces/linkedin_company_modal.png" alt="linkedin">
                                            
                                        </div>
                                        <div class="form-group add-training-input-group company-announce-social ">
                                            <label for="facebook">@lang('front.facebook')</label>
                                            <input type="text" name="facebook" placeholder="@lang('front.facebook')" class="form-control" id="facebook" value="{{ old('facebook') }}" /> 
                                            <img class="comp-insta-img" src="https://1is-new.netlify.app/images/companies-announces/facebook_company_modal.png" alt="facebook">
                                            
                                        </div>
                                        <div class="form-group add-training-input-group company-announce-social ">
                                            <label for="twitter">@lang('front.tvitter')</label>
                                            <input type="text" name="twitter" placeholder="@lang('front.tvitter')" class="form-control" id="twitter" value="{{ old('twitter') }}" /> 
                                            <img class="comp-insta-img" src="https://1is-new.netlify.app/images/companies-announces/twitter_company_modal.png" alt="twitter">
                                            
                                        </div>

                                        
                                        <div class="form-group add-training-input-group">
                                            <label for="images">@lang('front.sekiladd')<span class="text-danger">*</span></label>
                                            <div class="custom-file training-custom-file edit-training-input-group">
                                                <input type="file" name="image" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="images" name="img" accept="image/png, image/jpeg, image/svg+xml, image/webp" value="{{ old('image') }}">
                                                <img src="https://1is-new.netlify.app/images/pic.png" alt="">

                                                <label class="custom-file-label" for="image">@lang('front.sekilsec')</label>
                                            </div>
                                        </div>
                                        
                                        <img src="" alt="Image Preview" id="image-preview" style="width: 300px; height: auto; display: none;">
                                        
                                        <script>
                                            document.querySelector('#images').addEventListener('change', function() {
                                                const fileInput = this;
                                                const file = fileInput.files[0];
                                                const imagePreview = document.querySelector('#image-preview');
                                        
                                                if (file) {
                                                    const reader = new FileReader();
                                                    reader.onload = function() {
                                                        imagePreview.src = reader.result;
                                                        imagePreview.style.display = 'block';
                                                    }
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    imagePreview.src = '';
                                                    imagePreview.style.display = 'none';
                                                }
                                            });
                                        </script>
                                        
                                        
                                        <div class="add-training-form-button">
                                            <button type="submit">@lang('front.elaveet')</button>
                                        </div>
                                    </form>
                              </div>
                            </div>
                          </div>
                    </div>


            </div>

            <div class="col-lg-4">
                <div class="row tab-pane company-announce-row" id="sirketlerim">
                    @foreach($companies as $key=>$allcomp)
                    <div class="col-lg-12 col-md-6 company-announce-col">
                       
                        <div class="comp-card">
                            <div class="inner2">
                                <img src="{{$allcomp->image}}" class="inner2-img" alt="">
                            </div>
                            <div class="company-content">
                                <div class="inner1">
                                    @if(mb_strlen($allcomp->name) > 13)
                                    {{ mb_substr(($allcomp->name), 0, 13) . ' ...' }}
                                @else
                                    {{ ($allcomp->name) }}
                                @endif
                                    <div class="inner-right">
                                        <a href="{{route('compedit', $allcomp->id)}}">
                                            <img src="https://1is.butagrup.az/back/assets/images/icons/Vector2.png" alt="">
                                        </a>

                                        <p>{{ ($allcomp->vacanc_say) }} </p>
                                        <img src="https://1is-new.netlify.app/images/bag.png" alt="">
                                    </div>
                                </div>
                                <div class="inner3">
                                    <div class="stars">
                                        @php
                                            $stars = round($allcomp->average);
                                        @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $stars)
                                                <img src="https://1is-new.netlify.app/images/star-fil.png" alt="">
                                            @else
                                                <img src="https://1is-new.netlify.app/images/star-emp.png" alt="">
                                            @endif
                                        @endfor
                                    </div>  
            
                                    <div class="look-comp">
                                        <img src="https://1is-new.netlify.app/images/look-comp.png" alt="">
                                        <p>{{$allcomp->view}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                 
                    @endforeach
                </div>
                <ul class="pagination pagination-ul company-pag">
                        <li class="page-item"><a class="page-link" href="" rel="prev">«</a></li>
                        <li class="page-item" class="hidden-xs"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link">2</a></li>
                        <li class="page-item "><a class="page-link" href="">3</a></li>
                        <li class="page-item"><a class="page-link">...</a></li>
                        <li class="page-item hidden-xs"><a class="page-link" href="">8</a></li>
                        <li><a class="page-link" href="" rel="next">»</a></li>
                    </ul>
            </div>
        </div>
    </section>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

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
            
                image: {
                    required: true,
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
                image: {
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
@section('js-link')
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/slick.min.js')}}"></script>
<script src="{{asset('front/js/companies-announces.js')}}"></script>
@endsection

<script src="https://cdn.tiny.cloud/1/fnxhgzthj2q2iqh3di27mlytx4bdj9wbroguqsoawsbwwfyn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


@section('css-link')
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/companies-announces.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/jobsearch.css')}}" />
    <link rel="stylesheet" href="{{asset('front/css/header.css')}}" />
@endsection