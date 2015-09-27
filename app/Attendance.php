<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    
        protected $table = 'attendances';
        protected $fillable = [
            'congregation_id',
            'staff_id',
            'service_date',
            'regular_count',
            'visitor_count',
            'remarks'
        ];
        
        //[DISCLAIMER] I have no idea why this doesn't work. Not able to $attendance->congregation->name
        public function congregation()
        {
            return $this->belongsTo('App\Congregation', 'congregation_id', 'id');
        }
        
        static public function create_new_attendance($input) {
            $attendance = new Attendance(['congregation_id' => $input['congregation_id'], 'staff_id' => $input['staff_id'], 'service_date' => $input['service_date'], 'regular_count' => $input['regular_count'], 'visitor_count' => $input['visitor_count'], 'remarks' => $input['remarks']]);
            $attendance->save();
            return $attendance;
        }
        
        static public function get_attendance($id) {
            $attendance = DB::table('attendances')->where('id', $id)->first();
            return $attendance;
        }
        
        static public function get_all_attendances() {
            //$attendances = DB::table('attendances')
            //     ->orderBy('congregation_id', 'asc')
            //     ->get();

            $attendances = DB::table('attendances')
            ->join('congregations', 'attendances.congregation_id', '=', 'congregations.id')
            ->join('staffs', 'attendances.staff_id', '=', 'staffs.id')
            ->select('attendances.*', 'congregations.name as congregation_name', 'staffs.name as staff_name')
            ->get();
            
            return $attendances;
        }
        
        static public function edit_attendance($input, $id) {
            $attendance = DB::table('attendances')
                ->where('id', $id)
                ->update(array('congregation_id' => $input['congregation_id'], 'staff_id' => $input['staff_id'], 'service_date' => $input['service_date'], 'regular_count' => $input['regular_count'], 'visitor_count' => $input['visitor_count'], 'remarks' => $input['remarks']));
        }
        
        static public function destroy_attendance($id) {
            DB::table('attendances')->where('id', $id)->delete();
        }
}
