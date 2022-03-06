@extends('layout.app')


@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Create Group') }}</h4>
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
                     <!-- Column -->
                     <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                               <x-alert />
                                <form class="form-horizontal form-material" action="{{ route('groups.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="name">{{ __('Group Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="name" value="{{ old('name') }}" id="name"class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Course Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="course_id" class="form-select shadow-none p-0 border-0 form-control-line">
                                                @foreach (App\Models\Course::all() as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="description" class="col-md-12 p-0">{{ __('Trining Day') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='trining_day' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="Saterday-Monday-Wednesday">{{ __('Saterday-Monday-Wednesday') }}</option>
                                                <option value="Sunday-tuesday-thursday">{{ __('Sunday-tuesday-thursday') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="description" class="col-md-12 p-0">{{ __('Trining Time') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='trining_time' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="9-11">9-11</option>
                                                <option value="11-1">11-1</option>
                                                <option value="1-3">1-3</option>
                                                <option value="3-5">3-5</option>
                                                <option value="5-7">5-7</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">{{ __('Create') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </section>
            </div>
            </div>
        </div>
    </div>

@endsection
