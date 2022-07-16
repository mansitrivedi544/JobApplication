<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Roles;
use App\Models\Employee;

class AdminController extends Controller
{
    /* Login */
    public function login()
    {
        return view('admin.login');
    }


    /* Auth Login */
    public function submitLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'password.required' => 'Please enter password.',
                'email.required' => 'Please enter email.',
            ]
        );

        $role = Roles::where('role_name', "!=", "admin")->first();

        $otherRole = User::where(['email' => $request->email, 'role_id' => $role->id])->first();
        if (isset($otherRole) && !empty($otherRole)) {
            return redirect('login')->with('response', ['class' => 'danger', 'msg' => "You are not allowed to login from here"]);
        }

        $role = Roles::where('role_name', "admin")->first();

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
            'role_id'    =>  $role->id,
        ];

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect('dashboard')->with('response', ['class' => 'success', 'msg' => "You have successfully logged in"]);
        }
        return redirect('login')->with('response', ['class' => 'danger', 'msg' => "Sorry! You have entered invalid credentials"]);
    }


    /* Dashboard - Job Application List Page*/
    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.jobApplication');
        }
        return redirect('login')->with('response', ['class' => 'danger', 'msg' => "Opps! You do not have access"]);
    }

    /* Job Application List - get List */
    public function JobApplicationList(Request $request)
    {

        if (request()->ajax() == "true") {
            if (Auth::check()) {

                ## Read value
                $draw = $request->get('draw');
                // $start = $request->get("start");
                $rowperpage = $request->get("length"); // Rows display per page
                // $rowperpage = 1;

                $columnIndex_arr = $request->get('order');
                $columnName_arr = $request->get('columns');
                $order_arr = $request->get('order');
                $search_arr = $request->get('search');

                $columnIndex = $columnIndex_arr[0]['column']; // Column index
                $columnName = $columnName_arr[$columnIndex]['data']; // Column name
                $columnSortOrder = $order_arr[0]['dir']; // asc or desc
                $searchValue = $search_arr['value']; // Search value

                // Total records
                $totalRecords = Employee::select('count(*) as allcount')->count();
                $totalRecordswithFilter = Employee::select('count(*) as allcount')->whereRaw("(employee.id LIKE '%" . $searchValue . "%' OR employee.first_name LIKE '%" . $searchValue . "%' OR employee.last_name LIKE '%" . $searchValue . "%' OR employee.created_at LIKE '%" . $searchValue . "%')")
                    ->count();

                // Fetch records
                $records = Employee::select('employee.*')
                    ->whereRaw("(employee.id LIKE '%" . $searchValue . "%' OR employee.first_name LIKE '%" . $searchValue . "%' OR employee.last_name LIKE '%" . $searchValue . "%' OR employee.created_at LIKE '%" . $searchValue . "%')")                    // ->skip($start)
                    ->take($rowperpage)
                    ->orderBy($columnName, $columnSortOrder)
                    ->get();


                $data_arr = [];

                foreach ($records as $record) {
                    // $action = '<a class="btn btn-action btn-sm rounded-11" href="' . url('editJobApplication/' . $record->id) . '" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                    // <i class="fa fa-edit fa-lg editbtn"></i>
                    // </a>';
                    $action = '<a  href="' . url('editJobApplication/' . $record->id) . '" title="Edit"><i class="fa fa-edit fa-lg text-primary"></i></a>';
                    $action .= '<a  href="' . url('viewJobApplication/' . $record->id) . '" title="view"><i class="fa fa-eye fa-lg text-warning ml-1"></i></a>';
                    $action .= ' <a href="#" title="Delete" onclick="deleteJobApplication(' . $record->id . ')"><i class="fa fa-trash fa-lg text-danger"></i></a>';

                    // $action .= '<a class="btn btn-action btn-sm rounded-11" href="' . url('viewJobApplication/' . $record->id) . '" data-bs-toggle="tooltip" data-bs-original-title="view">
                    // <i class="fa fa-eye"></i>
                    // </a>';
                    $data_arr[] = [
                        "id" => $record->id,
                        "first_name" => $record->first_name,
                        "last_name" => $record->last_name,
                        "created_at" => $record->created_at,
                        "action" => $action,
                    ];
                }
                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordswithFilter,
                    "aaData" => $data_arr
                );
                // dd($response);
                return response()->json($response);
            } else {
                abort(404); //forbidden
            }
        } else {
            abort(404); //forbidden
        }
    }

    /* Logout */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
