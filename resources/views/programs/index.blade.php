@extends('layout.app')

{{-- @section('search')
<form class="d-flex" action="{{ route('programs.index') }}" method="POST">
    @csrf
    @method('GET')
    <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection --}}

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors-rtl.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<!-- END: Vendor CSS-->

@endsection

@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('All Programs') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('programs.create') }}"
                    class="btn btn-danger ms-auto  d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white">{{ __('Create Program') }}</a>
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <section class="wrapper" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i>{{ __('Programs') }}</h3>
                        </div>
                    </div>
                    <div>
                        <x-alert />
                        <table class="table program-list-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('No.') }}</th>
                                    <th scope="col">{{ __('Program Name') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($programs as $program)
                                <tr>
                                    <th scope="row">{{ $program->id }}</th>
                                    <td>{{ $program->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form method="post" action="{{route('programs.destroy',$program->id)}}">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-primary"
                                                    href="{{ route('programs.edit',$program->id ) }}"><i
                                                        class="fa fa-edit"></i></a>

                                                <button
                                                    onclick="if (confirm('Want to delete?')) { return true; }else{ return false; }"
                                                    class="btn btn-danger"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </section>

                @foreach ($programs as $program)
                <div class="modal fade" id="modals-delete-program{{ $program->id }}">
                    <div class="modal-dialog">
                        <form class="create-new-nature modal-content pt-0"
                              action="{{ route('programs.destroy',$program->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">حذف البرنامج</h5>
                            </div>
                            <div class="modal-body flex-grow-1">

                                <div class="form-group">
                                    <label for="username">{{__('هل تريد حذف البرنامج')}}</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-1 data-submit">حفظ</button>
                                <button type="reset" class="btn btn-outline-secondary"
                                        data-dismiss="modal">الغاء
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
 <!-- BEGIN: Page Vendor JS-->
 <script src="{{ asset('assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
 <!-- END: Page Vendor JS-->

<script src="{{ asset('js/datatable.js') }}"></script>
@endsection
