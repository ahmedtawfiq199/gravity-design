@extends('layout.app')



@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    <!-- END: Vendor CSS-->
@endsection
@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('All Lecturs') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('lectures.create') }}"
                    class="btn btn-danger ms-auto  d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white">{{ __('Create Lecture') }}</a>
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
                        <div class="col-md-4">
                            <input type="date" name="from_date" id="from_date" class="form-control"
                                placeholder="من تاريخ"  />
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="to_date" id="to_date" class="form-control" placeholder="الى تاريخ"
                                 />
                        </div>
                        <div class="col-md-4">
                            <button type="button" name="filter" id="filter"
                                class="btn btn-danger text-white">{{ __('فلترة') }}</button>
                            <button type="button" name="refresh" id="refresh"
                                class="btn btn-secondary text-white">{{ __('تحديث') }}</button>
                        </div>
                    </div>
                </section>
            </div>

            <div class="white-box">

                <section class="wrapper" style="margin-top: 30px;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> {{ __('Lecture') }}</h3>
                        </div>
                    </div>
                    <div>
                        <x-alert />
                        <table class="table" id="lectures-list-table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('No.') }}</th>
                                    <th scope="col">{{ __('Lecture Name') }}</th>
                                    <th scope="col">{{ __('ID Number') }}</th>
                                    <th scope="col">{{ __('Phone Number') }}</th>
                                    <th scope="col">{{ __('Second Phone Number') }}</th>
                                    <th scope="col">{{ __('Address') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </section>
                @foreach ($lectures as $lecture)
                <div class="modal fade" id="modals-delete-lecture{{ $lecture->id }}">
                    <div class="modal-dialog">
                        <form class="create-new-nature modal-content pt-0"
                              action="{{ route('lectures.destroy',$lecture->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">حذف المجموعة</h5>
                            </div>
                            <div class="modal-body flex-grow-1">

                                <div class="form-group">
                                    <label for="username">{{__('هل تريد حذف هذه المجموعة')}}</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mr-1 data-submit">حذف</button>
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
    <script>
        $(document).ready(function() {
            // $('.input-daterange').datepicker({
            //     todayBtn:'linked',
            //     format:'yyyy-mm-dd',
            //     autoclose:true
            // });

            load_data();

            function load_data(from_date = '', to_date = '') {
                $('#lectures-list-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    ajax: {
                        url: '/lectures',
                        data: {
                            from_date: from_date,
                            to_date: to_date
                        }
                    }, // JSON file to add data
                    columns: [
                        // columns according to JSON
                        {
                            data: 'DT_RowIndex'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'id_number'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'second_phone'
                        },
                        {
                            data: 'address'
                        },
                        {
                            data: ''
                        }
                    ],
                    columnDefs: [

                        {
                            // Actions
                            targets: -1,
                            orderable: false,
                            render: function(data, type, full, meta) {
                                var id = full['id'];
                                return (
                                    '<div class="btn-group">' +
                                    '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({
                                        class: 'font-small-4'
                                    }) +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-right">' +
                                    '<a href="/lectures/' +
                                    id +
                                    '/edit" class="dropdown-item">' +
                                    feather.icons['archive'].toSvg({
                                        class: 'font-small-4 mr-50'
                                    }) +
                                    'تعديل</a>' +
                                    '<a href="javascript:;" class="dropdown-item delete-record" data-toggle= "modal" data-target= "#modals-delete-lecture' +
                                    id + '">' +
                                    feather.icons['trash-2'].toSvg({
                                        class: 'font-small-4 mr-50'
                                    }) +
                                    'حذف</a></div>' +
                                    '</div>' +
                                    '</div>'
                                );
                            }
                        }

                    ],
                    order: [0, 'asc'],
                    dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                        '<"col-lg-12 col-xl-6" l>' +
                        '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                        '>t' +
                        '<"d-flex justify-content-between mx-2 row mb-1"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: 'عرض _MENU_',
                        search: 'بحث',
                        searchPlaceholder: 'بحث..',

                    },
                    buttons: [{
                        extend: 'collection',
                        className: 'btn btn-outline-secondary bg-white dropdown-toggle ms-3 mt-50',
                        text: feather.icons['share'].toSvg({
                            class: 'font-small-4 ms-50'
                        }) + 'تصدير',
                        buttons: [{
                                extend: 'print',
                                text: feather.icons['printer'].toSvg({
                                    class: 'font-small-4 ms-50'
                                }) + 'طباعة',
                                className: 'dropdown-item bg-white',
                                exportOptions: {
                                    columns: [0, 1,2,3,4,5]
                                }
                            },
                            {
                                extend: 'csv',
                                text: feather.icons['file-text'].toSvg({
                                    class: 'font-small-4 ms-50'
                                }) + 'Csv',
                                className: 'dropdown-item bg-white',
                                exportOptions: {
                                    columns: [0, 1,2,3,4,5]
                                }
                            },
                            {
                                extend: 'excel',
                                text: feather.icons['file'].toSvg({
                                    class: 'font-small-4 ms-50'
                                }) + 'اكسل',
                                className: 'dropdown-item bg-white',
                                exportOptions: {
                                    columns: [0, 1,2,3,4,5]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: feather.icons['clipboard'].toSvg({
                                    class: 'font-small-4 ms-50'
                                }) + 'Pdf',
                                className: 'dropdown-item bg-white',
                                exportOptions: {
                                    columns: [0, 1,2,3,4,5]
                                }
                            },
                            {
                                extend: 'copy',
                                text: feather.icons['copy'].toSvg({
                                    class: 'font-small-4 ms-50'
                                }) + 'نسخ',
                                className: 'dropdown-item bg-white',
                                exportOptions: {
                                    columns: [0, 1,2,3,4,5]
                                }
                            }
                        ],
                        init: function(api, node, config) {
                            $(node).removeClass('btn-secondary');
                            $(node).parent().removeClass('btn-group');
                            setTimeout(function() {
                                $(node).closest('.dt-buttons').removeClass('btn-group')
                                    .addClass(
                                        'd-inline-flex');
                            }, 50);
                        }
                    }]

                });
            }

            $('#filter').click(function() {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                    $('#lectures-list-table').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    alert('يجب ادخال حقل من تاريخ وحقل الى تاريخ');
                }
            });

            $('#refresh').click(function() {
                $('#from_date').val('');
                $('#to_date').val('');
                $('#lectures-list-table').DataTable().destroy();
                load_data();
            });
        });
    </script>
@endsection
