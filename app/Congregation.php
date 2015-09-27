<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
        protected $table = 'congregations';
        protected $fillable = [
            'name',
            'display_name',
            'code',
            'day',
            'time'
        ];
        
        public function attendances()
        {
            return $this->hasMany('App\Attendance');
        }
        
        static public function create_new_congregation($input) {
            $congregation = new Congregation(['name' => $input['name'], 'display_name' => $input['display_name'], 'code' => $input['code'], 'day' => $input['day'], 'time' => $input['time']]);
            $congregation->save();
            return $congregation;
        }
        
        static public function get_congregation($id) {
            $congregation = DB::table('congregations')->where('id', $id)->first();
            return $congregation;
        }
        
        static public function get_all_congregations() {
            $congregations = DB::table('congregations')
                 ->orderBy('name', 'asc')
                 ->get();
            return $congregations;
        }
        
        static public function edit_congregation($input, $id) {
            $congregation = DB::table('congregations')
                ->where('id', $id)
                ->update(array('name' => $input['name'], 'display_name' => $input['display_name'], 'code' => $input['code'], 'day' => $input['day'], 'time' => $input['time']));
        }
        
        static public function destroy_congregation($id) {
            DB::table('congregations')->where('id', $id)->delete();
        }

}
