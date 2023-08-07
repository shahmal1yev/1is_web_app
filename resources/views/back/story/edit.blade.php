@extends('back.layouts.master')
@section('title','1is | Hekayələr')
@section('content')

<div >
    <form action="{{route('storyEditPost')}}" method="POST" class="modal-dialog" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hekayə redaktə et</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                        
                <input type="hidden" name="id" value="{{$story->id}}">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <label for="image" class="form-label">Şəkil seçin...</label>
                        <input class="form-control" type="file" id="image" name="image">
                            <img src="{{ asset($story->image) }}" alt="Image Preview" style="max-width: 200px;">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <label for="stories" class="form-label">Hekayə seçin:</label>
                        <input class="form-control" type="file" name="stories[]" multiple="">
                            @foreach (json_decode($story->stories) as $storyPath)
                                <img src="{{ asset($storyPath) }}" alt="Story Preview" style="max-width: 200px;">
                            @endforeach
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <label for="link" class="form-label">Yönləndirmə linki</label>
                        <input class="form-control" type="text" id="edit_link" name="link" value="{{ $story->redirect_link }}">
                    </div>
                </div>
            </div>
            
                <button type="submit" class="btn btn-success">Təsdiqlə</button>
        </div>
    </form>
</div>

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


