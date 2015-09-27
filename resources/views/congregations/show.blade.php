@extends('app')

@section('title')
    COSBT | View Congregation
@stop

@section('content')


    <ol class="breadcrumb bc-3" >
        <li>
                <a href="index.html"><i class="fa-home"></i>Home</a>
        </li>
        <li>
            <a href="{{ action("CongregationsController@index") }}">Manage Congregation</a>
        </li>
        <li class="active">
            <strong>View Congregation</strong>
        </li>
    </ol>

    <h2>View Congregation</h2>
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
                        Congregation Details
                    </div>
                </div>
                
                    <div class="form-horizontal form-groups-bordered">
                        <div class="panel-body">
                            
                            <div class="form-group">
                                {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('name', $congregation->name, ['class' => 'form-control', 'id' => 'field-1']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('display_name', 'Frontend Display Name:', ['class' => 'col-sm-3 control-label', 'for' => 'field-2']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('display_name', $congregation->display_name, ['class' => 'form-control', 'id' => 'field-2']) !!}
                                    <div style="margin-top: 5px;">This will be displayed on frontend input form</div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                {!! Form::label('code', 'Code:', ['class' => 'col-sm-3 control-label', 'for' => 'field-3']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('code', $congregation->code, ['class' => 'form-control', 'id' => 'field-3']) !!}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('day', 'Day:', ['class' => 'col-sm-3 control-label', 'for' => 'field-4']) !!}
                                <div class="col-sm-5">
                                    {!! Form::label('code', $day_array[($congregation->day)-1], ['class' => 'form-control', 'id' => 'field-4']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('time', 'Time:', ['class' => 'col-sm-3 control-label', 'for' => 'field-5']) !!}
                                <div class="col-sm-2">
                                    <div class="input-group">
                                        {!! Form::label('time', $congregation->time, ['class' => 'form-control timepicker', 'id' => 'field-5']) !!}
                                        <div class="input-group-addon">
                                            <a href="#"><i class="entypo-clock"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    {!! Html::linkAction('CongregationsController@edit', 'Edit Congregation', array($congregation->id), array('class'=>'btn btn-orange')) !!}
                                </div>
                            </div>

                        </div>

                    </div>  
                 
                
            </div>


            </div>
    </div>
@stop
		
