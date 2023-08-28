@extends('front.layouts.master')


@section('content')
@foreach ($banner as $ban)

<section class="vacancy-section header-info" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
      url({{asset($ban->image)}})">
       @endforeach
    <div>
        <h3>{{$tdetail->title}}</h3>
    </div>
</section>

    <div class="training-container container">
        <div class="row training-detail">
            <div class="col-lg-5 col-md-6">
                <div class="left-card">
                    <div class="left-part-1">
                        <p>@lang('front.telimhaq')</p>
                    </div>
                    <div class="left-part-2">
                        <div>
                            <img src="https://1is-new.netlify.app/images/dollar.png" alt="">
                            <div>
                                <p>@lang('front.odenis'):</p>
                                @if ($tdetail->payment_type)
                                    <span>{{$tdetail->price}} AZN</span>
                                @else
                                    <span>@lang('front.pulsuz')</span>
                                @endif


                            </div>
                        </div>
                        <div>
                            <img src="https://1is-new.netlify.app/images/black-eye.png" alt="">
                            <div>
                                <p>@lang('front.baxissay'):</p>
                                    {{ $tdetail->view ?? "0" }}
                            </div>
                        </div>
                        <div>
                            <img src="https://1is-new.netlify.app/images/black-date.png" alt="">
                            <div>
                                <p>@lang('front.tarix'):</p>
                                
                                <span>{{($tdetail->created_at) ->format('d.m.Y')}}</span>
                            </div>
                        </div>
                        <div>
                            <img src="https://1is-new.netlify.app/images/black-date.png" alt="">
                            <div>
                                <p>@lang('front.deadline') :</p>
                                    @if($tdetail->deadline > now())
                                        <span class="last-span">{{$tdetail->deadline}}</span>
                                    @else
                                        <span class="last-span">@lang('front.murbitib')</span>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="right-card">
                    <h3>@lang('front.teltel'):</h3>
                    <img src="{{asset($tdetail->image)}}" alt="">
                    {!! html_entity_decode($tdetail->about) !!}
                    
                    <br>
                    <p><a href="{{$tdetail->redirect_link}}" target="_blank">@lang('front.kecidlink')</a><b> @lang('front.telimcumle').</b></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Training SLIDER -->
    <div style="margin-bottom: 30px;" class="training-container container pt-4">
    <h2>@lang('front.oxsartelim')</h2>
      <div class="training-cards row">            
        @foreach ($alltrainings as $key=>$alltr)

        <div class="col-md-6 col-lg-3 mt-3">   
          <div class="training-card">
            <div class="top-part">
                <img src="{{asset($alltr->image)}}" alt="">
            </div>
            <div class="middle-part">
                <a class="first-mid-a" href="{{route('trainingsdetail', $alltr->id)}}">{{Str::limit($alltr->title, 35, '...')}}
                    <a class="second-mid-a" href="{{route('trainingsdetail', $alltr->id)}}">
                        @if(mb_strlen(html_entity_decode($alltr->name)) > 30)
                            {{ mb_substr(html_entity_decode($alltr->name), 0, 30) . ' ...' }}
                        @else
                            {{ html_entity_decode($alltr->name) }}
                        @endif
                    </a>
                    @if($alltr->price == NULL)
                    <span>@lang('front.pulsuz')</span>
                  @else
                  <span>{{$alltr->price}} AZN</span>
      
                  @endif
                  <a href="{{route('trainingsdetail', $alltr->id)}}" class="show-more">@lang('front.incele')</a>
                </div>
            <div class="bottom-part">
              <span class="hr-line"></span>
              <div class="look-count">
                <img src="https://1is-new.netlify.app/images/eye.png" alt="" />
              <span>{{$alltr->view}}</span>
              </div>
              <div class="date-training">
                <img src="https://1is-new.netlify.app/images/blog-date.png" alt="" />
              <span>{{($alltr->created_at) ->format('d.m.Y')}}</span>
              </div>
              <div class="new-trainig">
                <p>@lang('front.yeni')</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
@endsection


@section('js-link')
<script src="{{asset('front/js/slick.min.js')}}"></script>
<script src="{{asset('front/js/blog.js')}}"></script>
@endsection

@section('css-link')
<link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
<link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
<link rel="stylesheet" href="{{asset('front/css/trainings.css')}}" />
@endsection




