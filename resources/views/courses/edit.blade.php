@extends('layout.app')


@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Create Course') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('courses.index') }}"
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
                                <form class="form-horizontal form-material" action="{{ route('courses.update',$course->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="name">{{ __('Course Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="name" value="{{ old('name',$course->name) }}" id="name"class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Course Price') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="price" value="{{ old('price',$course->price) }}"  id="price" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0"> {{ __('Programs') }} </label>
                                        @foreach (App\Models\Program::all() as $program)

                                            <label class="col-md-12 p-0"><input type="checkbox" name="{{ $program->name }}"
                                                @foreach ($program->courses as $item)
                                                    @if($course->id == $item->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                            class="form-check-input" value="1">
                                                {{ $program->name }}</label>

                                        @endforeach
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="description" class="col-md-12 p-0">{{ __('Course Description') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea rows="5" name="description" id="description" class="form-control p-0 border-0">{{ old('description',$course->description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">{{ __('Edit') }}</button>
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
