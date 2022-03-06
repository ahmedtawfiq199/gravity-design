@extends('layout.app')


@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Create Student') }}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <a href="{{ route('students.index') }}"
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
                                <form class="form-horizontal form-material" action="{{ route('students.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="first_name">{{ __('First Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="first_name" value="{{ old('first_name') }}" id="first_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="father_name">{{ __('Father Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="father_name" value="{{ old('father_name') }}" id="father_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="grandfather_name">{{ __('Grand Father Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="grandfather_name" value="{{ old('grandfather_name') }}" id="grandfather_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="last_name">{{ __('Last Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="last_name" value="{{ old('last_name') }}" id="last_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="state">{{ __('State') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='state' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="Gaza">{{ __('Gaza') }}</option>
                                                <option value="South">{{ __('South') }}</option>
                                                <option value="Middle Gaza">{{ __('Middle Gaza') }}</option>
                                                <option value="North">{{ __('North') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="address">{{ __('Address') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="address" value="{{ old('address') }}" id="address" class="form-control p-0 border-0">

                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="social_status" class="col-md-12 p-0">{{ __('Social Status') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='social_status' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="Single">{{ __('Single') }}</option>
                                                <option value="Married">{{ __('Married') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="college">{{ __('College') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="college" value="{{ old('college') }}" id="college"class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="specialization">{{ __('Specialization') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="specialization" value="{{ old('specialization') }}" id="specialization" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="gender" class="col-md-12 p-0">{{ __('Gender') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='gender' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="Male">{{ __('Male') }}</option>
                                                <option value="Female">{{ __('Female') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="date_of_birth">{{ __('Date Of Birth') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" id="date_of_birth" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="qualification">{{ __('Qualification') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='qualification' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="Student">{{ __('Student') }}</option>
                                                <option value="Diploma">{{ __('Diploma') }}</option>
                                                <option value="Bachelor">{{ __('Bachelor') }}</option>
                                                <option value="Postgraduate">{{ __('Postgraduate') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="telephone_number">{{ __('Telephone Number') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="telephone_number" value="{{ old('telephone_number') }}" id="telephone_number" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="mobile_number">{{ __('Mobile Number') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" id="mobile_number" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="identification">{{ __('Identification') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="identification" value="{{ old('identification') }}" id="identification" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="right_time" class="col-md-12 p-0">{{ __('Right Time') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='right_time' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="Morning">{{ __('Morning') }}</option>
                                                <option value="Evening">{{ __('Evening') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="trining_day" class="col-md-12 p-0">{{ __('Trining Day') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='trining_day' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">{{ __('No Select') }}</option>
                                                <option value="Saterday-Monday-Wednesday">{{ __('Saterday-Monday-Wednesday') }}</option>
                                                <option value="Sunday-tuesday-thursday">{{ __('Sunday-Tuesday-Thursday') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="trining_time" class="col-md-12 p-0">{{ __('Trining Time') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='trining_time' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">{{ __('No Select') }}</option>
                                                <option value="9-11">9-11</option>
                                                <option value="11-1">11-1</option>
                                                <option value="1-3">1-3</option>
                                                <option value="3-5">3-5</option>
                                                <option value="5-7">5-7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="how_to_know_us" class="col-md-12 p-0">{{ __('How to know us') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='how_to_know_us' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">{{ __('No Select') }}</option>
                                                <option value="Facebook">{{ __('Facebook') }}</option>
                                                <option value="Instagram">{{ __('Instagram') }}</option>
                                                <option value="Friends">{{ __('Friends') }}</option>
                                                <option value="Marketers">{{ __('Marketers') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="previous_courses">{{ __('Previous Courses') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="previous_courses" value="{{ old('previous_courses') }}" id="previous_courses" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Course Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="courses" class="form-select shadow-none p-0 border-0 form-control-line">
                                                @foreach (App\Models\Course::all() as $course)
                                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="how_to_know_us" class="col-md-12 p-0">{{ __('Status') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='status' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="new">{{ __('New') }}</option>
                                                <option value="active">{{ __('Active') }}</option>
                                                <option value="stopped">{{ __('Stopped') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Group Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="group_id" class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">{{ __('No Select') }}</option>
                                                @foreach (App\Models\Group::all() as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
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
