@extends('layout.app')

@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Add Student To Group') }} {{ $group->name }}</h4>
        </div>
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('students.create') }}"
                    class="btn btn-danger ms-auto  d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white">{{ __('Create Students') }}</a>
                <form class="d-flex" action="{{ route('students.index') }}" method="POST">
                    @csrf
                    @method('GET')
                    <input type="hidden" class="form-control me-2" name="trash" id="trash" type="trash">
                    <button type="submit" class="btn btn-danger ms-3 d-md-block text-white">{{ __('Trashed Students') }}</button>
                </form>
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
                <x-alert />
                <form class="form-horizontal form-material" action="{{ route('add.student.group.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <h3 class="page-header"><i class="fas fa-users"></i> {{ __('Group Name') }}: <span style="font-size: 1.2rem;">{{ $group->name }}</span></h3>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <h3 class="page-header"><i class="fa fa-user"></i> {{ __('Lecture') }}: <span style="font-size: 1.2rem;">{{ $group->lecture->name ?? __('No Lecture') }}</span></h3>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <h3 class="page-header"><i class="fas fa-align-justify"></i> {{ __('Status') }}: <span style="font-size: 1.2rem;">{{ __($group->state) }}</span></h3>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <h3 class="page-header"><i class="fas fa-calendar"></i> {{ __('Trining Day') }}: <span style="font-size: 1.2rem;">{{ __($group->trining_day) }}</span></h3>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <h3 class="page-header"><i class="fas fa-calendar-times"></i> {{ __('Trining Time') }}: <span style="font-size: 1.2rem;">{{ $group->trining_time }}</span></h3>
                        </div>
                        <div class="col-lg-6 mb-5">
                            <h3 class="page-header"><i class="fas fa-calendar-alt"></i> {{ __('Create Date') }}: <span style="font-size: 1.2rem;">{{ Carbon\Carbon::parse($group->created_at)->format('y-m-d') }}</span></h3>
                        </div>
                    </div>
                    <section class="wrapper" style="margin-top: 30px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="page-header"><i class="fa fa-laptop"></i> {{ __('Students') }}</h3>
                            </div>
                        </div>
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('Select') }}</th>
                                        <th scope="col">{{ __('Student Full Name') }}</th>
                                        <th scope="col">{{ __('Phone') }}</th>
                                        <th scope="col">{{ __('Current Group') }}</th>
                                        <th scope="col">{{ __('Application Date') }}</th>
                                        <th scope="col">{{ __('Status') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td><input type="checkbox" name="{{ $student->id }}" value="1" id=""></td>
                                        <td>{{ $student->first_name." ".$student->father_name."
                                            ".$student->grandfather_name." ".$student->last_name }} </td>
                                        <td>{{ $student->mobile_number }}</td>
                                        <td>{{ $student->group->name ?? __('No Group') }}</td>
                                        <td>{{ Carbon\Carbon::parse($student->created_at)->format('y-m-d') }}</td>
                                        <td>{{ __($student->status) }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">{{ __('Add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
