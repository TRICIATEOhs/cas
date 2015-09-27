<?php

namespace App\Http\Controllers;

//need to import this
use App\Staff;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        //$staffs = DB::select('select * from staffs');
        $staffs = Staff::get_all_staffs();
        return view('staffs.index', compact('staffs'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {   
        //this validate method will validate the input fields before creating it into the database
        $this->validate($request, ['name' => 'required', 'staff_id' => 'required', 'role' => 'required']);
        //Store method is responsible for throwing data into database, and redirect to somewhere else
        $input = $request->all();
        
        if($input['role'] == "Staff") {
            //multiple ways to add into the database, this one of them
            $staff = Staff::create_new_staff($input);

        } else {
            //password validation
            if($input['password'] == "" || $input['confirm_password'] == "") {
                return Redirect::back()->withErrors(["The Password/Confirm password field is required."]);
            } else {
                if($input['password'] == $input['confirm_password']) {
                    // If Successful
                    $staff = Staff::create_new_admin($input);
                } else {
                    return Redirect::back()->withErrors(["Passwords do not match!"]);
                }
            } //end if else password is empty for admin

        }//end if else for user role

        $message = 'New Staff "'. $staff->name . '" has been created successfully.';
        return view('staffs.show', compact('staff', 'message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $staff = Staff::get_staff($id);
        $message = null;
        //use compact('staff'), so can reference $staff in view page
        return view('staffs.show', compact('staff', 'message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $staff = Staff::get_staff($id);
        return view('staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
        //this validate method will validate the input fields before creating it into the database
        $this->validate($request, ['name' => 'required', 'staff_id' => 'required', 'role' => 'required']);
        //Store method is responsible for throwing data into database, and redirect to somewhere else
        $input = $request->all();
        
        if($input['role'] == "Staff") {
            Staff::edit_staff_role($input, $id);

        } else {
            //password validation
            if($input['password'] == "" || $input['confirm_password'] == "") {
                return Redirect::back()->withErrors(["The Password/Confirm password field is required."]);
            } else {
                if($input['password'] == $input['confirm_password']) {
                    // If Successful
                    Staff::edit_admin_role($input, $id);
                } else {
                    return Redirect::back()->withErrors(["Passwords do not match!"]);
                }
            } //end if else password is empty for admin

        }//end if else for user role
        
        $staff = Staff::get_staff($id);
        $message = 'Staff "'. $staff->name . '" has been updated successfully.';
        return view('staffs.show', compact('staff', 'message'));
        //return redirect('staffs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $staff = Staff::get_staff($id);
        $deleted_message = 'Staff "' . $staff->name . '" has been deleted successfully.';
        Staff::destroy_staff($id);
        
        return redirect('staffs')->withSuccess($deleted_message);
        //return redirect('staffs');
    }
}
