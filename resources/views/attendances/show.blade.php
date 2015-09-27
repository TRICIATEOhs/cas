@extends('app')

@section('title')
    COSBT | View Attendance
@stop

@section('content')


    <ol class="breadcrumb bc-3" >
        <li>
                <a href="index.html"><i class="fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{ action("AttendancesController@index") }}">Manage Attendance</a>
        </li>
        <li class="active">
            <strong>View Attendance</strong>
        </li>
    </ol>

    <h2>View Attendance</h2>
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
                        Attendance Details
                    </div>
                </div>
                
                    <div class="form-horizontal form-groups-bordered">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                {!! Form::label('congregation_id', 'Congregation:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('congregation_id', $congregation->name, ['class' => 'form-control', 'id' => 'field-1']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('service_date', 'Service Date:', ['class' => 'col-sm-3 control-label', 'for' => 'field-2']) !!}
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        {!! Form::label('service_date', $attendance->service_date, ['class' => 'form-control', 'id' => 'field-2']) !!}
                                        <div class="input-group-addon">
                                            <a href="#"><i class="entypo-calendar"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                {!! Form::label('regular_count', 'Regular Count:', ['class' => 'col-sm-3 control-label', 'for' => 'field-3']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('regular_count', $attendance->regular_count, ['class' => 'form-control', 'id' => 'field-3']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('visitor_count', 'Visitor Count:', ['class' => 'col-sm-3 control-label', 'for' => 'field-4']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('visitor_count', $attendance->visitor_count, ['class' => 'form-control', 'id' => 'field-4']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('remarks', 'Remarks:', ['class' => 'col-sm-3 control-label', 'for' => 'field-5']) !!}
                                <div class="col-sm-5">
                                    @if($attendance->remarks != "")
                                        {!! Form::label('remarks', $attendance->remarks, ['class' => 'form-control', 'id' => 'field-5']) !!}
                                    @else
                                        {!! Form::label('remarks', '-', ['class' => 'form-control', 'id' => 'field-5']) !!}
                                    @endif
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('staff_id', 'Staff ID:', ['class' => 'col-sm-3 control-label', 'for' => 'field-6']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('staff_id', $staff->name, ['class' => 'form-control', 'id' => 'field-6']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    {!! Html::linkAction('AttendancesController@edit', 'Edit Attendance', array($attendance->id), array('class'=>'btn btn-orange')) !!}
                                </div>
                            </div>

                        </div>

                    </div>  
                 
                
            </div>


            </div>
    </div>
@stop
		
