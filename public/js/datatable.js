/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function () {
    'use strict';

    var dtUserTable = $('.program-list-table'),


        statusObj = {
            1: {title: 'Pending', class: 'badge-light-warning'},
            2: {title: 'Active', class: 'badge-light-success'},
            3: {title: 'Inactive', class: 'badge-light-secondary'}
        };

    var assetPath = '../../../app-assets/',
        userView = 'app-user-view.html',
        userEdit = 'app-user-edit.html';
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
        userView = assetPath + 'app/user/view';
        userEdit = assetPath + 'app/user/edit';
    }

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            "processing": true,
            "serverSide": true,
            ajax: {
                url: '/programs'
            }, // JSON file to add data
            columns: [
                // columns according to JSON
                {data: 'id'},
                {data: 'name'},
                {data: ''}
            ],
            columnDefs: [

                {
                    // Actions
                    targets: -1,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        var id = full['id'];
                        return (
                            '<div class="btn-group">' +
                            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({class: 'font-small-4'}) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-right">' +
                            '<a href="/programs/' +
                            id +
                            '/edit" class="dropdown-item">' +
                            feather.icons['archive'].toSvg({class: 'font-small-4 mr-50'}) +
                            'تعديل</a>' +
                            '<a href="#" class="dropdown-item delete-record" data-toggle= "modal" data-target= "#modals-delete-program' + id + '">' +
                            feather.icons['trash-2'].toSvg({class: 'font-small-4 mr-50'}) +
                            'حذف</a></div>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }

            ],
            order: [0, 'asc'],
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
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
                searchPlaceholder: 'بحث ...',

            },
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary bg-white dropdown-toggle ms-3 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 ms-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 ms-50'}) + 'طباعة',
                            className: 'dropdown-item bg-white',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({class: 'font-small-4 ms-50'}) + 'Csv',
                            className: 'dropdown-item bg-white',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 ms-50'}) + 'إكسل',
                            className: 'dropdown-item bg-white',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 ms-50'}) + 'Pdf',
                            className: 'dropdown-item bg-white',
                            exportOptions: {columns: [0, 1]}
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({class: 'font-small-4 ms-50'}) + 'نسخ',
                            className: 'dropdown-item bg-white',
                            exportOptions: {columns: [0, 1]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                }
            ]

        });
    }




});
