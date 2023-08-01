@extends('front.layouts.master')
 
<style>
    .swiper-wrapper {
        align-items: center;
    }

    .swiper-slide {
        height: max-content!important;
    }

    .swiper-slide-link {
        position: absolute;
        bottom: 30%;
        left: 5%;
        font-family: 'Montserrat';
        font-style: normal;
        font-weight: 500;
        font-size: 16px;
        display: flex;
        align-items: center;
        text-align: center;
        color: #FFFFFF;
    }

    .swiper-sec {
        height: 250px!important;
    }

    /* STORY SLİDER */


    :root {
    --background-color: #fff;
    --slide-width: 344px;
    --slide-shadow: 0 4px 20px 2px rgba(0, 0, 0, 0.4);
    --slide-thumb-height: 3px;
    --slide-thumb-default-color: rgba(0, 0, 0, 0.4);
    --slide-thumb-active-color: rgba(255, 255, 255, 0.9);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: var(--background-color);
}

.slide-items img {
    display: block;
    width: 100%;
    margin: 0 auto;
    height: 100%;
    object-fit: cover;
}

.sliders section {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    box-shadow: var(--slide-width);
    margin: 0px auto;
    display: none;
    background: linear-gradient(180deg, rgba(0,0,0,0.8), rgba(0,0,0,0.8));
    z-index: 10000;
}

.slide-items {
    border-radius: 5px;
    grid-area: 1/1;
    overflow: hidden;
    position: relative;
    width: 80%;
    margin: 0 auto;
    z-index: 10;
}

.slide-items>* {
    opacity: 0;
    pointer-events: none;
    position: absolute;
    top: 0;
    padding: 20px 0;
}

.slide-items .active {
    opacity: 1;
    pointer-events: initial;
    position: relative;
}

.slide-nav {
    display: grid;
    grid-area: 1/1;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto 1fr;
    z-index: 20;
    max-width: 80%!important;
    width: 80%;
    margin: 0 auto;
    padding: 20px 0;
}

.slide-nav > div {
    display: flex;
    grid-column: 1 / 3;
    width: 100%;
    margin: 0 auto;
}

.slide-thumb-item {
    background-color: var(--slide-thumb-default-color);
    border-radius: 3px;
    display: block;
    flex: 1;
    height: var(--slide-thumb-height);
    margin: 5px;
    overflow: hidden;
}

.slide-thumb-item.active::after {
    animation: thumb 5s forwards linear;
    background-color: var(--slide-thumb-active-color);
    border-radius: 3px;
    content: '';
    display: block;
    height: inherit;
    transform: translateX(-100%);
}

.slide-next,
.slide-prev {
    opacity: 0;
    -webkit-appearance: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    width: 100%;
    height: 100%!important;
}

.slide-prev {
    margin-left: auto;
}


.slide-next {
    margin-right: auto;
}

.close-button-img {
    width: 24px;
    height: 24px;
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
}

@keyframes thumb {
    to {
        transform: initial;
    }
}


    /* STORY SLİDER */

    @media screen and (max-width: 1000px) {
        .swiper-slide-link {
            left: 7%;
            bottom: 25%;
        }
    }

    @media screen and (max-width: 768px) {
        .swiper-slide-link {
            left: 13%;
            bottom: 13%;
        }

        .slide-items img {
            object-fit: contain;
        }

        .close-button-img {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 7px;
            right: 7px;
            cursor: pointer;
            z-index: 11;
        }

        .slide-items>* {
            padding: 0;
        }

        .slide-nav {
            padding: 10px 0;
        }

        .slide-items {
            border-radius: 0;
        }

        .slide-items,
        .slide-nav  {
            width: 100%;
        }
    }

    @media screen and (max-width: 500px) {
        .swiper-slide-link {
            left: 13%;
            bottom: 28%;
        }
    }
</style>

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
/>



 <!-- MAIN PART -->
 @foreach ($banner as $ban)
     
 <section class="main" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
      url({{asset($ban->image)}})">
 @endforeach

<form class="main-filter home-filter" method="GET" action="{{route('vsearch')}}">
    <div class="active-filter active-filter-jobsearchinner">
        <div class="filter1 home-filter1">
            <img src="https://1is-new.netlify.app/images/search.png" alt="">
            <input class="filter-input" placeholder="@lang('front.açar')" type="search" name="query" value="{{ old('query') }}">
        </div>
        <div class="filter2">
            <button class="filter-searc">@lang('front.axtar')</button>
            <div id="detail-btn" class="detail-search"><img src="https://1is-new.netlify.app/images/more.png" alt="">@lang('front.etrafliaxtar')</div>
        </div>
    </div>
    <div class="disabled-filter disabled-filter-jobsearchinner" id="getshow">
        <div class="row text-left pos-25 mt-header mt-2" >
            <div class="col-md-4 col-xs-3 button_mt button_mt_jobsearchinner">
                <div class="form-group mb-0">
                    <select class="form-control custom-select" name="city">
                      <option value="">@lang('front.city')</option>
                      @php
                            $lang = config('app.locale');
                        @endphp
                      @foreach($cities as $city)
                      <option value="{{$city->id}}" {{ $city->id == $request->input('city') ? 'selected' : '' }}>
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
            </div>
            <div class="col-md-4 col-xs-3 button_mt">
                <div class="form-group mb-0">
                    <select class="form-control custom-select" name="category">
                      <option value="">@lang('front.cats')</option>
                      @foreach($allcategories as $category)
                        <option value="{{$category->id}}" {{ $category->id == $request->input('category') ? 'selected' : '' }}>
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
            </div>
            <div class="col-md-4 col-xs-3 button_mt">
                <div class="form-group mb-0">
                    <select class="form-control custom-select" name="find_worker" id="find_worker">
                      <option value="">@lang('front.jobtype')</option>
                      @foreach($job_types as $job_type)
                      <option value="{{$job_type->id}}" {{ $job_type->id == $request->input('find_worker') ? 'selected' : '' }}>
                          @if ($lang == 'EN')
                              {{$job_type->title_en}}
                          @elseif ($lang == 'RU')
                              {{$job_type->title_ru}}
                          @elseif ($lang == 'TR')
                              {{$job_type->title_tr}}
                          @else
                              {{$job_type->title_az}}
                          @endif
                      </option>
                  @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-xs-3 button_mt">
                <div class="form-group mb-0">
                    <select class="form-control custom-select" name="education">
                      <option value="">@lang('front.educ')</option>
                      @foreach($educations as $education)
                        <option value="{{$education->id}}" {{ $education->id == $request->input('education') ? 'selected' : '' }}>
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
            </div>
            <div class="col-md-4 col-xs-3 button_mt">
                <div class="form-group mb-0">
                    <select class="form-control custom-select" name="experience">
                      <option value="">@lang('front.exp')</option>
                      @foreach($experiences as $experience)
                      <option value="{{$experience->id}}" {{ $experience->id == $request->input('experience') ? 'selected' : '' }}>
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
            </div>
            <div class="col-md-4 col-xs-3 button_mt">
                <div class="form-group mb-0">
                    <select class="form-control custom-select" name="company">
                        <option value="">@lang('front.companies')</option>
                    @foreach($allcompanies as $comp)
                    <option value="{{$comp->id}}" {{ $comp->id == $request->input('company') ? 'selected' : '' }}>{{$comp->name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>
</section>

<section class="blocks">
<div class="info-block-main">
    <div class="info-blocks">
        <!-- <div class="block1"> -->
        <a href="{{ route('allvacancies') }}" style="color: #fff" class="block1">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M37.5 42H10.5C10.1022 42 9.72064 41.842 9.43934 41.5607C9.15804 41.2794 9 40.8978 9 40.5V7.5C9 7.10218 9.15804 6.72064 9.43934 6.43934C9.72064 6.15804 10.1022 6 10.5 6H28.5L39 16.5V40.5C39 40.8978 38.842 41.2794 38.5607 41.5607C38.2794 41.842 37.8978 42 37.5 42Z" stroke="#F8F0FB" stroke-width="3.55556" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M28.5 6V16.5H39" stroke="#F8F0FB" stroke-width="3.55556" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

            <p>
                    {{ count($allvacancies) }}<br> @lang('front.vacancies')  
            </p>
        </a>
        <!-- </div> -->
        <!-- <div class="block1"> -->
        <a href="{{ route('jobsearch') }}" style="color: #fff" class="block1">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 13.5C11.6863 13.5 9 16.1863 9 19.5C9 22.8137 11.6863 25.5 15 25.5C18.3137 25.5 21 22.8137 21 19.5C21 16.1863 18.3137 13.5 15 13.5ZM6 19.5C6 14.5294 10.0294 10.5 15 10.5C19.9706 10.5 24 14.5294 24 19.5C24 24.4706 19.9706 28.5 15 28.5C10.0294 28.5 6 24.4706 6 19.5Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M27 15C27 14.1716 27.6716 13.5 28.5 13.5H46.5C47.3284 13.5 48 14.1716 48 15C48 15.8284 47.3284 16.5 46.5 16.5H28.5C27.6716 16.5 27 15.8284 27 15Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M27 24C27 23.1716 27.6716 22.5 28.5 22.5H46.5C47.3284 22.5 48 23.1716 48 24C48 24.8284 47.3284 25.5 46.5 25.5H28.5C27.6716 25.5 27 24.8284 27 24Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M31.5 33C31.5 32.1716 32.1716 31.5 33 31.5H46.5C47.3284 31.5 48 32.1716 48 33C48 33.8284 47.3284 34.5 46.5 34.5H33C32.1716 34.5 31.5 33.8284 31.5 33Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0004 28.4766C12.6689 28.4766 10.4038 29.2525 8.56205 30.6821C6.72033 32.1117 5.40678 34.1136 4.82849 36.3722C4.623 37.1747 3.80584 37.6587 3.0033 37.4532C2.20076 37.2477 1.71675 36.4306 1.92224 35.628C2.66575 32.7241 4.3546 30.1503 6.72253 28.3122C9.09047 26.4742 12.0028 25.4766 15.0004 25.4766C17.9979 25.4766 20.9103 26.4742 23.2782 28.3122C25.6461 30.1503 27.335 32.7241 28.0785 35.628C28.284 36.4306 27.8 37.2477 26.9974 37.4532C26.1949 37.6587 25.3777 37.1747 25.1722 36.3722C24.5939 34.1136 23.2804 32.1117 21.4387 30.6821C19.5969 29.2525 17.3318 28.4766 15.0004 28.4766Z" fill="#F8F0FB"/>
        </svg>

            <p>
                    {{count($cvs)}} <br> @lang('front.jobsearch')
                </p>  
        </a>
        <!-- </div> -->
        <!-- <div class="block1"> -->
        <a href="{{ route('allcompany') }}" style="color: #fff" class="block1">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 40.5C1.5 39.6716 2.17157 39 3 39H45C45.8284 39 46.5 39.6716 46.5 40.5C46.5 41.3284 45.8284 42 45 42H3C2.17157 42 1.5 41.3284 1.5 40.5Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.37868 5.37868C5.94129 4.81607 6.70435 4.5 7.5 4.5H25.5C26.2956 4.5 27.0587 4.81607 27.6213 5.37868C28.1839 5.94129 28.5 6.70435 28.5 7.5V40.5C28.5 41.3284 27.8284 42 27 42C26.1716 42 25.5 41.3284 25.5 40.5L25.5 7.5H7.5L7.5 40.5C7.5 41.3284 6.82843 42 6 42C5.17157 42 4.5 41.3284 4.5 40.5V7.5C4.5 6.70435 4.81607 5.94129 5.37868 5.37868Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M25.5 18C25.5 17.1716 26.1716 16.5 27 16.5H40.5C41.2956 16.5 42.0587 16.8161 42.6213 17.3787C43.1839 17.9413 43.5 18.7044 43.5 19.5V40.5C43.5 41.3284 42.8284 42 42 42C41.1716 42 40.5 41.3284 40.5 40.5L40.5 19.5L27 19.5C26.1716 19.5 25.5 18.8284 25.5 18Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 13.5C10.5 12.6716 11.1716 12 12 12H18C18.8284 12 19.5 12.6716 19.5 13.5C19.5 14.3284 18.8284 15 18 15H12C11.1716 15 10.5 14.3284 10.5 13.5Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 25.5C13.5 24.6716 14.1716 24 15 24H21C21.8284 24 22.5 24.6716 22.5 25.5C22.5 26.3284 21.8284 27 21 27H15C14.1716 27 13.5 26.3284 13.5 25.5Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 33C10.5 32.1716 11.1716 31.5 12 31.5H18C18.8284 31.5 19.5 32.1716 19.5 33C19.5 33.8284 18.8284 34.5 18 34.5H12C11.1716 34.5 10.5 33.8284 10.5 33Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M31.5 33C31.5 32.1716 32.1716 31.5 33 31.5H36C36.8284 31.5 37.5 32.1716 37.5 33C37.5 33.8284 36.8284 34.5 36 34.5H33C32.1716 34.5 31.5 33.8284 31.5 33Z" fill="#F8F0FB"/>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M31.5 25.5C31.5 24.6716 32.1716 24 33 24H36C36.8284 24 37.5 24.6716 37.5 25.5C37.5 26.3284 36.8284 27 36 27H33C32.1716 27 31.5 26.3284 31.5 25.5Z" fill="#F8F0FB"/>
        </svg>

            <p>
                    {{ count($allcompanies) }}<br> @lang('front.companies')
                </p>  
        </a>
        <!-- </div> -->
        <a class="block1" href="#popular_category">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 12C15 11.1716 15.6716 10.5 16.5 10.5H40.5C41.3284 10.5 42 11.1716 42 12C42 12.8284 41.3284 13.5 40.5 13.5H16.5C15.6716 13.5 15 12.8284 15 12Z" fill="#F8F0FB"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 24C15 23.1716 15.6716 22.5 16.5 22.5H40.5C41.3284 22.5 42 23.1716 42 24C42 24.8284 41.3284 25.5 40.5 25.5H16.5C15.6716 25.5 15 24.8284 15 24Z" fill="#F8F0FB"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 36C15 35.1716 15.6716 34.5 16.5 34.5H40.5C41.3284 34.5 42 35.1716 42 36C42 36.8284 41.3284 37.5 40.5 37.5H16.5C15.6716 37.5 15 36.8284 15 36Z" fill="#F8F0FB"/>
                <path d="M8.25 14.25C9.49264 14.25 10.5 13.2426 10.5 12C10.5 10.7574 9.49264 9.75 8.25 9.75C7.00736 9.75 6 10.7574 6 12C6 13.2426 7.00736 14.25 8.25 14.25Z" fill="#F8F0FB"/>
                <path d="M8.25 26.25C9.49264 26.25 10.5 25.2426 10.5 24C10.5 22.7574 9.49264 21.75 8.25 21.75C7.00736 21.75 6 22.7574 6 24C6 25.2426 7.00736 26.25 8.25 26.25Z" fill="#F8F0FB"/>
                <path d="M8.25 38.25C9.49264 38.25 10.5 37.2426 10.5 36C10.5 34.7574 9.49264 33.75 8.25 33.75C7.00736 33.75 6 34.7574 6 36C6 37.2426 7.00736 38.25 8.25 38.25Z" fill="#F8F0FB"/>
            </svg>

            <p>
                {{count($allcategories)}} <br> @lang('front.cats')
            </p>
        </a>
    </div>
</div>
</section>

<div class="container custom-container">


    @if (isset($stories))
    <section class="swiper-sec">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            @foreach ($stories as $st)
                
            <a href="#" id="slide{{$st->id}}" class="swiper-slide story_button">
                <img src="{{$st->image}}" alt="">
            </a>
            @endforeach

            </div>  
            
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="sliders">
            @foreach ($stories as $st)
                @php
                    $imagePaths = json_decode($st->stories); 
                    
                @endphp

                <section data-slide="slide{{$st->id}}" class="slide{{$st->id}}" id="story_slide">
                    <div class="slide-items">
                        @foreach ($imagePaths as $imagePath)
                            <img src="{{ asset($imagePath) }}" alt=""> {{-- Görsel yollarını asset() fonksiyonuyla doğru şekilde çözümlüyoruz --}}
                        @endforeach
                    </div>
                    <nav class="slide-nav">
                        <div class="slide{{$st->id}}"></div>
                        <button class="slide-prev">Previous</button>
                        <button class="slide-next">Next</button>
                    </nav>
                    <img class="close-button-img" src="{{ asset('back/assets/images/close-button.png') }}" alt="close-button" />
                </section>
            @endforeach
        </div>

    </section> 
    @else

    @endif




<!-- POPULAR CATEGORIES -->
<section class="popular-sec">
    <h1 class="popular-h1" id="popular_category">@lang('front.popcats')</h1>
    <!-- HTML -->
    <div class="popular-div" id="category-container">
        @foreach ($categories as $category)
            <a href="{{ route('vsearch', ['query' => '', 'category' => $category->id, 'city' => '', 'find_worker' => '', 'education' => '', 'experience' => '', 'work_type' => '']) }}" class="pop-card1">
                <i class="{{$category->icon}}"></i>
                <div class="text-field">
                    <div class="text-field">
                        <p>
                            <!-- <a href="{{ route('vsearch', ['query' => '', 'category' => $category->id, 'city' => '', 'find_worker' => '', 'education' => '', 'experience' => '', 'work_type' => '']) }}"> -->
                            @switch(app()->getLocale())
                            @case('EN')
                                {{ $category->title_en }}
                                @break
                            @case('TR')
                                {{ $category->title_tr }}
                            @break
                            @case('RU')
                                {{ $category->title_ru }}
                                @break
                            @default
                                {{ $category->title_az }}
                        @endswitch
                    <!-- </a> -->
                </p>
                    </div>
                    <p>@lang('front.vaccount'): {{ $category->total_vacancies }}</p>
                </div>
                <div class="border-div"></div>
            </a>
        @endforeach
    </div>
    <div id="load-more-container">
        <button id="load-more-btn" class="pop-button" data-page="1">@lang('front.dahacox') <img class="btm-arrow" src="https://1is.butagrup.az/back/assets/images/icons/images-bottom-arrow.svg" alt=""></button>
        <button id="load-less-btn" class="pop-button" data-page="2" style="display: none">@lang('front.dahaaz') <img class="btm-arrow" src="https://1is.butagrup.az/back/assets/images/icons/images-top-arrow.svg"  alt=""></button>

    </div>
    
    <script>
        var loadMoreButton = document.getElementById('load-more-btn');
        var loadLessButton = document.getElementById('load-less-btn');

        var categoryContainer = document.getElementById('category-container');
        var page = 0;
        var limit = 9;

        loadMoreButton.addEventListener('click', function() {
            page++;
            var url = 'load-more?page=' + page;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var categories = data.data;
                    totalCount = data.totalCount;

                    categories.forEach(function(category) {
                        var div = document.createElement('div');
                        div.className = 'pop-card1';
                        div.innerHTML = `
                            <i class="${category.icon}"></i>
                            <div class="text-field">
                                <p><a href="/vsearch?query=&category=${category.id}&city=&find_worker=&education=&experience=&work_type=" style="color: black">
                                    ${ '{{ app()->getLocale() }}' === 'EN' ? category.title_en : '{{ app()->getLocale() }}' === 'TR' ? category.title_tr : ('{{ app()->getLocale() }}' === 'RU' ? category.title_ru : category.title_az) }
                                </a></p>
                                <p>@lang('front.vaccount'): ${category.total_vacancies}</p>
                            </div>
                            <div class="border-div"></div>
                        `;

                        categoryContainer.appendChild(div);
                    });

                    if (page == 2) {
                        loadMoreButton.style.display = 'none';
                        loadLessButton.style.display = 'block';
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        });


    </script>
    
    <script>
        var loadLessButton = document.getElementById('load-less-btn');
        var categoryContainer = document.getElementById('category-container');
        var page = 1;
        var limit = 12;
        
        loadLessButton.addEventListener('click', function() {
            page = 1;
            var url = 'load-more?page=' + page;
    
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var categories = data.data;
                    totalCount = data.totalCount; 
    
                    categoryContainer.innerHTML = '';
    
                    var remainingCategories = categories.slice(0, limit);
                    remainingCategories.forEach(function(category) {
                        var div = document.createElement('div');
                        div.className = 'pop-card1';
                        div.innerHTML = `
                        <i class="${category.icon}"></i>
                            <div class="text-field">
                                <p><a href="/vsearch?query=&category=${category.id}&city=&find_worker=&education=&experience=&work_type=" style="color: black">
                                    ${ '{{ app()->getLocale() }}' === 'EN' ? category.title_en : '{{ app()->getLocale() }}' === 'TR' ? category.title_tr : ('{{ app()->getLocale() }}' === 'RU' ? category.title_ru : category.title_az) }</a></p>
                                <p>@lang('front.vaccount'): ${category.total_vacancies}</p>
                            </div>
                            <div class="border-div"></div>
                        `;
    
                        categoryContainer.appendChild(div);
                    });
    
                    if (page <= 1) {
                        loadLessButton.style.display = 'none';
                        loadMoreButton.style.display = 'block';

                    }
                })
                .catch(error => {
                    console.log(error);
                });
        });
    </script>
    
    
</section>


<!-- COMPANY SECTION -->
<section class="company">
    <h1 class="popular-h1">@lang('front.companies')</h1>
    
    <div class="company-div">
        @foreach($companies as $key=>$company)
        
        <a href="{{route('compdetail', $company->id)}}">
            <div class="comp-card">
                <div class="inner2">
                    <img src="{{$company->image}}" class="img-fluid" alt="">
                </div>
                <div class="company-content">
                    <div class="inner1">
                        <p>{!! htmlspecialchars_decode($company->name) !!}</p>
                    </div>
                    <div class="inner3">
                        <div class="stars">
                            @php
                                $stars = round($company->average);
                            @endphp
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $stars)
                                    <img src="https://1is-new.netlify.app/images/star-fil.png" alt="">
                                @else
                                    <img src="https://1is-new.netlify.app/images/star-emp.png" alt="">
                                @endif
                            @endfor
                        </div>
                        <p></p>
                        <p></p>
                        <p></p>

                        <div class="look-comp">
                            <img src="https://1is-new.netlify.app/images/look-comp.png" alt="">
                            <p>{{$company->view}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>    
        @endforeach

        

    </div>

    <button class="pop-button"><a href="{{route('allcompany')}}"  style="color: #ffff;">@lang('front.dahacox') <img class="btm-arrow" src="https://1is.butagrup.az/back/assets/images/icons/images-bottom-arrow.svg" alt=""></a></button>
</section>

<!-- NEW VACANSIES SECTION -->
<section class="new-vac">
    <h1 class="popular-h1">@lang('front.yenivak')</h1>
    <div class="new-vac-div">
        @foreach($vacancies as $key=>$vacancy)
            
        <div class="vac-card">
            <div class="vac-inner1">
                <a href="{{route('vacancydetail', $vacancy->id)}}" class="vac-inner1-a">{{$vacancy->title_az}}</a>
                <div class="second-part">
                    <span style="margin-right: 15px;" class="look-numb"> {{$vacancy->view}} <img src="https://1is-new.netlify.app/images/eye.png"></span>

                    <img src="{{ asset('back/assets/images/icons/heart.png') }}" alt="heart" class="heart-icon" data-vacancy-id="{{ $vacancy->id }}" style="{{ in_array($vacancy->id, $likes) ? 'display: none;' : 'display: inline-block;' }}">
                    <img src="{{ asset('back/assets/images/icons/red-heart.png') }}" alt="red-heart" class="red-heart-icon" data-vacancy-id="{{ $vacancy->id }}" style="{{ in_array($vacancy->id, $likes) ? 'display: inline-block;' : 'display: none;' }}">
        
                </div>
            </div>
            <div class="vac-inner2">
                <a href="{{route('vacancydetail', $vacancy->id)}}" class="vac-name">{{$vacancy->position}}</a>
            </div>
            <div class="vac-inner3">
                <div class="vac-inn1">
                    <img src="https://1is-new.netlify.app/images/building.png" alt="">
                    <a class="comp-link" href="{{route('compdetail', $vacancy->company_id)}}">{{$vacancy->name}}</a>
                </div>
                <div class="vac-inn2">
                    <img src="https://1is-new.netlify.app/images/clock.png" alt="">
                    <p class="vac-time">{{ date('d-m-Y', strtotime($vacancy->deadline)) }}</p>
                </div>
            </div>
            @if ($vacancy->created_at->diffInDays(Carbon\Carbon::now()) <= 3)
            <div class="new-vac-badge">
                <p>@lang('front.yeni')</p>           

            </div>              
            @endif    
              
        </div>
       
        
        @endforeach
        
    </div>
    <button class="pop-button2 load_more_button" id ="$last_id"><a href="{{route('allvacancies')}}"  style="color: #ffff;">@lang('front.allvac') <img class="btm-arrow" src="https://1is.butagrup.az/back/assets/images/icons/images-bottom-arrow.svg" alt=""></a></button>
</section>



</div>

            @foreach ($reklam as $rek)
                
            <div class="main-reklam">
                <a href="#" class="w-100">
                    <img src="{{$rek->image}}" style="width: ">
                </a>
            </div>
            @endforeach

@endsection

@section('js')

<script>
        class SlideStories {
        /** @param {string} id */
        
            constructor(id) {
                this.slide = document.querySelector(`[data-slide=${id}]`)
                this.active = 0
                this.init(id)
            }

            /** @param {Number} index */
            activeSlide(index) {
                this.active = index
                this.items.forEach((item) => item.classList.remove('active'))
                this.items[index].classList.add('active')
                this.thumbItems.forEach((item) => item.classList.remove('active'))
                this.thumbItems[index].classList.add('active')
                this.autoSlide()
            }

            next() {
                if (this.active < this.items.length - 1) {
                    this.activeSlide(this.active + 1)
                } else {
                    this.activeSlide(0)
                }
            }

            prev() {
                if (this.active > 0) {
                    this.activeSlide(this.active - 1)
                } else {
                    this.activeSlide(this.items.length - 1)
                }
            }

            addNavigation() {
                const nextBtn = this.slide.querySelector('.slide-next')
                const prevBtn = this.slide.querySelector('.slide-prev')
                nextBtn.addEventListener('click', this.next)
                prevBtn.addEventListener('click', this.prev)
            }

            addThumbItems() {
                this.thumb.innerHTML = "";
                this.items.forEach(() => (this.thumb.innerHTML += `<span class="slide-thumb-item"></span>`))
                this.thumbItems = Array.from(this.thumb.children)
            }

            autoSlide() {
                if(this.thumb.children.length > 0){
                    clearTimeout(this.timeout)
                    this.timeout = setTimeout(this.next, 5000)
                    console.log('Ilkin')
                }
            }

            init(id) {
                this.next = this.next.bind(this)
                this.prev = this.prev.bind(this)
                this.items = this.slide.querySelectorAll('.slide-items > *')
                this.thumb = this.slide.querySelector(`.${id}`)
                
                this.addThumbItems()
                this.activeSlide(0)
                this.addNavigation()
            }
        }


        const story_slide = document.getElementById('story_slide');
        const story_slide2 = document.getElementById('story_slide2');
        const allSlide = document.querySelector('allSlide');

        let elementsArray = document.querySelectorAll(".swiper-wrapper a");

        elementsArray.forEach((item) => {
            
            item.addEventListener("click", () => {
                let slide = document.querySelector(`.${item.id}`);
                slide.style.display = 'grid';
                new SlideStories(item.id);
                const close_button_img = document.querySelector(`.${item.id} > img`);
                let slide_thumbs = document.querySelector(`.${item.id} .slide-nav > div`); 
                close_button_img.addEventListener('click', () => {
                    slide.style.display = 'none';
                    slide_thumbs.innerHTML = "";
                })
            });
        });
    </script>

<script>
    const moreSearch = document.getElementById('detail-btn')
    const moreSearchSect = document.getElementById('getshow')
    moreSearch.addEventListener('click' , () => {
        moreSearchSect.classList.toggle('filter-active');
    })

</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var heartIcons = document.querySelectorAll('.heart-icon');

        heartIcons.forEach(function (icon) {
            icon.addEventListener('click', function () {
                var vacancyId = this.getAttribute('data-vacancy-id');
                var redHeartIcon = document.querySelector('.red-heart-icon[data-vacancy-id="' + vacancyId + '"]');
                var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

                if (isLoggedIn) {
                    this.style.display = 'none';
                    redHeartIcon.style.display = 'inline-block';
                } else {
                    window.location.href = '{{ route('login') }}';
                }

                // AJAX isteği
                var xhr = new XMLHttpRequest();
                var url = '{{ route('indexlike') }}'; // Favori ekleme için uygun URL'yi buraya yazın
                var params = 'vacancy_id=' + vacancyId + '&_token=' + '{{ csrf_token() }}';

                xhr.open('POST', url, true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            if (!isLoggedIn) {
                                redHeartIcon.style.display = 'inline-block';
                            }
                        } else if (xhr.status === 403) {
                            var response = JSON.parse(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: `${response.error}`,
                                footer: `<a href="{{ route('login') }}">@lang('front.daxilol')</a>`,
                            });
                        }
                    }
                };

                xhr.send(params);
            });
        });
    });
</script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
    var heartIcons = document.querySelectorAll('.red-heart-icon');

    heartIcons.forEach(function (icon) {
    icon.addEventListener('click', function () {
        var vacancyId = this.getAttribute('data-vacancy-id');
        var redHeartIcon = document.querySelector('.heart-icon[data-vacancy-id="' + vacancyId + '"]');
        var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

        if (isLoggedIn) {
            this.style.display = 'none';
            redHeartIcon.style.display = 'inline-block';
        }

        // AJAX isteği
        var xhr = new XMLHttpRequest();
        var url = '{{ route('idislike') }}'; // Dislike işlemi için uygun URL'yi buraya yazın
        var params = 'vacancy_id=' + vacancyId + '&_token=' + '{{ csrf_token() }}';

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    if (!isLoggedIn) {
                        redHeartIcon.style.display = 'inline-block';
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

<script>
    Fancybox.bind("[data-fancybox]", {
  // Your custom options
});
</script>


@endsection



@section('css')
<style>
        .comp-card {
            width: 300px;
            height: 100px;
            position: relative;
            display: flex;
            flex-direction: row;
            gap: 6px;
            padding: 5px!important;
        }

        .company-content {
            width: 190px;
        }

        .inner1 {
            height: 20%;
        }

        .inner1 p {
            font-size: 13px!important;
            line-height: 16px!important;
        }

        .inner2 {
            width: 90px;
            height: 90px;
            border-radius: 5px;
        }

        .inner3 {
            position: absolute;
            bottom: 0;
            height: 20%;
        }

        .inner2 img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #fff;
            border-radius: 5px;
        }


        /* @media screen and (max-width: 507.5px) {
            .comp-card {
                width: 65vw;
            }
        } */
    </style>
@endsection