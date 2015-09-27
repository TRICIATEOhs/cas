<?php

namespace App\Http\Controllers;

//need to import this
use App\Attendance;
use App\Congregation;
use App\Staff;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $attendances = Attendance::get_all_attendances();
        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $congregation_list = Congregation::lists('name', 'id');
        $staff_list = Staff::lists('name', 'id');
        $congregations = Congregation::get_all_congregations();
        return view('attendances.create', compact('congregations', 'congregation_list', 'staff_list'));
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
        $this->validate($request, ['service_date' => 'required', 'regular_count' => 'required', 'visitor_count' => 'required']);
        //Store method is responsible for throwing data into database, and redirect to somewhere else
        $input = $request->all();
        $congregation = Congregation::get_congregation($input['congregation_id']);
        
        $attendance = Attendance::create_new_attendance($input);
        $congregation = Congregation::get_congregation($attendance->congregation_id);
        $staff = Staff::get_staff($attendance->staff_id);
        $message = 'New Attendance for "'. $congregation->name . '" has been created successfully.';
        return view('attendances.show', compact('attendance', 'message', 'congregation', 'staff'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $attendance = Attendance::get_attendance($id);
        $congregation = Congregation::get_congregation($attendance->congregation_id);
        $staff = Staff::get_staff($attendance->staff_id);
        $message = null;
        //use compact('staff'), so can reference $staff in view page
        return view('attendances.show', compact('attendance', 'message', 'congregation', 'staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $attendance = Attendance::get_attendance($id);
        $congregation_list = Congregation::lists('name', 'id');
        $staff_list = Staff::lists('name', 'id');
        return view('attendances.edit', compact('attendance', 'congregation_list', 'staff_list'));
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
        $this->validate($request, ['service_date' => 'required', 'regular_count' => 'required', 'visitor_count' => 'required']);
        //Store method is responsible for throwing data into database, and redirect to somewhere else
        $input = $request->all();

        Attendance::edit_attendance($input, $id);
        $attendance = Attendance::get_attendance($id);
        $congregation = Congregation::get_congregation($attendance->congregation_id);
        $staff = Staff::get_staff($attendance->staff_id);
        $message = 'Attendance for "'. $congregation->name . '" has been updated successfully.';
        return view('attendances.show', compact('attendance', 'message', 'congregation', 'staff'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $attendance = Attendance::get_attendance($id);
        $congregation = Congregation::get_congregation($attendance->congregation_id);
        $deleted_message = 'Attendance for "' . $congregation->name . '" on ' . $attendance->service_date . ' has been deleted successfully.';
        Attendance::destroy_attendance($id);
        
        return redirect('attendances')->withSuccess($deleted_message);
    }
}
