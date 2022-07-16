@extends('layouts.mainLayout')

@section('content')
<?php

use Illuminate\Support\Facades\Session; ?>
<div class="register-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 topHead">
                <div class="card">

                    <h6 class="card-header"><b>Job Application</b></h6>
                    <div class="card-body">
                        @if($response = session('response'))
                        <div class="alert alert-{{ $response['class'] }} alert-dismissible1 fade show" role="alert" id="list-msg">
                            <strong>{{ $response['msg'] }}</strong>
                        </div>
                        @endif
                        <form action="{{ route('submitJobApplication') }}" method="POST" id="jobApplicationForm">
                            @csrf
                            <!-- Basic Details -->
                            <div class="card-header mb-4 text-center"><b>Basic Details</b></div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter first name" id="first_name" class="first-name form-control" name="first_name" value="{{old('first_name')}}" />
                                    @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="last_name" placeholder="Enter last name" class="last-name form-control" name="last_name" value="{{old('last_name')}}" />
                                    @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" placeholder="Enter email" class="email form-control" name="email" value="{{old('email')}}" />
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                                        <label class="form-check-label" for="male">
                                            Male </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                        <label class="form-check-label" for="female">
                                            Female </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                                        <label class="form-check-label" for="other">
                                            Other </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter age" id="age" maxlength="3" class="age form-control" name="age" value="{{old('age')}}" />
                                    @if ($errors->has('age'))
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea placeholder="Enter address" class="address form-control" id="address" rows="3" name="address" value="{{old('address')}}"></textarea>
                                </div>
                            </div>

                            <!-- Education Details -->
                            <div class="card-header mb-4 text-center"><b>Education Details</b></div>
                            <div class="form-group row">
                                <label for="Education" class="board col-md-4 col-form-label text-md-right"></label>
                                <div class="col-md-2 mt-2">
                                    <div class="col-md-2 text-right">
                                        <label class="input-space" for="flexCheckChecked">
                                            Board/University </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="col-md-2 text-right">
                                        <label class="ml-4" for="flexCheckChecked">
                                            Year </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="col-md-2 text-right">
                                        <label for="flexCheckChecked">
                                            CGPA/Percentage </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="checkbox" class="ssc" style="margin-left: 118px;" name="ssc" id="ssc">
                                <label for="Education" class="col-md-2 col-form-label">S.S.C.</label>
                                <input disabled class="ssc_board col-sm-2 ml-1 form-control" type="text" name="ssc_board" value="{{old('ssc_board')}}">
                                @if ($errors->has('ssc_board'))
                                <span class="text-danger">{{ $errors->first('ssc_board') }}</span>
                                @endif
                                <input disabled class="ssc_year col-sm-2 ml-2 form-control" type="text" maxlength="4" name="ssc_year" value="{{old('ssc_year')}}">
                                @if ($errors->has('ssc_year'))
                                <span class="text-danger">{{ $errors->first('ssc_year') }}</span>
                                @endif
                                <input disabled class="ssc_per col-sm-2 ml-2 form-control" type="text" name="ssc_per" value="{{old('ssc_per')}}">
                                @if ($errors->has('ssc_per'))
                                <span class="text-danger">{{ $errors->first('ssc_per') }}</span>
                                @endif
                                <div class="err-ssc col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="checkbox" style="margin-left: 118px;" name="hsc" value="hsc" id="hsc">
                                <label for="Education" class="col-md-2 col-form-label">H.S.C.</label>
                                <input disabled class="hsc_board col-sm-2 ml-1 form-control" type="text" name="hsc_board" value="{{old('hsc_board')}}">
                                @if ($errors->has('hsc_board'))
                                <span class="text-danger">{{ $errors->first('hsc_board') }}</span>
                                @endif
                                <input disabled class="hsc_year col-sm-2 ml-2 form-control" maxlength="4" type="text" name="hsc_year" value="{{old('hsc_year')}}">
                                @if ($errors->has('hsc_year'))
                                <span class="text-danger">{{ $errors->first('hsc_year') }}</span>
                                @endif
                                <input disabled class="hsc_per col-sm-2 ml-2 form-control" type="text" name="hsc_per" value="{{old('hsc_per')}}">
                                @if ($errors->has('hsc_per'))
                                <span class="text-danger">{{ $errors->first('hsc_per') }}</span>
                                @endif
                                <div class="err-hsc col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="checkbox" style="margin-left: 118px;" name="graduation" value="graduation" id="graduation">
                                <label for="Education" class="col-md-2 col-form-label">Graduation</label>
                                <input disabled class="graduate_board col-sm-2 ml-1 form-control" type="text" name="graduate_board" value="{{old('graduate_board')}}">
                                @if ($errors->has('graduate_board'))
                                <span class="text-danger">{{ $errors->first('graduate_board') }}</span>
                                @endif
                                <input disabled class="graduate_year col-sm-2 ml-2 form-control" type="text" maxlength="4" name="graduate_year" value="{{old('graduate_year')}}">
                                @if ($errors->has('graduate_year'))
                                <span class="text-danger">{{ $errors->first('graduate_year') }}</span>
                                @endif
                                <input disabled class="graduate_per col-sm-2 ml-2 form-control" type="text" name="graduate_per" value="{{old('graduate_per')}}">
                                @if ($errors->has('graduate_per'))
                                <span class="text-danger">{{ $errors->first('graduate_per') }}</span>
                                @endif
                                <div class="err-graduate col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="checkbox" style="margin-left: 118px;" name="master_degree" value="masterdegree" id="master_degree">
                                <label for="Education" class="col-md-2 col-form-label">Master Degree</label>
                                <input disabled class="master_board col-sm-2 ml-1 form-control" type="text" name="master_board" value="{{old('master_board')}}">
                                @if ($errors->has('master_board'))
                                <span class="text-danger">{{ $errors->first('master_board') }}</span>
                                @endif
                                <input disabled class="master_year col-sm-2 ml-2 form-control" maxlength="4" type="text" name="master_year" value="{{old('master_year')}}">
                                @if ($errors->has('master_year'))
                                <span class="text-danger">{{ $errors->first('master_year') }}</span>
                                @endif
                                <input disabled class="master_per col-sm-2 ml-2 form-control" type="text" name="master_per" value="{{old('master_per')}}">
                                @if ($errors->has('master_per'))
                                <span class="text-danger">{{ $errors->first('master_per') }}</span>
                                @endif
                                <div class="err-master col-sm-2 ml-2">
                                </div>
                            </div>

                            <!-- Work Experience -->
                            <div class="card-header mb-4 text-center"><b>Work Experience</b></div>
                            <div class="row">

                                <div class="col-12 text-right">
                                    <button type="button" id="add_more_click" class="btn btn-primary">+</button>
                                </div>

                                <div class="row row-sm">
                                    <div class="col-md-12" id="work_experience_fields">
                                        <?php
                                        $flag = "0";
                                        if (session::get('company') != "") {
                                            $flag = "1";
                                            $designationOld = "";
                                            $fromOld = "";
                                            $toOld = "";
                                        ?>
                                            @if (session::has('designation'))
                                            @php $designationOld = session::get('designation'); @endphp
                                            @endif
                                            @if (session::has('from_number'))
                                            @php $fromOld = session::get('from_number'); @endphp
                                            @endif
                                            @if (session::has('to_number'))
                                            @php $toOld = session::get('to_number'); @endphp
                                            @endif
                                            @foreach (session::get('company') as $key => $value)
                                            @php $oldDesignation=$designationOld[$key]; @endphp
                                            <div class="row multi_div work-experience-div mt-3">
                                                <div class="col-md-4 form-group experience-add"><span class="input-help ">
                                                        <label class="form-label mt-1">Company</label>
                                                        <input type="text" class="input-company form-control " id="company[]" name="company[]" aria-required="true" placeholder="Enter company name" value='{{old("company[]")}}'></span>
                                                </div>
                                                <div class="col-md-4 form-group"><span class="input-help ">
                                                        <label class="form-label mt-1"> Designation </label>
                                                        <input type="text" class="input-designation form-control " id="designation" name="designation[]" aria-required="true" placeholder="Enter designation" value='{{ old("designation[]") }}'></span>
                                                </div>

                                                <div class="col-md-4 form-group experience-date">
                                                    <label class="form-label mt-1">From Date</label><span class="input-help ">
                                                        <input type="date" id="from-date" class="form-control" name="from_date[]" /> </span>
                                                </div>
                                                <div class="col-md-4 form-group experience-add"><span class="input-help ">
                                                        <label class="form-label mt-1">To Date</label>
                                                        <input type="date" id="to-date" class="form-control" name="to_date[]" /> </span>
                                                </div>

                                                <div class="col-md-1 form-group">
                                                    <button type="button" id="remove_click" class="remove-work-experience-div btn btn-danger remove-btn">-</button>

                                                </div><br>
                                            </div>
                                            @endforeach

                                        <?php
                                        }
                                        session::put('company', "");
                                        session::put('designation', "");
                                        session::put('from_number', "");
                                        session::put('to_number', "");

                                        ?>
                                        <input type="hidden" name="company_old" class="input-company-count" value="{{$flag}}">
                                    </div>
                                </div>

                            </div>


                            <!-- Known Languages -->
                            <div class="card-header mb-4 text-center"><b>Known Languages</b></div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="hindi" id="hindi" name="hindi">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Hindi </label>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="hindi_read" id="hindi_read" name="hindi_read">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Read </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="hindi_write" id="hindi_write" name="hindi_write">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Write </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="hindi_speak" id="hindi_speak" name="hindi_speak">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Speak </label>
                                    </div>
                                </div>
                                <div class="err-hindi col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="english" id="english" name="english">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            English </label>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="english_read" id="english_read" name="english_read">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Read </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="english_write" id="english_write" name="english_write">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Write </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="english_speak" id="english_speak" name="english_speak">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Speak </label>
                                    </div>
                                </div>
                                <div class="err-english col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="gujarati" id="gujarati" name="gujarati">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Gujarati </label>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="gujarati_read" id="gujarati_read" name="gujarati_read">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Read </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="gujarati_write" id="gujarati_write" name="gujarati_write">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Write </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="checkbox" value="gujarati_speak" id="gujarati_speak" name="gujarati_speak">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Speak </label>
                                    </div>
                                </div>
                                <div class="err-guj col-sm-2 ml-2">
                                </div>
                            </div>

                            <!-- Technical Experience -->
                            <div class="card-header mb-4 text-center"><b>Technical Experience</b></div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="php" id="php" name="php">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            PHP </label>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="beginer" id="php_beginer" name="php_bme" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Beginer </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="mediator" id="php_mediator" name="php_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Mediator </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="expert" id="php_expert" name="php_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Expert </label>
                                    </div>
                                </div>
                                <div class="err-php col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="mysql" id="mysql" name="mysql">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            MYSQL </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="beginer" id="mysql_beginer" name="mysql_bme" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Beginer </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="mediator" id="mysql_mediator" name="mysql_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Mediator </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="expert" id="mysql_expert" name="mysql_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Expert </label>
                                    </div>
                                </div>
                                <div class="err-sql col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="laravel" id="laravel" name="laravel">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Laravel </label>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="beginer" id="laravel_beginer" name="laravel_bme" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Beginer </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="mediator" id="laravel_mediator" name="laravel_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Mediator </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="expert" id="laravel_expert" name="laravel_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Expert </label>
                                    </div>
                                </div>
                                <div class="err-laravel col-sm-2 ml-2">
                                </div>
                            </div>
                            <div class="form-group row check-work">
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="checkbox" value="oracle" id="oracle" name="oracle">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Oracle </label>
                                    </div>
                                </div>

                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="beginer" id="oracle_beginer" name="oracle_bme" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Beginer </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="mediator" id="oracle_mediator" name="oracle_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Mediator </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input disabled class="form-check-input" type="radio" value="expert" id="oracle_expert" name="oracle_bme">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Expert </label>
                                    </div>
                                </div>
                                <div class="err-oracle col-sm-2 ml-2">
                                </div>
                            </div>

                            <!-- preference -->
                            <div class="card-header mb-4 text-center"><b>preference</b></div>
                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">Prefered Location</label>
                                <div class="col-md-6">
                                    <select class="location form-select form-control" aria-label="Default" name="prefered_location">
                                        <option selected value="any">Any</option>
                                        <option value="ahmedabad">Ahmedabad</option>
                                        <option value="vadodara">Vadodara</option>
                                        <option value="surat">Surat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Expected CTC</label>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter expected CTC" id="expected_ctc" class="expected form-control" name="expected_ctc" value="{{old('expected_ctc')}}" />
                                    @if ($errors->has('expected_ctc'))
                                    <span class="text-danger">{{ $errors->first('expected_ctc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Current CTC</label>
                                <div class="col-md-6">
                                    <input type="text" id="current_ctc" placeholder="Enter current CTC" class="current form-control" name="current_ctc" value="{{old('current_ctc')}}" />
                                    @if ($errors->has('current_ctc'))
                                    <span class="text-danger">{{ $errors->first('current_ctc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notice_period" class="col-md-4 col-form-label text-md-right">Notice Period</label>
                                <div class="col-md-6">
                                    <input type="number" min="0" placeholder="Enter notice period" id="notice_period" class="notice-period form-control" name="notice_period" value="{{old('notice_period')}}" />
                                    @if ($errors->has('notice_period'))
                                    <span class="text-danger">{{ $errors->first('notice_period') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <a href="" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        //education

        $("#jobApplicationForm").on('change', '#ssc', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");

                // $("#ssc").prop('checked', true);
                $(".ssc_board").prop('disabled', false);
                $(".ssc_year").prop('disabled', false);
                $(".ssc_per").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#ssc").prop('checked', false);
                $(".ssc_board").prop('disabled', true);
                $(".ssc_year").prop('disabled', true);
                $(".ssc_per").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#hsc', function() {
            if (this.checked) {
                $("#hsc").prop('checked', true);
                $(".hsc_board").prop('disabled', false);
                $(".hsc_year").prop('disabled', false);
                $(".hsc_per").prop('disabled', false);
            } else {
                $("#hsc").prop('checked', false);
                $(".hsc_board").prop('disabled', true);
                $(".hsc_year").prop('disabled', true);
                $(".hsc_per").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#graduation', function() {
            if (this.checked) {
                $("#graduation").prop('checked', true);
                $(".graduate_board").prop('disabled', false);
                $(".graduate_year").prop('disabled', false);
                $(".graduate_per").prop('disabled', false);
            } else {
                $("#graduation").prop('checked', false);
                $(".graduate_board").prop('disabled', true);
                $(".graduate_year").prop('disabled', true);
                $(".graduate_per").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#master_degree', function() {
            if (this.checked) {
                $("#master_degree").prop('checked', true);
                $(".master_board").prop('disabled', false);
                $(".master_year").prop('disabled', false);
                $(".master_per").prop('disabled', false);
            } else {
                $("#master_degree").prop('checked', false);
                $(".master_board").prop('disabled', true);
                $(".master_year").prop('disabled', true);
                $(".master_per").prop('disabled', true);
            }
        });
        $("#jobApplicationForm").on('change', '#hindi', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#hindi_read").prop('disabled', false);
                $("#hindi_write").prop('disabled', false);
                $("#hindi_speak").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#hindi_read").prop('disabled', true);
                $("#hindi_write").prop('disabled', true);
                $("#hindi_speak").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#english', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#english_read").prop('disabled', false);
                $("#english_write").prop('disabled', false);
                $("#english_speak").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#english_read").prop('disabled', true);
                $("#english_write").prop('disabled', true);
                $("#english_speak").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#gujarati', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#gujarati_read").prop('disabled', false);
                $("#gujarati_write").prop('disabled', false);
                $("#gujarati_speak").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#gujarati_read").prop('disabled', true);
                $("#gujarati_write").prop('disabled', true);
                $("#gujarati_speak").prop('disabled', true);
            }
        });
        $("#jobApplicationForm").on('change', '#hindi_read', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });
        $("#jobApplicationForm").on('change', '#english_read', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });
        $("#jobApplicationForm").on('change', '#gujarati_read', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });

        $("#jobApplicationForm").on('change', '#hindi_write', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });
        $("#jobApplicationForm").on('change', '#english_write', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });
        $("#jobApplicationForm").on('change', '#gujarati_write', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });

        $("#jobApplicationForm").on('change', '#hindi_speak', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });
        $("#jobApplicationForm").on('change', '#english_speak', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });
        $("#jobApplicationForm").on('change', '#gujarati_speak', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
            } else {
                this.removeAttribute("checked");
            }
        });


        $("#jobApplicationForm").on('change', '#php', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#php_beginer").prop('disabled', false);
                $("#php_mediator").prop('disabled', false);
                $("#php_expert").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#php_beginer").prop('disabled', true);
                $("#php_mediator").prop('disabled', true);
                $("#php_expert").prop('disabled', true);
            }
        });
        $("#jobApplicationForm").on('change', '#mysql', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#mysql_beginer").prop('disabled', false);
                $("#mysql_mediator").prop('disabled', false);
                $("#mysql_expert").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#mysql_beginer").prop('disabled', true);
                $("#mysql_mediator").prop('disabled', true);
                $("#mysql_expert").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#laravel', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#laravel_beginer").prop('disabled', false);
                $("#laravel_mediator").prop('disabled', false);
                $("#laravel_expert").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#laravel_beginer").prop('disabled', true);
                $("#laravel_mediator").prop('disabled', true);
                $("#laravel_expert").prop('disabled', true);
            }
        });

        $("#jobApplicationForm").on('change', '#oracle', function() {
            if (this.checked) {
                this.setAttribute("checked", "checked");
                $("#oracle_beginer").prop('disabled', false);
                $("#oracle_mediator").prop('disabled', false);
                $("#oracle_expert").prop('disabled', false);
            } else {
                this.removeAttribute("checked");
                $("#oracle_beginer").prop('disabled', true);
                $("#oracle_mediator").prop('disabled', true);
                $("#oracle_expert").prop('disabled', true);
            }
        });
        $("#jobApplicationForm").submit(function() {
            $('.btn-cl-error').remove();
            var error = 0;

            //basic details
            var inputfname = $('.first-name').val();
            var inputlname = $('.last-name').val();
            var email = $('.email').val();
            var age = $('.age').val();


            if (inputfname == "") {
                $('.first-name').after('<p class="btn-cl-error" style="color:red">Please enter first name.</p>');
                error = 1;
            }
            if (inputlname == "") {
                $('.last-name').after('<p class="btn-cl-error" style="color:red">Please enter last name.</p>');
                error = 1;
            }
            if (email == "") {
                $('.email').after('<p class="btn-cl-error" style="color:red">Please enter email.</p>');
                error = 1;
            }
            if (email != "") {
                var regexv = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (!email.match(regexv)) {
                    $('.email').after('<p class="btn-cl-error" style="color:red"> Please enter valid email address.</p>');
                    error = 1;
                }
            }
            if (age != "") {
                var regex = /^\d*[.]?\d*$/;
                if (!regex.test(age)) {
                    $('.age').after('<p class="btn-cl-error" style="color:red">Please enter number only.</p>');
                    error = 1;
                }
            }
            //preference
            var expectedCtc = $('.expected').val();
            var currentCtc = $('.current').val();

            if (expectedCtc == "") {
                $('.expected').after('<p class="btn-cl-error" style="color:red">Please enter expected ctc.</p>');
                error = 1;
            } else {
                var regex = /^\d*[.]?\d*$/;
                if (!regex.test(expectedCtc)) {
                    $('.expected').after('<p class="btn-cl-error" style="color:red">Please enter number only.</p>');
                    error = 1;
                }
            }
            if (currentCtc == "") {
                $('.current').after('<p class="btn-cl-error" style="color:red">Please enter current ctc.</p>');
                error = 1;
            } else {
                var regex = /^\d*[.]?\d*$/;
                if (!regex.test(currentCtc)) {
                    $('.current').after('<p class="btn-cl-error" style="color:red">Please enter number only.</p>');
                    error = 1;
                }
            }
            var noticePeriod = $('.notice-period').val();
            if (noticePeriod == "") {
                $('.notice-period').after('<p class="btn-cl-error" style="color:red">Please enter notice period.</p>');
                error = 1;
            }

            if (ssc.checked) {
                var sscBoard = $('.ssc_board').val();
                var sscYear = $('.ssc_year').val();
                var sscPer = $('.ssc_per').val();
                if (sscBoard == "" || sscYear == "" || sscPer == "") {
                    $('.err-ssc').after('<p class="btn-cl-error" style="color:red">Please enter ssc details.</p>');
                    error = 1;
                } else {
                    if (sscYear != "" || sscPer != "") {
                        var regex = /^\d*[.]?\d*$/;

                        if (sscYear != "") {
                            if (!regex.test(sscYear)) {
                                $(".err-ssc").empty();
                                $('.err-ssc').after('<p class="btn-cl-error" style="color:red">Please enter number only in year and cgpa/percentage.</p>');
                                error = 1;
                            }
                        }
                    }
                }
            }
            if (hsc.checked) {
                var hscBoard = $('.hsc_board').val();
                var hscYear = $('.hsc_year').val();
                var hscPer = $('.hsc_per').val();
                if (hscBoard == "" || hscYear == "" || hscPer == "") {
                    $('.err-hsc').after('<p class="btn-cl-error" style="color:red">Please enter hsc details.</p>');
                    error = 1;
                } else {
                    if (hscYear != "" || hscPer != "") {
                        var regex = /^\d*[.]?\d*$/;

                        if (hscYear != "") {
                            if (!regex.test(hscYear)) {
                                $(".err-hsc").empty();
                                $('.err-hsc').after('<p class="btn-cl-error" style="color:red">Please enter number only in year and cgpa/percentage.</p></br>');
                                error = 1;
                            }
                        }

                    }
                }
            }

            if (graduation.checked) {
                var graduateBoard = $('.graduate_board').val();
                var graduateYear = $('.graduate_year').val();
                var graduatePer = $('.graduate_per').val();

                if (graduateBoard == "" || graduateYear == "" || graduatePer == "") {
                    $('.err-graduate').after('<p class="btn-cl-error" style="color:red">Please enter graduation details.</p>');
                    error = 1;
                } else {
                    if (graduateYear != "" || graduatePer != "") {
                        var regex = /^\d*[.]?\d*$/;

                        if (graduateYear != "") {
                            if (!regex.test(graduateYear)) {
                                $(".err-graduate").empty();
                                $('.err-graduate').after('<p class="btn-cl-error" style="color:red">Please enter number only in year and cgpa/percentage.</p></br>');
                                error = 1;
                            }
                        }

                    }
                }
            }

            if (master_degree.checked) {
                var masterBoard = $('.master_board').val();
                var masterYear = $('.master_year').val();
                var masterPer = $('.master_per').val();

                if (masterBoard == "" || masterYear == "" || masterPer == "") {
                    $('.err-master').after('<p class="btn-cl-error" style="color:red">Please enter master degree details.</p>');
                    error = 1;
                } else {
                    if (masterYear != "" || masterPer != "") {
                        var regex = /^\d*[.]?\d*$/;

                        if (masterYear != "") {
                            if (!regex.test(masterYear)) {
                                $(".err-master").empty();
                                $('.err-master').after('<p class="btn-cl-error" style="color:red">Please enter number only in year and cgpa/percentage.</p></br>');
                                error = 1;
                            }
                        }
                    }
                }
            }
            if (hindi.checked) {
                if (!hindi_read.checked && !hindi_write.checked && !hindi_speak.checked) {
                    $('.err-hindi').after('<p class="btn-cl-error" style="color:red">Please select atleat one language proficiency.</p>');
                    error = 1;
                }
            }
            if (english.checked) {
                if (!english_read.checked && !english_write.checked && !english_speak.checked) {
                    $('.err-english').after('<p class="btn-cl-error" style="color:red">Please select atleat one language proficiency.</p>');
                    error = 1;

                }
            }
            if (gujarati.checked) {
                if (!gujarati_read.checked && !gujarati_write.checked && !gujarati_speak.checked) {
                    $('.err-guj').after('<p class="btn-cl-error" style="color:red">Please select atleat one language proficiency.</p>');
                    error = 1;

                }
            }

            $('.company').each(function(key) {
                if ($(this).val() == '') {
                    if ($(this).closest('.multi_div').find('.designation').val() != '' || $(this).closest('.multi_div').find('.from-date').val() != '' || $(this).closest('.multi_div').find('.to-date').val() != '') {
                        $(this).after('<p class="btn-cl-error" style="color:red">Please enter company name.</p>');
                        error = 1;
                    }
                }
            });
            $('.designation').each(function(key) {
                if ($(this).val() == '') {
                    if ($(this).closest('.multi_div').find('.company').val() != '' || $(this).closest('.multi_div').find('.from-date').val() != '' || $(this).closest('.multi_div').find('.to-date').val() != '') {
                        $(this).after('<p class="btn-cl-error" style="color:red">Please enter designation.</p>');
                        error = 1;
                    }
                }
            });
            $('.from-date').each(function(key) {
                if ($(this).val() == '') {
                    if ($(this).closest('.multi_div').find('.company').val() != '' || $(this).closest('.multi_div').find('.designation').val() != '' || $(this).closest('.multi_div').find('.to-date').val() != '') {
                        $(this).after('<p class="btn-cl-error" style="color:red">Please enter from date.</p>');
                        error = 1;
                    }
                }
            });
            $('.to-date').each(function(key) {
                if ($(this).val() == '') {
                    if ($(this).closest('.multi_div').find('.company').val() != '' || $(this).closest('.multi_div').find('.designation').val() != '' || $(this).closest('.multi_div').find('.from-date').val() != '') {
                        $(this).after('<p class="btn-cl-error" style="color:red">Please enter from date.</p>');
                        error = 1;
                    }
                }
            });
            if (error == 1) {
                return false;
            } else {
                $("#jobApplicationForm").submit();
                return true;
            }
        });

        var sessionCount = $('.input-company-count').val();
        if (sessionCount == 0) {
            addExperience();
        }
        $("#jobApplicationForm").on('click', '#remove_click', function() {
            removeClick(this);
        });

        function removeClick(rmbtn) {
            if ($('.work-experience-div').length > 1) {
                rmbtn.closest('.work-experience-div').remove();
                if ($('.work-experience-div').length == 1) {
                    $('.remove-work-experience-div ').hide();
                }
            } else {
                rmbtn.remove();
            }
        }

        $("#add_more_click").click(addExperience);

        function addExperience() {
            $.ajax({
                url: '{{ route("addWorkExperience") }}',
                type: "get",
                data: {
                    'number': 0,
                    'start': 0,
                    'id': ''
                },
                success: function(data) {
                    $('#work_experience_fields').append(data);
                    if ($('.work-experience-div').length == 1) {
                        $('.remove-work-experience-div').hide();
                    } else {
                        $('.remove-work-experience-div').show();
                    }
                }
            });
        }

    });
</script>