@extends('layout.app')


@section('content')

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ __('Edit Student') }}</h4>
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
                                <form class="form-horizontal form-material" action="{{ route('students.update',$student->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="first_name">{{ __('First Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="first_name" value="{{ old('first_name',$student->first_name) }}" id="first_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="father_name">{{ __('Father Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="father_name" value="{{ old('father_name',$student->father_name) }}" id="father_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="grandfather_name">{{ __('Grand Father Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="grandfather_name" value="{{ old('grandfather_name',$student->grandfather_name) }}" id="grandfather_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="last_name">{{ __('Last Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="last_name" value="{{ old('last_name',$student->last_name) }}" id="last_name" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="state">{{ __('State') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="state" value="{{ old('state',$student->state) }}" id="state" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="address">{{ __('Address') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='address' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option @if($student->address == 'Gaza') selected @endif value="Gaza">{{ __('Gaza') }}</option>
                                                <option @if($student->address == 'South') selected @endif value="South">{{ __('South') }}</option>
                                                <option @if($student->address == 'Middle Gaza') selected @endif value="Middle Gaza">{{ __('Middle Gaza') }}</option>
                                                <option @if($student->address == 'North') selected @endif value="North">{{ __('North') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="social_status" class="col-md-12 p-0">{{ __('Social Status') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='social_status' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option @if($student->social_status == 'Single') selected @endif value="Single">{{ __('Single') }}</option>
                                                <option @if($student->social_status == 'Married') selected @endif value="Married">{{ __('Married') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="college">{{ __('College') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="college" value="{{ old('college',$student->college) }}" id="college"class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="specialization">{{ __('Specialization') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="specialization" value="{{ old('specialization',$student->specialization) }}" id="specialization" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="gender" class="col-md-12 p-0">{{ __('Gender') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='gender' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option @if($student->gender == 'Male') selected @endif value="Male">{{ __('Male') }}</option>
                                                <option @if($student->gender == 'Female') selected @endif value="Female">{{ __('Female') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="date_of_birth">{{ __('Date Of Birth') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$student->date_of_birth) }}" id="date_of_birth" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="qualification">{{ __('Qualification') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='qualification' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option @if($student->qualification == 'Student') selected @endif value="Student">{{ __('Student') }}</option>
                                                <option @if($student->qualification == 'Diploma') selected @endif value="Diploma">{{ __('Diploma') }}</option>
                                                <option @if($student->qualification == 'Bachelor') selected @endif value="Bachelor">{{ __('Bachelor') }}</option>
                                                <option @if($student->qualification == 'Postgraduate') selected @endif value="Postgraduate">{{ __('Postgraduate') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="telephone_number">{{ __('Telephone Number') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="telephone_number" value="{{ old('telephone_number',$student->telephone_number) }}" id="telephone_number" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="mobile_number">{{ __('Mobile Number') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="mobile_number" value="{{ old('mobile_number',$student->mobile_number) }}" id="mobile_number" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="identification">{{ __('Identification') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="identification" value="{{ old('identification',$student->identification) }}" id="identification" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="right_time" class="col-md-12 p-0">{{ __('Right Time') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='right_time' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option @if($student->right_time == 'Morning') selected @endif value="Morning">{{ __('Morning') }}</option>
                                                <option @if($student->right_time == 'Evening') selected @endif value="Evening">{{ __('Evening') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="trining_day" class="col-md-12 p-0">{{ __('Trining Day') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='trining_day' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">No Select</option>
                                                <option @if($student->trining_day == 'saterday-Monday-Wednesday') selected @endif value="saterday-Monday-Wednesday">{{ __('Saterday-Monday-Wednesday') }}</option>
                                                <option @if($student->trining_day == 'sunday-tuesday-thursday') selected @endif value="sunday-tuesday-thursday">{{ __('Sunday-Tuesday-Thursday') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="trining_time" class="col-md-12 p-0">{{ __('Trining Time') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='trining_time' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">No Select</option>
                                                <option @if($student->trining_time == '9-11') selected @endif value="9-11">9-11</option>
                                                <option @if($student->trining_time == '11-1') selected @endif value="11-1">11-1</option>
                                                <option @if($student->trining_time == '1-3') selected @endif value="1-3">1-3</option>
                                                <option @if($student->trining_time == '3-5') selected @endif value="3-5">3-5</option>
                                                <option @if($student->trining_time == '5-7') selected @endif value="5-7">5-7</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="how_to_know_us" class="col-md-12 p-0">{{ __('How to know us') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='how_to_know_us' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">No Select</option>
                                                <option @if($student->how_to_know_us == 'Facebook') selected @endif value="Facebook">{{ __('Facebook') }}</option>
                                                <option @if($student->how_to_know_us == 'Instagram') selected @endif value="Instagram">{{ __('Instagram') }}</option>
                                                <option @if($student->how_to_know_us == 'Friends') selected @endif value="Friends">{{ __('Friends') }}</option>
                                                <option @if($student->how_to_know_us == 'Marketers') selected @endif value="Marketers">{{ __('Marketers') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="previous_courses">{{ __('Previous Courses') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="previous_courses" value="{{ old('previous_courses',$student->previous_courses) }}" id="previous_courses" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Course Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="courses" class="form-select shadow-none p-0 border-0 form-control-line">
                                                @foreach (App\Models\Course::all() as $course)
                                                    <option @if($student->courses == $course->id) selected @endif value="{{ $course->id }}">{{ $course->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="how_to_know_us" class="col-md-12 p-0">{{ __('Status') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name='status' class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option  @if($student->status == 'new') selected @endif value="new">{{ __('New') }}</option>
                                                <option  @if($student->status == 'active') selected @endif value="active">{{ __('Active') }}</option>
                                                <option  @if($student->status == 'stopped') selected @endif value="stopped">{{ __('Stopped') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" for="price">{{ __('Group Name') }}</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="group_id" class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="">{{ __('No Select') }}</option>
                                                @foreach (App\Models\Group::all() as $group)
                                                    <option @if($student->group_id == $group->id) selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            </select>
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
