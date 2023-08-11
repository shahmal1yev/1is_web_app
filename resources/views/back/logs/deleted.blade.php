@extends('back.layouts.master')
@section('title','1is | Loglar')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Loglar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('adminIndex')}}">Ana səhifə</a></li>
                        <li class="breadcrumb-item active">Loglar</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        @include('back.layouts.messages')
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">

                        <thead>
                        <tr>
                            <th>№</th>
                            <th>İstifadəçi</th>
                            <th>Əməliyyat</th>
                            <th>Tarix</th>
                            <th>Proses</th>



                        </tr>
                        </thead>
                        <tbody>
                            @foreach($activityLogs as $key => $log)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $log->causer->name ?? '' }}</td>
                                

                                <td>{{ $log->description }}</td>
                                <td>{{ $log->created_at }}</td>
                                    @php
                                        $properties = json_decode($log->properties, true);
                                        
                                        $subjectType = $log['subject_type'];

                                        $modelDisplayName = '';

                                        if ($log->event === 'deleted') {
                                            if (isset($properties['old'])) {
                                                $modelAttributes = $properties['old'];
                                                
                                            } else {
                                                $modelAttributes = [];
                                            }
                                            
                                            if ($subjectType === 'App\Models\CV') {
                                                $modelDisplayName = $modelAttributes['name'] . ' ' . $modelAttributes['surname'] . ' adlı cv silindi';
                                            } elseif ($subjectType === 'App\Models\Vacancies') {
                                                $modelDisplayName = $modelAttributes['position'] . ' adlı vakansiya silindi';
                                            } elseif ($subjectType === 'App\Models\Companies') {
                                                $modelDisplayName = $modelAttributes['name'] . ' adlı şirkət silindi';
                                            } elseif ($subjectType === 'App\Models\Blogs') {
                                                $modelDisplayName = $modelAttributes['title_az'] . ' adlı blog silindi';
                                            } elseif ($subjectType === 'App\Models\User') {
                                                $modelDisplayName = $modelAttributes['name'] . ' ' . $modelAttributes['surname'] . ' adlı istifadəçi silindi';
                                            } elseif ($subjectType === 'App\Models\Trainings') {
                                                $modelDisplayName = $modelAttributes['title'] . ' adlı təlim silindi';
                                            } else {
                                                $modelDisplayName = 'Model yoxdur';
                                            }
                                        }
                                    @endphp
                                    <td>{{ $modelDisplayName }} </td>


                                
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection

@section('css')

    <!-- DataTables -->
    <link href="{{asset('back/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('back/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('back/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{asset('back/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('js')

    <!-- Required datatable js -->
    <script src="{{asset('back/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('back/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('back/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('back/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('back/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('back/assets/js/pages/datatables.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('back/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('back/assets/js/pages/sweet-alerts.init.js')}}"></script>


@endsection


