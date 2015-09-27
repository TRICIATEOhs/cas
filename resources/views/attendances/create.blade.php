@extends('app')

@section('title')
    COSBT | Add Attendance
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

            <strong>Add Attendance</strong>
        </li>
    </ol>
					
    <h2>Add Attendance</h2>
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
                        Attendance Details
                    </div>
                </div>

                {!! Form::open(array('url' => 'attendances', 'class' => 'form-horizontal form-groups-bordered')) !!}
                
                <div class="panel-body">

                    <div class="form-group">
                        {!! Form::label('congregation_id', 'Congregation:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                        <div class="col-sm-5">
                            {!! Form::select('congregation_id', $congregation_list, null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('service_date', 'Service Date:', ['class' => 'col-sm-3 control-label', 'for' => 'field-2']) !!}
                        <div class="col-sm-5">
                            <div class="input-group">
                                {!! Form::text('service_date', null, ['class' => 'form-control datepicker', 'id' => 'field-2', 'data-format' => 'yyyy-mm-dd']) !!}
                                <div class="input-group-addon">
                                    <a href="#"><i class="entypo-calendar"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('regular_count', 'Regular Count:', ['class' => 'col-sm-3 control-label', 'for' => 'field-3']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('regular_count', null, ['class' => 'form-control wholenumbers', 'id' => 'field-3', 'placeholder' => 'Regular Count']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('visitor_count', 'Visitor Count:', ['class' => 'col-sm-3 control-label', 'for' => 'field-4']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('visitor_count', null, ['class' => 'form-control wholenumbers', 'id' => 'field-4', 'placeholder' => 'Visitor Count']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('remarks', 'Remarks:', ['class' => 'col-sm-3 control-label', 'for' => 'field-5']) !!}
                        <div class="col-sm-5">
                            {!! Form::text('remarks', null, ['class' => 'form-control', 'id' => 'field-5', 'placeholder' => 'Remarks']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('staff_id', 'Staff ID:', ['class' => 'col-sm-3 control-label', 'for' => 'field-6']) !!}
                        <div class="col-sm-5">
                            {!! Form::select('staff_id', $staff_list, null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                           {!! Form::submit('Add Attendance', ['class' => 'btn btn-default']) !!} 
                        </div>
                    </div>

                </div>
                {!! Form::close() !!}

            </div>

        </div>
    </div>


@stop