<?php

namespace App\Http\Controllers;

//need to import this
use App\Congregation;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class CongregationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $congregations = Congregation::get_all_congregations();
        $day_array = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        return view('congregations.index', compact('congregations', 'day_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('congregations.create');
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
        $this->validate($request, ['name' => 'required', 'display_name' => 'required', 'code' => 'required', 'day' => 'required', 'time' => 'required']);
        //Store method is responsible for throwing data into database, and redirect to somewhere else
        $input = $request->all();
        
        $congregation = Congregation::create_new_congregation($input);
        $message = 'New Congregation "'. $congregation->name . '" has been created successfully.';
        return view('congregations.show', compact('congregation', 'message'));

    } //end store

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $congregation = Congregation::get_congregation($id);
        $day_array = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $message = null;
        //use compact('staff'), so can reference $staff in view page
        return view('congregations.show', compact('congregation', 'message', 'day_array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $congregation = Congregation::get_congregation($id);
        $day_array = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        return view('congregations.edit', compact('congregation', 'day_array'));
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
        $this->validate($request, ['name' => 'required', 'display_name' => 'required', 'code' => 'required', 'day' => 'required', 'time' => 'required']);
        //Store method is responsible for throwing data into database, and redirect to somewhere else
        $input = $request->all();

        Congregation::edit_congregation($input, $id);
        $congregation = Congregation::get_congregation($id);
        
        $message = 'Congregation "'. $congregation->name . '" has been updated successfully.';
        $day_array = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        return view('congregations.show', compact('congregation', 'message', 'day_array'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $congregation = Congregation::get_congregation($id);
        $deleted_message = 'Congregation "' . $congregation->name . '" has been deleted successfully.';
        Congregation::destroy_congregation($id);
        
        return redirect('congregations')->withSuccess($deleted_message);
    }
}
