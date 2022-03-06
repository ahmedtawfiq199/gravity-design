@extends('layout.app')


@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Edit Lectures') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('lectures.index') }}"
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
                                <form class="form-horizontal form-material" action="{{ route('lectures.update',$lecture->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="name">{{ __('Lecture Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="name" value="{{ old('name',$lecture->name) }}" id="name" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('ID Number') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="id_number" value="{{ old('id_number',$lecture->id_number) }}" id="id_number" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Phone') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="phone" value="{{ old('phone',$lecture->phone) }}" id="phone" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Second Phone') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="second_phone" value="{{ old('second_phone',$lecture->second_phone) }}" id="second_phone" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Address') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="address" value="{{ old('address',$lecture->address) }}" id="address" class="form-control p-0 border-0">
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
