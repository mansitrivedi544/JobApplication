<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Language;
use App\Models\Preference;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;
use App\Models\TechnicalExperience;
use App\Models\WorkExperience;

class EmployeeController extends Controller
{
    /* Job Application - register */
    public function jobApplication()
    {
        return view('employee.register');
    }

    /* Job Application - submit */
    public function submitJobApplication(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                // 'contact' => 'required|numeric',
                'expected_ctc' => 'required|numeric',
                'current_ctc' => 'required|numeric',
                'notice_period' => 'required|numeric',
            ],
            [
                'first_name.required' => 'Please enter first name.',
                'last_name.required' => 'Please enter last name.',
                'email.required' => 'Please enter email.',
                'email.email' => 'Please enter valid email.',
                // 'contact.required' => 'Please enter contact number.',
                // 'contact.numeric' => 'Please enter only number.',
                'expected_ctc.required' => 'Please enter expected ctc.',
                'expected_ctc.numeric' => 'Please enter only number.',
                'current_ctc.required' => 'Please enter current ctc.',
                'current_ctc.numeric' => 'Please enter only number.',
                'notice_period.required' => 'Please enter notice_period.',
                'notice_period.numeric' => 'Please enter only number.',
            ]
        );

        //employee details
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        // $employee->contact = $request->contact;
        $employee->age = $request->age;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        // $role = Roles::where('role_name', "employee")->first();
        // $employee->role_id = $role->id;

        if ($employee->save()) {
            //education details

            if (isset($request->ssc)) {
                $education = new Education();
                $education->employee_id = $employee->id;
                $education->education_name = "ssc";
                $education->percentage = $request->ssc_per;
                $education->year = $request->ssc_year;
                $education->board = $request->ssc_board;
                $education->save();
            }
            if (isset($request->hsc)) {
                $education = new Education();
                $education->employee_id = $employee->id;
                $education->education_name = "hsc";
                $education->percentage = $request->hsc_per;
                $education->year = $request->hsc_year;
                $education->board = $request->hsc_board;
                $education->save();
            }
            if (isset($request->graduation)) {
                $education = new Education();
                $education->employee_id = $employee->id;
                $education->education_name = "graduation";
                $education->percentage = $request->graduate_per;
                $education->year = $request->graduate_year;
                $education->board = $request->graduate_board;
                $education->save();
            }
            if (isset($request->master_degree)) {
                $education = new Education();
                $education->employee_id = $employee->id;
                $education->education_name = "master degree";
                $education->percentage = $request->master_per;
                $education->year = $request->master_year;
                $education->board = $request->master_board;
                $education->save();
            }
            //work experience
            if (isset($request->company) && !empty($request->company) && $request->company != "null") {
                foreach ($request->company as $key => $value) {
                    if (isset($request->company[$key]) && !empty($request->company[$key]) && $request->company[$key] != "null") {
                        $workExperience = new WorkExperience();
                        $workExperience->employee_id = $employee->id;
                        $workExperience->company_name = $request->company[$key];
                        $workExperience->designation = $request->designation[$key];
                        $workExperience->from_date = $request->from_date[$key];
                        $workExperience->to_date = $request->to_date[$key];
                        $workExperience->save();
                    }
                }
            }
            //known languages
            if (isset($request->hindi) && !empty($request->hindi) && $request->hindi != "null") {
                $language = new Language();
                $language->employee_id = $employee->id;
                $language->language = $request->hindi;
                $language->read = isset($request->hindi_read) ? 1 : 0;
                $language->write = isset($request->hindi_write) ? 1 : 0;
                $language->speak = isset($request->hindi_speak) ? 1 : 0;
                $language->save();
            }
            if (isset($request->english) && !empty($request->english) && $request->english != "null") {
                $language = new Language();
                $language->employee_id = $employee->id;
                $language->language = $request->english;
                $language->read = isset($request->english_read) ? 1 : 0;
                $language->write = isset($request->english_write) ? 1 : 0;
                $language->speak = isset($request->english_speak) ? 1 : 0;
                $language->save();
            }
            if (isset($request->gujarati) && !empty($request->gujarati) && $request->gujarati != "null") {
                $language = new Language();
                $language->employee_id = $employee->id;
                $language->language = $request->gujarati;
                $language->read = isset($request->gujarati_read) ? 1 : 0;
                $language->write = isset($request->gujarati_write) ? 1 : 0;
                $language->speak = isset($request->gujarati_speak) ? 1 : 0;
                $language->save();
            }
            //technical experience

            if (isset($request->php) && !empty($request->php) && $request->php != "null") {
                $techExperience = new TechnicalExperience();
                $techExperience->employee_id = $employee->id;
                $techExperience->language_name = $request->php;
                $techExperience->experience_level = $request->php_bme;
                $techExperience->save();
            }
            if (isset($request->mysql) && !empty($request->mysql) && $request->mysql != "null") {
                $techExperience = new TechnicalExperience();
                $techExperience->employee_id = $employee->id;
                $techExperience->language_name = $request->mysql;
                $techExperience->experience_level = $request->mysql_bme;
                $techExperience->save();
            }
            if (isset($request->laravel) && !empty($request->laravel) && $request->laravel != "null") {
                $techExperience = new TechnicalExperience();
                $techExperience->employee_id = $employee->id;
                $techExperience->language_name = $request->laravel;
                $techExperience->experience_level = $request->laravel_bme;
                $techExperience->save();
            }
            if (isset($request->oracle) && !empty($request->oracle) && $request->oracle != "null") {
                $techExperience = new TechnicalExperience();
                $techExperience->employee_id = $employee->id;
                $techExperience->language_name = $request->oracle;
                $techExperience->experience_level = $request->oracle_bme;
                $techExperience->save();
            }
            //preference
            $preference = new Preference();
            $preference->employee_id = $employee->id;
            $preference->prefered_location = $request->prefered_location;
            $preference->expected_ctc = $request->expected_ctc;
            $preference->current_ctc = $request->current_ctc;
            $preference->notice_period = $request->notice_period;
            $preference->save();
            return redirect('jobApplication')->with('response', ['class' => 'success', 'msg' => "Your apllication has been successfully submitted."]);
        }
        return redirect('jobApplication')->with('response', ['class' => 'danger', 'msg' => "oops! something went wrong."]);
    }
    /* for add more - Experience */
    public function addWorkExperience(Request $request)
    {
        if (request()->ajax() == "true") {

            $op = ' <div class="row multi_div work-experience-div mt-3">
            <div class="col-md-4 form-group experience-add"><span class="input-help ">
                    <label class="form-label mt-1">Company</label>
                    <input type="text" class="company form-control " id="company[]" name="company[]" aria-required="true" placeholder="Enter company name" value=' . old("company[]") . '></span>
            </div>
            <div class="col-md-4 form-group"><span class="input-help ">
                    <label class="form-label mt-1"> Designation </label>
                    <input type="text" class="designation form-control " id="designation" name="designation[]" aria-required="true" placeholder="Enter designation" value=' . old("designation[]") . '></span>
            </div>
  
            <div class="col-md-4 form-group experience-fromdate">
            <label class="form-label mt-1">From Date</label>
            <input type="date" id="from-date" class="from-date form-control"  name="from_date[]"  value=' . old("from_date[]") . ' />
            </div>
            <div class="col-md-4 form-group experience-add"><span class="input-help ">
            <label class="form-label mt-1">To Date</label>
            <input type="date" id="to-date" class="to-date form-control" name="to_date[]"  value=' . old("to_date[]") . '/> </span>
            </div>
  
            <div class="col-md-1 form-group ">
               <button type="button" id="remove_click" class="remove-work-experience-div btn btn-danger remove-btn" >-</button>
  
            </div><br>
        </div>';

            echo $op;
        } else {
            abort(404);
        }
    }

    /* Job Application - edit */
    public function editJobApplication($id)
    {
        $employee = Employee::where('id', $id)->first();
        $education = Education::where('employee_id', $id)->get();
        $workExperience = WorkExperience::where('employee_id', $id)->get();
        $lanuguage = Language::where('employee_id', $id)->get();
        $technicalExperience = TechnicalExperience::where('employee_id', $id)->get();
        $preference = Preference::where('employee_id', $id)->first();
        // dd($workExperience   );
        return view('employee.edit', compact('employee', 'education', 'workExperience', 'lanuguage', 'technicalExperience', 'preference'));
    }

    /* Job Application - update */
    public function updateJobApplication(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                // 'contact' => 'required|numeric',
                'expected_ctc' => 'required|numeric',
                'current_ctc' => 'required|numeric',
                'notice_period' => 'required|numeric',
            ],
            [
                'first_name.required' => 'Please enter first name.',
                'last_name.required' => 'Please enter last name.',
                'email.required' => 'Please enter email.',
                'email.email' => 'Please enter valid email.',
                // 'contact.required' => 'Please enter contact number.',
                // 'contact.numeric' => 'Please enter only number.',
                'expected_ctc.required' => 'Please enter expected ctc.',
                'expected_ctc.numeric' => 'Please enter only number.',
                'current_ctc.required' => 'Please enter current ctc.',
                'current_ctc.numeric' => 'Please enter only number.',
                'notice_period.required' => 'Please enter notice_period.',
                'notice_period.numeric' => 'Please enter only number.',
            ]
        );
        if ($request->id) {
            WorkExperience::where('employee_id', $request->id)->delete();
        }

        //employee details
        $employee = Employee::where('id', $request->id)->first();
        // dd( $employee);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        // $employee->contact = $request->contact;
        $employee->age = $request->age;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        // $role = Roles::where('role_name', "employee")->first();
        // $employee->role_id = $role->id;

        if ($employee->update()) {
            //work experience
            if (isset($request->company) && !empty($request->company) && $request->company != "null") {
                foreach ($request->company as $key => $value) {
                    if (isset($request->company[$key]) && !empty($request->company[$key]) && $request->company[$key] != "null") {
                        $workExperience = new WorkExperience();
                        $workExperience->employee_id = $employee->id;
                        $workExperience->company_name = $request->company[$key];
                        $workExperience->designation = $request->designation[$key];
                        $workExperience->from_date = $request->from_date[$key];
                        $workExperience->to_date = $request->to_date[$key];
                        $workExperience->save();
                    }
                }
            }
            //preference
            $preference = Preference::where('employee_id', $request->id)->first();
            $preference->employee_id = $employee->id;
            $preference->prefered_location = $request->prefered_location;
            $preference->expected_ctc = $request->expected_ctc;
            $preference->current_ctc = $request->current_ctc;
            $preference->notice_period = $request->notice_period;
            $preference->update();
            return redirect('dashboard')->with('response', ['class' => 'success', 'msg' => "Your apllication has been successfully updated."]);
        }
        return redirect('dashboard')->with('response', ['class' => 'danger', 'msg' => "oops! something went wrong."]);
    }


    /* job application - delete*/
    public function deleteJobApplication(Request $request)
    {
        if (request()->ajax() == "true") {
            $employee = Employee::where('id', $request->id)->first();
            if (isset($employee) && !empty($employee)) {
                $education = Education::whereIn('employee_id', [$request->id])->first();
                if (isset($education) && !empty($education)) {
                    Education::whereIn('employee_id', [$request->id])->delete();
                }
                $experienceData = WorkExperience::whereIn('employee_id', [$request->id])->first();
                if (isset($experienceData) && !empty($experienceData)) {
                    WorkExperience::whereIn('employee_id', [$request->id])->delete();
                }
                $language = Language::whereIn('employee_id', [$request->id])->first();
                if (isset($language) && !empty($language)) {
                    Language::whereIn('employee_id', [$request->id])->delete();
                }
                $technicalExperience = TechnicalExperience::whereIn('employee_id', [$request->id])->first();
                if (isset($technicalExperience) && !empty($technicalExperience)) {
                    TechnicalExperience::whereIn('employee_id', [$request->id])->delete();
                }
                $Preference = Preference::whereIn('employee_id', [$request->id])->first();
                if (isset($Preference) && !empty($Preference)) {
                    Preference::whereIn('employee_id', [$request->id])->delete();
                }
                $employee->delete();
                return true;
            } else {
                $res = ['error' => 0, 'msg' => 'something went wrong.'];
                return json_encode($res);
            }
        } else {
            abort(404);
        }
    }

    /* Job Application - view */
    public function viewJobApplication($id)
    {
        $employee = Employee::where('id', $id)->first();
        $education = Education::where('employee_id', $id)->get();
        $workExperience = WorkExperience::where('employee_id', $id)->get();
        $lanuguage = Language::where('employee_id', $id)->get();
        $technicalExperience = TechnicalExperience::where('employee_id', $id)->get();
        $preference = Preference::where('employee_id', $id)->first();
        // dd($workExperience   );
        return view('employee.view', compact('employee', 'education', 'workExperience', 'lanuguage', 'technicalExperience', 'preference'));
    }
}
