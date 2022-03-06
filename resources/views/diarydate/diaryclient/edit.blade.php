@extends('layout.app')



@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Create Client Diary') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('student-diary.index') }}"
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
                                <form class="form-horizontal form-material" action="{{ route('client-diary.update',$diary->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="name">{{ __('Date') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" name="diary_date_id" value="{{ old('diary_date_id',$diary->diaryDate->date) }}" id="price" class="form-control p-0 border-0">

                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="type">{{ __('Type') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='type' class="form-select shadow-none p-0 border-0 form-control-line" style="background-image: none;">
                                                <option @if(old('type',$diary->type) == 'in') selected @endif  value="in">{{ __('Inside') }}</option>
                                                <option @if(old('type',$diary->type) == 'out') selected @endif value="out">{{ __('Outside') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Amount') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="price" value="{{ old('price',$diary->price) }}" id="price" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="currency_type">{{ __('Carrency') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='currency_type' class="form-select shadow-none p-0 border-0 form-control-line" style="background-image: none;">
                                                <option @if(old('currency_type',$diary->currency_type) == 'NIS') selected @endif value="NIS">{{ __('NIS') }}</option>
                                                <option @if(old('currency_type',$diary->currency_type) == '$') selected @endif value="$">{{ __('Dollar') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Bond No') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="bond_no" value="{{ old('bond_no',$diary->bond_no) }}" id="bond_no" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="statment">{{ __('Statment') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="statment" value="{{ old('statment',$diary->statment) }}" id="statment" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">{{ __('Update') }}</button>
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
