@extends('front.layouts.master')


@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@foreach ($banner as $ban)

<section class="vacancy-section" style="background-image:linear-gradient(0deg, rgba(4, 15, 15, 0.6), rgba(32, 34, 80, 0.6)),
      url({{asset($ban->image)}})">
       @endforeach

      <div class="vacancy-header">
        <div class="maintitle">
          <h2>İş Elanları</h2>
        </div>
        <form class="main-filter" method="GET" action="{{route('compvac', ['id' => $id])}}">
            <div class="active-filters">
              <div class="filter1">
                <img src="https://1is-new.netlify.app/images/search.png" alt="" />
                <input class="filter-input" placeholder="@lang('front.compaxtar')" type="search" name="query" value="{{ old('query') }}"/>
              </div>
              <div class="filter2 d-flex justify-content-end">
                <button class="filter-searc">@lang('front.axtar')</button>
              </div>
            </div>    
        </form>
      </div>
</section>

    <!-- vacancies -->
<section class="all-vacantions">
      <div class="all-vacancies">
        @if($compvacancies->isEmpty())
                <div class="no-vacancies-message">
                    <p style="margin-left: 15px; font-size: 24px;"><span style="color: #F96D00;">@lang('front.vacyox')</span> </p>
                </div>
        @else
            @foreach($compvacancies as $key=>$vacancy)

            <div class="vac-card">    
                
            <div class="vac-inner1">
                <a href="{{route('vacancydetail', $vacancy->id)}}" class="vac-inner1-a">{{$vacancy->title_az}}</a>
                <img src="{{ asset('back/assets/images/icons/heart.png') }}" alt="heart" class="heart-icon" data-vacancy-id="{{ $vacancy->id }}" style="{{ in_array($vacancy->id, $likes) ? 'display: none;' : 'display: inline-block;' }}">
            <img src="{{ asset('back/assets/images/icons/red-heart.png') }}" alt="red-heart" class="red-heart-icon" data-vacancy-id="{{ $vacancy->id }}" style="{{ in_array($vacancy->id, $likes) ? 'display: inline-block;' : 'display: none;' }}">


                
            </div>
            <div class="vac-inner2">
                <a href="{{route('vacancydetail', $vacancy->id)}}" class="vac-name" >{{Str::limit($vacancy->position, 40, '...')}}</a>

            </div>
            <div class="vac-inner3">
                <div class="vac-inn1">
                <img src="https://1is-new.netlify.app/images/building.png" alt="" />
                <a class="comp-link" href="{{route('compdetail', $vacancy->company_id)}}">{{Str::limit($vacancy->company_name, 20, '...')}}</a>
                </div>
                <div class="vac-inn2">
                <img src="https://1is-new.netlify.app/images/clock.png" alt="" />
                <p class="vac-time">{{ date('d-m-Y', strtotime($vacancy->created_at)) }}</p>
                </div>
            </div>

            </div>                 
            @endforeach
            @endif
           
    <nav aria-label="..." class="d-flex justify-content-center">
        @if ($compvacancies->hasPages())
        <ul class="pagination pagination-ul">
            {{-- Previous Page Link --}}
            @if ($compvacancies->onFirstPage())
            @else
                <li class="page-item"><a class="page-link" href="{{ $compvacancies->appends(request()->except('page'))->previousPageUrl() }}" rel="prev">«</a></li>
            @endif
    
            @if($compvacancies->currentPage() > 3)
                <li class="page-item" class="hidden-xs"><a class="page-link" href="{{ $compvacancies->appends(request()->except('page'))->url(1) }}">1</a></li>
            @endif
            @if($compvacancies->currentPage() > 4)
            <li class="page-item"><a class="page-link">...</a></li>
            @endif
            @foreach(range(1, $compvacancies->lastPage()) as $i)
                @if($i >= $compvacancies->currentPage() - 1 && $i <= $compvacancies->currentPage() + 1)
                    @if ($i == $compvacancies->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $i }}</a></li>
                    @else
                        <li class="page-item "><a class="page-link" href="{{ $compvacancies->appends(request()->except('page'))->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach
            @if($compvacancies->currentPage() < $compvacancies->lastPage() - 2)
            <li class="page-item"><a class="page-link">...</a></li>
            @endif
            @if($compvacancies->currentPage() < $compvacancies->lastPage() - 1)
                <li class="page-item hidden-xs"><a class="page-link" href="{{ $compvacancies->appends(request()->except('page'))->url($compvacancies->lastPage()) }}">{{ $compvacancies->lastPage() }}</a></li>
            @endif
    
            {{-- Next Page Link --}}
            @if ($compvacancies->hasMorePages())
                <li><a class="page-link" href="{{ $compvacancies->appends(request()->except('page'))->nextPageUrl() }}" rel="next">»</a></li>
            @endif
        </ul>
    </nav>
    <h3 class="blog-all-result-text" style="margin: 0 auto;">@lang('front.umumisay') : {{$compvacancies->total()}}</h3>
        @endif
    </div>
</section>

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
                var url = '{{ route('complike') }}'; // Favori ekleme için uygun URL'yi buraya yazın
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
        } else {
            window.location.href = '{{ route('login') }}';
        }
    

        // AJAX isteği
        var xhr = new XMLHttpRequest();
        var url = '{{ route('dislike') }}'; // Dislike işlemi için uygun URL'yi buraya yazın
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
@endsection

@section('css-link')
<link rel="stylesheet" href="{{asset('front/css/vacancy-all.css')}}">
<link rel="stylesheet" href="{{asset('front/css/search-more.css')}}">
@endsection

