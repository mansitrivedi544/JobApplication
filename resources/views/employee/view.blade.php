@extends('layouts.mainLayout')

@section('content')
<?php

use Illuminate\Support\Facades\Session; ?>
<div class="register-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 topHead">
                <div class="card">
                    <h6 class="card-header"><b>View Job Application</b></h6>
                    <div class="card-body">
                        @if($response = session('response'))
                        <div class="alert alert-{{ $response['class'] }} alert-dismissible1 fade show" role="alert" id="list-msg">
                            <strong>{{ $response['msg'] }}</strong>
                        </div>
                        @endif
                        <div class="col-md-12 back-btn">
                            <a href="{{route('dashboard')}}" title="Back" class="btn btn-info">
                                Back
                            </a>
                        </div>
                        <input type="hidden" name="id" value="{{$employee->id}}">
                        <!-- Basic Details -->
                        <div class="card-header mb-4 text-center"><b>Basic Details</b></div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
                            <div class="col-md-6">
                                <input disabled type="text" id="first_name" class="first-name form-control" name="first_name" value="{{old('first_name',$employee->first_name)}}" />
                                @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                            <div class="col-md-6">
                                <input disabled type="text" id="last_name" class="last-name form-control" name="last_name" value="{{old('last_name',$employee->last_name)}}" />
                                @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input disabled type="text" id="email_address" class="email form-control" name="email" value="{{old('email',$employee->email)}}" />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-2 mt-2">
                                <div class="form-check col-md-2 text-right">
                                    <input disabled class="form-check-input" type="radio" name="gender" id="male" value="male" {{old('male',$employee->gender)=='male'?'checked':''}}>
                                    <label class="form-check-label" for="male">
                                        Male </label>
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <div class="form-check col-md-2 text-right">
                                    <input disabled class="form-check-input" type="radio" name="gender" id="female" value="female" {{old('female',$employee->gender)=='female'?'checked':''}}>
                                    <label class="form-check-label" for="female">
                                        Female </label>
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <div class="form-check col-md-2 text-right">
                                    <input disabled class="form-check-input" type="radio" name="gender" id="other" value="other" {{old('other',$employee->gender)=='other'?'checked':''}}>
                                    <label class="form-check-label" for="other">
                                        Other </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                            <div class="col-md-6">
                                <input disabled type="text" id="age" maxlength="3" class="age form-control" name="age" value="{{old('age',$employee->age)}}" />
                                @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <textarea disabled class="address form-control" id="address" rows="3" name="address">{{old('address',$employee->address)}}</textarea>
                            </div>
                        </div>
                        @if(count($workExperience)>0)
                        <!-- Work Experience -->
                        <div class="card-header mb-4 text-center"><b>Work Experience</b></div>
                        <div class="row">
                            <div class="row row-sm">
                                <div class="col-md-12" id="work_experience_fields">
                                    @foreach($workExperience as $exp)
                                    <div class="row multi_div work-experience-div mt-3">
                                        <div class="col-md-4 form-group experience-add"><span class="input-help ">
                                                <label class="form-label mt-1">Company</label>
                                                <input disabled type="text" class="input-company form-control " id="company[]" name="company[]" aria-required="true" placeholder="Enter company name" value='{{old("company[]",$exp->company_name)}}'></span>
                                        </div>
                                        <div class="col-md-4 form-group"><span class="input-help ">
                                                <label class="form-label mt-1"> Designation </label>
                                                <input disabled type="text" class="input-designation form-control " id="designation" name="designation[]" aria-required="true" placeholder="Enter designation" value='{{ old("designation[]",$exp->designation) }}'></span>
                                        </div>
                                        <div class="col-md-4 form-group experience-date">
                                            <label class="form-label mt-1">From Date</label><span class="input-help ">
                                                <input disabled type="date" id="from-date" class="form-control" name="from_date[]" value="{{old('from_date[]',$exp->from_date)}}" /> </span>
                                        </div>
                                        <div class="col-md-4 form-group experience-add"><span class="input-help ">
                                                <label class="form-label mt-1">To Date</label>
                                                <input disabled type="date" id="to-date" class="form-control" name="to_date[]" value="{{old('to_date[]',$exp->to_date)}}" /> </span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        @endif
                        @if(count($lanuguage)>0)
                        <!-- Known Languages -->
                        <div class="card-header mb-4 text-center"><b>Known Languages</b></div>
                        <div class="form-group row check-work">
                            <div class="col-md-6 mt-2">
                                <div class="form-group row ml-5">
                                    @foreach($lanuguage as $lang)
                                    <div class="col-md-12">
                                        <label class="form-check-label" for="flexCheckChecked"> <b>{{ ucfirst($lang->language)}} : </b> </label>
                                        <label class="form-check-label" for="flexCheckChecked">{{ $lang->read==1?'read':""}} </label>
                                        <label class="form-check-label" for="flexCheckChecked"> {{ $lang->write==1?'write':""}} </label>
                                        <label class="form-check-label" for="flexCheckChecked"> {{ $lang->speak==1?'speak':""}} </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($technicalExperience)>0)
                        <!-- Technical Experience -->
                        <div class="card-header mb-4 text-center"><b>Technical Experience</b></div>
                        <div class="form-group row check-work">
                            <div class="col-md-6 mt-2">
                                <div class="form-group row ml-5">
                                    @foreach($technicalExperience as $exp)
                                    <div class="col-md-12">
                                        <label class="form-check-label" for="flexCheckChecked"> <b>{{ ucfirst($exp->language_name)}} : </b> </label>
                                        <label class="form-check-label" for="flexCheckChecked">{{ $exp->experience_level=="beginer"?'beginer':""}} </label>
                                        <label class="form-check-label" for="flexCheckChecked"> {{ $exp->experience_level=="mediator"?'mediator':""}} </label>
                                        <label class="form-check-label" for="flexCheckChecked"> {{ $exp->experience_level=="expert"?'expert':""}} </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- preference -->
                        <div class="card-header mb-4 text-center"><b>preference</b></div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">Prefered Location</label>
                            <div class="col-md-6">
                                <select disabled class="location form-select form-control" aria-label="Default" name="prefered_location">
                                    <option value="any" {{ $preference->prefered_location == "any" ? 'selected' : ''}}>Any</option>
                                    <option value="ahmedabad" {{ $preference->prefered_location == "ahmedabad" ? 'selected' : ''}}>Ahmedabad</option>
                                    <option value="vadodara" {{ $preference->prefered_location == "vadodara" ? 'selected' : ''}}>Vadodara</option>
                                    <option value="surat" {{ $preference->prefered_location == "surat" ? 'selected' : ''}}>Surat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Expected CTC</label>
                            <div class="col-md-6">
                                <input type="text" disabled id="expected_ctc" class="expected form-control" name="expected_ctc" value="{{old('expected_ctc',$preference->expected_ctc)}}" />
                                @if ($errors->has('expected_ctc'))
                                <span class="text-danger">{{ $errors->first('expected_ctc') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Current CTC</label>
                            <div class="col-md-6">
                                <input type="text" disabled id="current_ctc" class="current form-control" name="current_ctc" value="{{old('current_ctc',$preference->current_ctc)}}" />
                                @if ($errors->has('current_ctc'))
                                <span class="text-danger">{{ $errors->first('current_ctc') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notice_period" class="col-md-4 col-form-label text-md-right">Notice Period</label>
                            <div class="col-md-6">
                                <input type="number" disabled min="0" id="notice_period" class="notice-period form-control" name="notice_period" value="{{old('notice_period',$preference->notice_period)}}" />
                                @if ($errors->has('notice_period'))
                                <span class="text-danger">{{ $errors->first('notice_period') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection