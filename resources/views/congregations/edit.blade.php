@extends('app')

@section('title')
    COSBT | Edit Congregation
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
            <strong>Edit Congregation</strong>
        </li>
    </ol>

    <h2>Edit Congregation</h2>
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
                        Congregation Details
                    </div>
                </div>

                    {!! Form::open(array('url' => array('congregations/update', $congregation->id), 'class' => 'form-horizontal form-groups-bordered')) !!}
                    <div class="panel-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label', 'for' => 'field-1']) !!}
                            <div class="col-sm-5">
                                <!-- name = actual attribute name, null = default value, third class = any additional parameter -->
                                {!! Form::text('name', $congregation->name, ['class' => 'form-control', 'id' => 'field-1', 'placeholder' => 'Congregation Name']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('display_name', 'Frontend Display Name:', ['class' => 'col-sm-3 control-label', 'for' => 'field-2']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('display_name', $congregation->display_name, ['class' => 'form-control', 'id' => 'field-2', 'placeholder' => 'Congregation Frontend Display Name']) !!}
                                <div style="margin-top: 5px;">This will be displayed on frontend input form</div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('code', 'Code:', ['class' => 'col-sm-3 control-label', 'for' => 'field-3']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('code', $congregation->code, ['class' => 'form-control', 'id' => 'field-3', 'placeholder' => 'Congregation Code']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('day', 'Day:', ['class' => 'col-sm-3 control-label', 'for' => 'field-4']) !!}
                            <div class="col-sm-5">
                                <select class="form-control" name="day">
                                    
                                @for ($i = 0; $i < sizeof($day_array); $i++)
                                    @if($congregation->day == $i+1)
                                        <option value="{{$i+1}}" selected="{{$i+1}}"> {{ $day_array[$i] }}</option>
                                    @else
                                        <option value="{{$i+1}}"> {{ $day_array[$i] }}</option>
                                    @endif
                                @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('time', 'Time:', ['class' => 'col-sm-3 control-label', 'for' => 'field-5']) !!}
                            <div class="col-sm-2">
                                <div class="input-group">
                                    {!! Form::text('time', $congregation->time, ['class' => 'form-control timepicker', 'id' => 'field-5', 'data-template'=>'dropdown', 'data-show-meridian'=>'true', 'data-minute-step'=>'5']) !!}
                                    <div class="input-group-addon">
                                        <a href="#"><i class="entypo-clock"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                               {!! Form::submit('Update Congregation', ['class' => 'btn btn-default']) !!} 
                            </div>
                        </div>
                        
                    </div>

                    {!! Form::close() !!}
                
            </div>


            </div>
    </div>
@stop
		

