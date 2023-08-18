@extends('front.layouts.master')


@section('content')
@foreach ($banner as $ban)

<section class="header-info" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
      url({{asset($ban->image)}})">
       @endforeach

        <div class="instructions-header d-flex flex-column align-items-center">

            <div class="instructions-div1">
                <ul>
                    {{$vacdetail->sectors_title}}

                </ul>
            </div>

            <div class="instructions-div2">
                <h2>{{$vacdetail->position}}</h2>
            </div>
            <div class="d-flex instructions-div3">
                <div style="margin-right:24px;">
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5.5 8.25C5.67708 8.25 5.82563 8.19 5.94563 8.07C6.06521 7.95042 6.125 7.80208 6.125 7.625V6.375H7.375C7.55208 6.375 7.70063 6.315 7.82063 6.195C7.94021 6.07542 8 5.92708 8 5.75C8 5.57292 7.94021 5.42437 7.82063 5.30437C7.70063 5.18479 7.55208 5.125 7.375 5.125H6.125V3.875C6.125 3.69792 6.06521 3.54938 5.94563 3.42938C5.82563 3.30979 5.67708 3.25 5.5 3.25C5.32292 3.25 5.17458 3.30979 5.055 3.42938C4.935 3.54938 4.875 3.69792 4.875 3.875V5.125H3.625C3.44792 5.125 3.29958 5.18479 3.18 5.30437C3.06 5.42437 3 5.57292 3 5.75C3 5.92708 3.06 6.07542 3.18 6.195C3.29958 6.315 3.44792 6.375 3.625 6.375H4.875V7.625C4.875 7.80208 4.935 7.95042 5.055 8.07C5.17458 8.19 5.32292 8.25 5.5 8.25ZM5.5 13.0156C5.41667 13.0156 5.33333 13 5.25 12.9688C5.16667 12.9375 5.09375 12.8958 5.03125 12.8438C3.51042 11.5 2.375 10.2527 1.625 9.10188C0.875 7.95062 0.5 6.875 0.5 5.875C0.5 4.3125 1.00271 3.06771 2.00813 2.14062C3.01313 1.21354 4.17708 0.75 5.5 0.75C6.82292 0.75 7.98688 1.21354 8.99187 2.14062C9.99729 3.06771 10.5 4.3125 10.5 5.875C10.5 6.875 10.125 7.95062 9.375 9.10188C8.625 10.2527 7.48958 11.5 5.96875 12.8438C5.90625 12.8958 5.83333 12.9375 5.75 12.9688C5.66667 13 5.58333 13.0156 5.5 13.0156Z"
                            fill="#C7C7C7" />
                    </svg>

                    <span>{{$vacdetail->city_title}}</span>
                </div>
                <div>
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 8.625H4.375V9.875H2.5V8.625ZM5.625 9.875H7.5V8.625H5.625V9.875ZM2.5 12.375H4.375V11.125H2.5V12.375ZM5.625 12.375H7.5V11.125H5.625V12.375ZM2.5 4.875H4.375V3.625H2.5V4.875ZM5.625 4.875H7.5V3.625H5.625V4.875ZM2.5 7.375H4.375V6.125H2.5V7.375ZM5.625 7.375H7.5V6.125H5.625V7.375ZM15 5.5V15.5H0V2.375C0 1.87772 0.197544 1.40081 0.549175 1.04917C0.900805 0.697544 1.37772 0.5 1.875 0.5L8.125 0.5C8.62228 0.5 9.09919 0.697544 9.45083 1.04917C9.80246 1.40081 10 1.87772 10 2.375V3.625H13.125C13.6223 3.625 14.0992 3.82254 14.4508 4.17417C14.8025 4.52581 15 5.00272 15 5.5ZM8.75 2.375C8.75 2.20924 8.68415 2.05027 8.56694 1.93306C8.44973 1.81585 8.29076 1.75 8.125 1.75H1.875C1.70924 1.75 1.55027 1.81585 1.43306 1.93306C1.31585 2.05027 1.25 2.20924 1.25 2.375V14.25H8.75V2.375ZM13.75 5.5C13.75 5.33424 13.6842 5.17527 13.5669 5.05806C13.4497 4.94085 13.2908 4.875 13.125 4.875H10V14.25H13.75V5.5ZM11.25 9.875H12.5V8.625H11.25V9.875ZM11.25 12.375H12.5V11.125H11.25V12.375ZM11.25 7.375H12.5V6.125H11.25V7.375Z"
                            fill="#C7C7C7" />
                    </svg>

                    <a href="{{route('compdetail', $vacdetail->company_id)}}" style="color: #ffff;"><span>{{html_entity_decode($vacdetail->name)}}
                    </span></a>
                </div>
            </div>
        </div>

    </section>
    <section class="info-boxs">
        <div class="info-boxs-container">
            <div class="box-info1">
                <div class="box-svg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M6 0C5.17157 0 4.5 0.671573 4.5 1.5V3H3C1.34315 3 0 4.34315 0 6V21C0 22.6569 1.34315 24 3 24H21C22.6569 24 24 22.6569 24 21V6C24 4.34315 22.6569 3 21 3H19.5V1.5C19.5 0.671573 18.8284 0 18 0C17.1716 0 16.5 0.671573 16.5 1.5V3H7.5V1.5C7.5 0.671573 6.82843 0 6 0ZM6 7.5C5.17157 7.5 4.5 8.17157 4.5 9C4.5 9.82843 5.17157 10.5 6 10.5H18C18.8284 10.5 19.5 9.82843 19.5 9C19.5 8.17157 18.8284 7.5 18 7.5H6Z"
                            fill="white" />
                    </svg>
                </div>

                <div class="box-info-text1">
                    <p>@lang('front.jobtype')</p>
                    <p>{{$vacdetail->job_type_title}}</p>
                </div>
            </div>
            <div class="box-info2">
                <div class="box-svg">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.5 1.5C0.5 0.671573 1.17157 0 2 0H20C20.8284 0 21.5 0.671573 21.5 1.5C21.5 2.32843 20.8284 3 20 3H2C1.17157 3 0.5 2.32843 0.5 1.5Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.5 9C0.5 8.17157 1.17157 7.5 2 7.5H20C20.8284 7.5 21.5 8.17157 21.5 9C21.5 9.82843 20.8284 10.5 20 10.5H2C1.17157 10.5 0.5 9.82843 0.5 9Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9.5 16.5C9.5 15.6716 10.1716 15 11 15H20C20.8284 15 21.5 15.6716 21.5 16.5C21.5 17.3284 20.8284 18 20 18H11C10.1716 18 9.5 17.3284 9.5 16.5Z"
                            fill="white" />
                    </svg>
                </div>

                <div class="box-info-text2">
                    <p>@lang('front.cat')</p>
                    <p>{{$vacdetail->sectors_title}}</p>
                </div>
            </div>
            <div class="box-info3">
                <div class="box-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path d="M21.25 25H27.5V22.5C27.5 20.4289 25.8211 18.75 23.75 18.75C22.5555 18.75 21.4914 19.3085 20.8047 20.1786M21.25 25H8.75M21.25 25V22.5C21.25 21.6797 21.092 20.8963 20.8047 20.1786M8.75 25H2.5V22.5C2.5 20.4289 4.17893 18.75 6.25 18.75C7.44451 18.75 8.50857 19.3085 9.19531 20.1786M8.75 25V22.5C8.75 21.6797 8.90803 20.8963 9.19531 20.1786M9.19531 20.1786C10.1169 17.8763 12.3685 16.25 15 16.25C17.6315 16.25 19.8831 17.8763 20.8047 20.1786M18.75 8.75C18.75 10.8211 17.0711 12.5 15 12.5C12.9289 12.5 11.25 10.8211 11.25 8.75C11.25 6.67893 12.9289 5 15 5C17.0711 5 18.75 6.67893 18.75 8.75ZM26.25 12.5C26.25 13.8807 25.1307 15 23.75 15C22.3693 15 21.25 13.8807 21.25 12.5C21.25 11.1193 22.3693 10 23.75 10C25.1307 10 26.25 11.1193 26.25 12.5ZM8.75 12.5C8.75 13.8807 7.63071 15 6.25 15C4.86929 15 3.75 13.8807 3.75 12.5C3.75 11.1193 4.86929 10 6.25 10C7.63071 10 8.75 11.1193 8.75 12.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>
                <div class="box-info-text3">
                    <p>@lang('front.yas')</p>
                    <p>{{$vacdetail->min_age}}-{{$vacdetail->max_age}}</p>
                </div>
            </div>
            <div class="box-info4">
                <div class="box-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path d="M24 15.3819C20.4487 16.8195 16.5668 17.6111 12.5 17.6111C8.43322 17.6111 4.55132 16.8195 1 15.3819M17.6111 6.11111V3.55556C17.6111 2.14416 16.4669 1 15.0556 1H9.94444C8.53305 1 7.38889 2.14416 7.38889 3.55556V6.11111M12.5 13.7778H12.5128M3.55555 24H21.4444C22.8558 24 24 22.8558 24 21.4444V8.66667C24 7.25527 22.8558 6.11111 21.4444 6.11111H3.55556C2.14416 6.11111 1 7.25527 1 8.66667V21.4444C1 22.8558 2.14416 24 3.55555 24Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="box-info-text4">
                    <p>@lang('front.exp')</p>
                    <p>{{$vacdetail->experience_title}}</p>
                </div>
            </div>
            <div class="box-info5">
                <div class="box-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="30" viewBox="0 0 34 30" fill="none">
                        <path d="M22.6673 8.75C22.6673 11.5114 20.1303 13.75 17.0007 13.75C13.871 13.75 11.334 11.5114 11.334 8.75C11.334 5.98858 13.871 3.75 17.0007 3.75C20.1303 3.75 22.6673 5.98858 22.6673 8.75Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.0007 17.5C11.5238 17.5 7.08398 21.4175 7.08398 26.25H26.9173C26.9173 21.4175 22.4775 17.5 17.0007 17.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="box-info-text5">
                    <p>@lang('front.elaqesexs')</p>
                    <p>{{$vacdetail->contact_name}}</p>
                </div>
            </div>
            <div class="box-info6">
                <div class="box-svg">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.493 9.90538C15.855 10.3225 16.4866 10.3673 16.9037 10.0053C17.3208 9.64335 17.3656 9.01176 17.0036 8.59462L15.493 9.90538ZM10.507 16.0946C10.1451 15.6775 9.51347 15.6327 9.09633 15.9947C8.67919 16.3567 8.63445 16.9882 8.99641 17.4054L10.507 16.0946ZM14 6.75C14 6.19772 13.5523 5.75 13 5.75C12.4477 5.75 12 6.19772 12 6.75H14ZM12 19.25C12 19.8023 12.4477 20.25 13 20.25C13.5523 20.25 14 19.8023 14 19.25L12 19.25ZM23.25 13C23.25 18.6609 18.6609 23.25 13 23.25V25.25C19.7655 25.25 25.25 19.7655 25.25 13H23.25ZM13 23.25C7.33908 23.25 2.75 18.6609 2.75 13H0.75C0.75 19.7655 6.23451 25.25 13 25.25V23.25ZM2.75 13C2.75 7.33908 7.33908 2.75 13 2.75V0.75C6.23451 0.75 0.75 6.23451 0.75 13H2.75ZM13 2.75C18.6609 2.75 23.25 7.33908 23.25 13H25.25C25.25 6.23451 19.7655 0.75 13 0.75V2.75ZM13 12C12.1344 12 11.3959 11.7643 10.903 11.4357C10.4032 11.1025 10.25 10.752 10.25 10.5H8.25C8.25 11.6287 8.93625 12.5282 9.79365 13.0998C10.658 13.6761 11.7946 14 13 14V12ZM10.25 10.5C10.25 10.248 10.4032 9.8975 10.903 9.56428C11.3959 9.23572 12.1344 9 13 9V7C11.7946 7 10.658 7.32392 9.79365 7.90018C8.93625 8.47178 8.25 9.37126 8.25 10.5H10.25ZM13 9C14.1814 9 15.083 9.43286 15.493 9.90538L17.0036 8.59462C16.1168 7.57264 14.5947 7 13 7V9ZM13 14C13.8656 14 14.6041 14.2357 15.097 14.5643C15.5968 14.8975 15.75 15.248 15.75 15.5H17.75C17.75 14.3713 17.0638 13.4718 16.2064 12.9002C15.342 12.3239 14.2054 12 13 12V14ZM12 6.75V8H14V6.75H12ZM12 18L12 19.25L14 19.25L14 18L12 18ZM13 17C11.8186 17 10.917 16.5671 10.507 16.0946L8.99641 17.4054C9.88319 18.4274 11.4054 19 13 19L13 17ZM15.75 15.5C15.75 15.752 15.5968 16.1025 15.097 16.4357C14.6041 16.7643 13.8657 17 13 17V19C14.2054 19 15.342 18.6761 16.2064 18.0998C17.0638 17.5282 17.75 16.6287 17.75 15.5H15.75ZM12 8L12 18L14 18L14 8L12 8Z"
                            fill="white" />
                    </svg>
                </div>

                <div class="box-info-text6">
                    <p>@lang('front.maas')</p>
                    @if($vacdetail->min_salary===NULL)
                    <p>@lang('front.musahibe')</p>
                    @else
                    <p>{{$vacdetail->min_salary}}-{{$vacdetail->max_salary}}</p>
                    @endif
                </div>
            </div>
            <div class="box-info7">
                <div class="box-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <path d="M25 12.5C25 19.4036 19.4036 25 12.5 25C5.59644 25 0 19.4036 0 12.5C0 5.59644 5.59644 0 12.5 0C19.4036 0 25 5.59644 25 12.5ZM2.55992 12.5C2.55992 17.9898 7.01025 22.4401 12.5 22.4401C17.9898 22.4401 22.4401 17.9898 22.4401 12.5C22.4401 7.01025 17.9898 2.55992 12.5 2.55992C7.01025 2.55992 2.55992 7.01025 2.55992 12.5Z" fill="white"/>
                        <rect x="11" y="5" width="2" height="9" rx="1" fill="white"/>
                        <rect x="17.7148" y="15.2988" width="2" height="6.59867" rx="1" transform="rotate(120 17.7148 15.2988)" fill="white"/>
                    </svg>

                </div>
                <div class="box-info-text7">
                    <p>@lang('front.deadline')</p>
                    <p>{{ \Carbon\Carbon::parse($vacdetail->deadline)->format('d-m-Y')}}</p>
                </div>
            </div>
            <div class="box-info8">
                <div class="box-svg">
                    
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.7495 15C18.7495 17.0711 17.0705 18.75 14.9995 18.75C12.9284 18.75 11.2495 17.0711 11.2495 15C11.2495 12.9289 12.9284 11.25 14.9995 11.25C17.0705 11.25 18.7495 12.9289 18.7495 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.07227 15C4.66511 9.9286 9.40296 6.25 15 6.25C20.5971 6.25 25.3349 9.92864 26.9278 15C25.3349 20.0714 20.5971 23.75 15 23.75C9.40296 23.75 4.66508 20.0714 3.07227 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </div>

                <div class="box-info-text8">
                    <p>@lang('front.baxissay') </p>
                    <p>{{$vacdetail->view}}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="position-instructions">
        <h3>@lang('front.vezifetel')</h3>
        <div class="position-instructions-container">
            <ul>
                {!! html_entity_decode($vacdetail->description) !!}
                
            </ul>
        </div>
        <h3>@lang('front.namteleb')</h3>
        <div class="position-instructions-container">
            <ul>
                
                {!! html_entity_decode($vacdetail->requirement) !!}
               
            </ul>
        </div>
        <div class="vac-apply-button">
        <?php
                $contact_info = $vacdetail->contact_info;
        ?>
        @if (Auth::check())
                @if ($vacdetail->accept_type == 1 || $vacdetail->contact_info == '')

                    <button id="apply_button">@lang('front.muraciet')</button>
                @else
                    @if (strpos($contact_info, '@') !== false)
                        <a class="apply-button" href="mailto:{{ $contact_info }}">@lang('front.muraciet')</a>
                    @else
                        <a class="apply-button" href="{{ $contact_info }}" target="_blank">@lang('front.muraciet')</a>
                        
                    @endif
                @endif
        @else
            <a href="{{ route('login') }}">
                <button id="dsdf">@lang('front.muraciet')</button>
            </a>
            
        @endif
        </div>
        
        <div id="apply_section">
            <div class="apply-buttons-wrapper" style="padding: 6px;">
                
                <nav class="apply-pills-nav">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">@lang('front.asantmur')</button>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">@lang('front.indimur')</button>
                    </div>
                </nav>
                    
            </div>
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active container" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form class="cv-pills-form py-3" method="POST" action="{{route('selectcv')}}">
                        @csrf
                        <input type="hidden" name="vacancy_id" value="{{ $vacdetail->id }}">
    
                        <label for="my-cv">@lang('front.cvler')</label>
                        @if (auth()->check() && count($cvs) > 0)
                            <select id="my-cv" required name="my-cv">
                                <option value="">@lang('front.cvsec')</option>
                                @foreach ($cvs as $cv)
                                    <option value="{{ $cv->id }}">{{ $cv->name }}</option>
                                @endforeach
                            </select>
                        @else
                        <select id="my-cv" required name="my-cv">
                            <option value="">@lang('front.cvyox')</option>
                            
                        </select>
                            @endif
    
                        <button>@lang('front.muraciet')</button>
                    </form>
                    
                </div>
    
                <div class="tab-pane fade container" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form action="{{route('asantmur')}}" class="easy-apply-form row py-3" method="POST" enctype="multipart/form-data" id="register_form">
                        @csrf
                        <input type="hidden" name="vacancy_id" value="{{ $vacdetail->id }}">
    
                        <div class="col-md-6 mt-3 input-group" @error('name') has-error @enderror>
                            <label for="name">@lang('front.ad'):</label>
                            <input type="text" name="name" class="form-control w-100" id="name" placeholder="@lang('front.ad')" />
                        </div>
                        <div class="col-md-6 mt-3 input-group" @error('surname') has-error @enderror>
                            <label for="surname">@lang('front.soyad'):</label>
                            <input type="text" name="surname" class="form-control w-100" id="surname" placeholder="@lang('front.soyad')"  />
                        </div>
                        <div class="col-md-6 mt-3 input-group" @error('mail') has-error @enderror>
                            <label for="email">@lang('front.email'):</label>
                            <input type="email" name="mail" class="form-control w-100" id="email" placeholder="@lang('front.email')"/>
                        </div>
                        <div class="col-md-6 mt-3 input-group" @error('phone') has-error @enderror>
                            <label for="contact">@lang('front.telnom'):</label>
                            <input type="text" name="phone" class="form-control w-100" id="contact" placeholder="@lang('front.telnom')" />
                            
                        </div>
                        <div class="col-md-6 mt-3" @error('cv') has-error @enderror>
                            <label for="cv-add">@lang('front.cvyukle'):</label>
                            <input id="cv-add" name="cv" accept="application/pdf,application/vnd.ms-excel" type="file" />
                            
                        </div>
                        <div class="col-12 mt-3">
                            <button>@lang('front.muraciet')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </section>



@endsection
@section('js-link')
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
                        'AZ': 'Bu sahə üçün maksimum 5gb keçilməlidir!',
                        'EN': 'Maximum 5gb should not be exceeded for this field!',
                        'RU': 'Максимальное количество символов для этого поля - !',
                        'TR': 'Bu alan için maksimum 5gb karakter sınırı aşılmamalıdır!'
                    },

                    number: {
                        'AZ': 'Rəqəm daxil edin!',
                        'EN': 'Enter a number!',
                        'RU': 'Введите число!',
                        'TR': 'Bir sayı girin!'
                    },
                    
                    minlength: {
                        'AZ': 'Bu sahə üçün minimum 9 simvol limiti keçilməlidir!',
                        'EN': 'Minimum 9 characters limit should not be exceeded for this field!',
                        'RU': 'Минимальное количество символов для этого поля - 9!',
                        'TR': 'Bu alanda en az 9 karakter sınırı aşılmamalıdır!'
                    },
                    
                };
    
                return errorMessages[field][lang] || errorMessages[field]['AZ']; // Varsayılan olarak İngilizce mesaj kullan
            }
    
            $("#register_form").validate({
                rules: {
                    mail: {
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

                    phone: {
                        required: true,
                        minlength: 9,
                        number: true
                    },
                    cv: {
                        required: true,
                        maxlength: 5120

                    },
                    


                },
                messages: {
                    mail: {
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

                    phone: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
                        
                        minlength: function() {
                            return getErrorMessage('minlength', lang);
                        },

                        number: function() {
                            return getErrorMessage('number', lang);
                        },
                    },

                    cv: {
                        required: function() {
                            return getErrorMessage('required', lang);
                        },
   
                        maxlength: function() {
                            return getErrorMessage('maxlength', lang);
                        }
                    },
                    
                },
                submitHandler: function(form) {
                    form.submit(); // Formu gönder
                }
            });
        });
    
    </script>
        
    <script>    
        const apply_button = document.querySelector('#apply_button');
        const apply_section = document.querySelector('#apply_section');

        apply_button.addEventListener('click', () => {
            apply_section.style.display = 'block';
            apply_button.style.display = 'none';
        })
    </script>
@endsection
@section('css-link')
    <link rel="stylesheet" href="{{asset('front/css/instruction.css')}}">

    <style>
        /* APPLY */

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link {
            color: #221238!important;
            background-color: #fff!important;
            border-color: #221238!important;
            outline: #221238!important;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #fff!important;
            background-color: #221238!important;
            /* border-color: blue!important;
            outline: blue!important; */
        }

        .cv-pills-form {
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 7px;
        }

        .cv-pills-form button,
        .easy-apply-form button {
            width: 200px;
            height: 40px;
            border-radius: 5px;
            background-color: #fff;
            color: #221238;
            border: 1px solid #221238;
            outline: #221238;
        }

        .cv-pills-form select {
            width: 50%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #221238;
            outline: #221238;
        }

        .cv-pills-form button:hover,
        .easy-apply-form button:hover {
            background-color: #221238;
            color: #fff;
        }

        .easy-apply-form div {
            display: flex;
            flex-direction: column;
        }

        .form-control:focus {
            border-color: #22123850!important;
            box-shadow: 0 0 0 .2rem rgba(34,18,56,.25)!important;
        }

        .apply-buttons-wrapper {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .apply-pills-nav {
            margin: 0!important;
            width: auto!important;
            max-width: auto!important;
        }

        .apply-button {
            margin: 0!important;
        }

        .nav-link {
            padding: .44rem 1rem!important;
            font-family: montserrat!important;
            font-style: normal!important;
            font-weight: 400!important;
        }

        .nav-tabs .nav-link {
            border-top-left-radius: 0!important;
            border-top-right-radius: 0!important;
        }
    </style>
@endsection