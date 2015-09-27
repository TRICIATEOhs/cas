<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    // There are attributes that you allow users to change. If they try to change something else, it will be ignored.
        protected $table = 'staffs';
        protected $fillable = [
            'name',
            'staff_id',
            'role',
            'password'
        ];
        
        
        static public function get_all_staffs() {
            $staffs = DB::table('staffs')
                 ->orderBy('last_active', 'desc')
                 ->get();
            return $staffs;
        }
        
        static public function create_new_staff($input) {
            $staff = new Staff(['name' => $input['name'], 'staff_id' => $input['staff_id'], 'role' => $input['role']]);
            $staff->save();
            return $staff;
        }
        
        static public function create_new_admin($input) {
            $staff = new Staff(['name' => $input['name'], 'staff_id' => $input['staff_id'], 'role' => $input['role'], 'password' => $input['password']]);
            $staff->save();
            return $staff;
        }
        
        static public function get_staff($id) {
            $staff = DB::table('staffs')->where('id', $id)->first();
            return $staff;
        }
        
        static public function edit_staff_role($input, $id) {
            $staff = DB::table('staffs')
                ->where('id', $id)
                ->update(array('name' => $input['name'], 'staff_id' => $input['staff_id'], 'role' => $input['role']));
        }
        
        static public function edit_admin_role($input, $id) {
            $staff = DB::table('staffs')
                ->where('id', $id)
                ->update(array('name' => $input['name'], 'staff_id' => $input['staff_id'], 'role' => $input['role'], 'password' => $input['password']));
        }
        
        static public function destroy_staff($id) {
            DB::table('staffs')->where('id', $id)->delete();
        }

}
