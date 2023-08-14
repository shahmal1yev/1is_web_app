
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('adminIndex')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset($setting->logo)}}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset($setting->logo)}}" alt="" height="60">
                                </span>
                </a>

                <a href="{{route('adminIndex')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset($setting->logo)}}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img src="{{asset($setting->logo)}}" alt="" height="90">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge @if(count($contact) == 0) bg-success @else bg-danger @endif rounded-pill">{{count($contact)}}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> İsmariclar </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('contactIndex')}}" class="small" key="t-view-all"> Hamısını göstər</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @foreach($contact as $item)
                        <a href="{{route('contactIndex')}}" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-comment-dots"></i>
                                                </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1" key="t-shipped">{{$item->name}} {{$item->surname}}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">{{mb_substr($item->message,0,50)}}@if(strlen($item->message) > 50) ... @endif</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{ \Carbon\Carbon::parse($item->created_at)->format('j F, Y') }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="{{route('contactIndex')}}">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">Daha ətraflı</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset($user->image)}}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{$user->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('adminProfileIndex')}}"><i class="fas fa-user font-size-16 align-middle me-1"></i> <span key="t-profile">Hesab</span></a>
                    <a class="dropdown-item" href="{{route('adminProfilePassword')}}"><i class="fas fa-lock font-size-16 align-middle me-1"></i> <span key="t-profile">Şifrə dəyiş</span></a>
                   @if($user->is_superadmin == '1')
                        <a class="dropdown-item" href="{{route('adminList')}}"><i class="fas fa-user-lock font-size-16 align-middle me-1"></i> <span key="t-profile">Adminlər</span></a>
                    @endif

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('adminLogout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                </div>
            </div>


        </div>
    </div>
</header>
