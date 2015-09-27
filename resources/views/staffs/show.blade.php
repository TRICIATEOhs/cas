@extends('app')

@section('title')
    COSBT | View Staff
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
            <strong>View Staff</strong>
        </li>
    </ol>

    <h2>View Staff</h2>
    <br />


    <div class="row">
        <div class="col-md-12">

            @if($message)
            <div class="alert alert-success">
                 {{ $message }}
            </div>
            @endif
            
            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        Staff Details
                    </div>
                </div>
                
                    <div class="form-horizontal form-groups-bordered">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                                <div class="col-sm-5">
                                    <!-- name = actual attribute name, null = default value, third class = any additional parameter -->
                                    {!! Form::label('name', $staff->name, ['class' => 'form-control', 'id' => 'field-1']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('staff_id', 'Staff ID:', ['class' => 'col-sm-3 control-label', 'for' => 'field-2']) !!}
                                <div class="col-sm-5">
                                    <!-- name = actual attribute name, null = default value, third class = any additional parameter -->
                                    {!! Form::label('staff_id', $staff->staff_id, ['class' => 'form-control', 'id' => 'field-2']) !!}
                                    <div style="margin-top: 5px;">Staff ID will be used as username for login</div>
                                </div>
                            </div>

                        </div>

                        <div class="panel-body" style="border-top: 1px solid #eee;">
                            <div class="form-group">
                                {!! Form::label('role', 'Role:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('role', $staff->role, ['class' => 'form-control', 'id' => 'field-2']) !!}
                                </div>

                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    {!! Html::linkAction('StaffsController@edit', 'Edit Staff', array($staff->id), array('class'=>'btn btn-orange')) !!}
                                </div>

                            </div>

                        </div>
                    </div>  
                 
                
            </div>


            </div>
    </div>
@stop
		
