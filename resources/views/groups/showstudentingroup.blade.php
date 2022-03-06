@extends('layout.app')

@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Group') }} {{ $group->name }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('groups.index') }}"
                    class="btn btn-danger ms-auto d-none d-md-block pull-right hidden-xs hidden-sm waves-effect waves-light text-white">{{ __('Back') }}</a>
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
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> {{ __('Students in this Group') }}</h3>
                        </div>
                    </div>
                    <div>
                        <x-alert />

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Student Full Name') }}</th>
                                    <th scope="col">{{ __('Phone') }}</th>
                                    <th scope="col">{{ __('Application Date') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->students as $student)
                                <tr>
                                    <td>{{ $student->first_name." ".$student->father_name." ".$student->grandfather_name." ".$student->last_name }}  </td>
                                    <td>{{ $student->mobile_number }}</td>
                                    <td>{{ Carbon\Carbon::parse($student->created_at)->format('y-m-d') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $student->id }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

@foreach ($group->students as $student)
<div class="modal fade" id="modal{{ $student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('Do You Want To Remove') }} {{ $student->first_name }} {{ __('From this Group') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{route('add.student.group.destroy')}}">
            @csrf
            @method('delete')
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="note" class="col-md-12 p-0">{{ __('Note') }}</label>
                    <div class="col-md-12 border-bottom p-0">
                        <textarea rows="5" name="note" value="{{ old('note') }}" id="note" class="form-control p-0 border-0"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="submit" class="btn btn-danger">{{ __('Remove From Postponed Group') }}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endforeach

@endsection
