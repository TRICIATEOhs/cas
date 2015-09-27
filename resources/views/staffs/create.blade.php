@extends('app')

@section('title')
    COSBT | Add Staff
@stop

@section('content')


    <ol class="breadcrumb bc-3" >
        <li>
                <a href="index.html"><i class="fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{ action("StaffsController@index") }}">Manage Staff</a>
        </li>
        <li class="active">
            <strong>Add Staff</strong>
        </li>
    </ol>

    <h2>Add Staff</h2>
    <br />


    <div class="row">
        <div class="col-md-12">
            
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif
            
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Staff Details
                    </div>
                </div>

                
                    {!! Form::open(array('url' => 'staffs', 'class' => 'form-horizontal form-groups-bordered')) !!}
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                            <div class="col-sm-5">
                                <!-- name = actual attribute name, null = default value, third class = any additional parameter -->
                                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'field-1', 'placeholder' => 'Staff Name']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('staff_id', 'Staff ID:', ['class' => 'col-sm-3 control-label', 'for' => 'field-2']) !!}
                            <div class="col-sm-5">
                                <!-- name = actual attribute name, null = default value, third class = any additional parameter -->
                                {!! Form::text('staff_id', null, ['class' => 'form-control', 'id' => 'field-2', 'placeholder' => 'E.g. IC No']) !!}
                                <div style="margin-top: 5px;">Staff ID will be used as username for login</div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="panel-body" style="border-top: 1px solid #eee;">
                        <div class="form-group">
                            {!! Form::label('role', 'Role:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                            <div class="col-sm-5">
                                <div class="radio">Staff {!! Form::radio('role', 'Staff', true, ['onclick' => 'display_password("Staff");']) !!}</div>
                                <div class="radio">Admin {!! Form::radio('role', 'Admin', false, ['onclick' => 'display_password("Admin");']) !!}</div>
                            </div>
 
                        </div>

                        <div class="form-group" id ="password_field">
                            {!! Form::label('password', 'Password:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                            <div class="col-sm-5">
                                {!! Form::input('password','password', null, ['class' => 'form-control', 'id' => 'field-2', 'placeholder' => 'Password']) !!}
                            </div>
                        </div>

                        <div class="form-group" id="confirm_password_field">
                            {!! Form::label('confirm_password', 'Confirm Password:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                            <div class="col-sm-5">
                                {!! Form::input('password','confirm_password', null, ['class' => 'form-control', 'id' => 'field-2', 'placeholder' => 'Confirm Password']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                               {!! Form::submit('Add Staff', ['class' => 'btn btn-default']) !!} 
                            </div>
                        </div>
                        
                    </div>

                    {!! Form::close() !!}
                
            </div>


            </div>
    </div>
    
    <script>

        $( document ).ready(function() {
            $('#password_field').hide();
            $('#confirm_password_field').hide();
        });

        function display_password(role) {
            if(role == "Staff") {
                $('#password_field').hide();
                $('#confirm_password_field').hide();
            } else {
                $('#password_field').show();
                $('#confirm_password_field').show();
            }//end if else

        }//end function display_password

    </script>
@stop
		

