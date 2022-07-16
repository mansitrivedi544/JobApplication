@extends('layouts.mainLayout')

@section('content')
<?php

use Illuminate\Support\Facades\Session; ?>
<div class="register-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 topHead">
                <div class="card">
                    <h6 class="card-header"><b>Update Job Application</b></h6>
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
                        <form action="{{ route('updateJobApplication') }}" method="POST" id="jobApplicationForm">
                            @csrf
                            <input type="hidden" name="id" value="{{$employee->id}}">
                            <!-- Basic Details -->
                            <div class="card-header mb-4 text-center"><b>Basic Details</b></div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="first_name" placeholder="Enter first name" class="first-name form-control" name="first_name" value="{{old('first_name',$employee->first_name)}}" />
                                    @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="last_name"  placeholder="Enter last name" class="last-name form-control" name="last_name" value="{{old('last_name',$employee->last_name)}}" />
                                    @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address"  placeholder="Enter email" class="email form-control" name="email" value="{{old('email',$employee->email)}}" />
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{old('male',$employee->gender)=='male'?'checked':''}}>
                                        <label class="form-check-label" for="male">
                                            Male </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{old('female',$employee->gender)=='female'?'checked':''}}>
                                        <label class="form-check-label" for="female">
                                            Female </label>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <div class="form-check col-md-2 text-right">
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{old('other',$employee->gender)=='other'?'checked':''}}>
                                        <label class="form-check-label" for="other">
                                            Other </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>
                                <div class="col-md-6">
                                    <input type="text" id="age" placeholder="Enter age" maxlength="3" class="age form-control" name="age" value="{{old('age',$employee->age)}}" />
                                    @if ($errors->has('age'))
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea class="address form-control"  placeholder="Enter address" id="address" rows="3" name="address">{{old('address',$employee->address)}}</textarea>
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
                                        @foreach($workExperience as $exp)
                                        <div class="row multi_div work-experience-div mt-3">
                                            <div class="col-md-4 form-group experience-add"><span class="input-help ">
                                                    <label class="form-label mt-1">Company</label>
                                                    <input type="text"  placeholder="Enter company" class="input-company form-control " id="company[]" name="company[]" aria-required="true" placeholder="Enter company name" value='{{old("company[]",$exp->company_name)}}'></span>
                                            </div>
                                            <div class="col-md-4 form-group"><span class="input-help ">
                                                    <label class="form-label mt-1"> Designation </label>
                                                    <input type="text" placeholder="Enter designation" class="input-designation form-control " id="designation" name="designation[]" aria-required="true" placeholder="Enter designation" value='{{ old("designation[]",$exp->designation) }}'></span>
                                            </div>
                                            <div class="col-md-4 form-group experience-date">
                                                <label class="form-label mt-1">From Date</label><span class="input-help ">
                                                    <input type="date" id="from-date" class="form-control" name="from_date[]" value="{{old('from_date[]',$exp->from_date)}}" /> </span>
                                            </div>
                                            <div class="col-md-4 form-group experience-add"><span class="input-help ">
                                                    <label class="form-label mt-1">To Date</label>
                                                    <input type="date" id="to-date" class="form-control" name="to_date[]" value="{{old('to_date[]',$exp->to_date)}}" /> </span>
                                            </div>

                                            <div class="col-md-1 form-group">
                                                <button type="button" id="remove_click" class="remove-work-experience-div btn btn-danger remove-btn">-</button>
                                            </div><br>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- preference -->
                            <div class="card-header mb-4 text-center"><b>preference</b></div>
                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">Prefered Location</label>
                                <div class="col-md-6">
                                    <select class="location form-select form-control" aria-label="Default" name="prefered_location">
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
                                    <input type="text" id="expected_ctc" placeholder="Enter expected CTC" class="expected form-control" name="expected_ctc" value="{{old('expected_ctc',$preference->expected_ctc)}}" />
                                    @if ($errors->has('expected_ctc'))
                                    <span class="text-danger">{{ $errors->first('expected_ctc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Current CTC</label>
                                <div class="col-md-6">
                                    <input type="text" id="current_ctc" placeholder="Enter current CTC" class="current form-control" name="current_ctc" value="{{old('current_ctc',$preference->current_ctc)}}" />
                                    @if ($errors->has('current_ctc'))
                                    <span class="text-danger">{{ $errors->first('current_ctc') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="notice_period" class="col-md-4 col-form-label text-md-right">Notice Period</label>
                                <div class="col-md-6">
                                    <input type="number" placeholder="Enter notice period" min="0" id="notice_period" class="notice-period form-control" name="notice_period" value="{{old('notice_period',$preference->notice_period)}}" />
                                    @if ($errors->has('notice_period'))
                                    <span class="text-danger">{{ $errors->first('notice_period') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="" class="btn btn-danger" title="cancel">
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
        $("#jobApplicationForm").submit(function(event) {

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
            // alert(error);
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