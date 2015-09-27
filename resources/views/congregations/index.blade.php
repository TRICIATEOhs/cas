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

            <strong>View All Congregations</strong>
        </li>
    </ol>

    <h2>View All Congregations</h2>
    <br />


    <div class="row">
        <div class="col-md-12">

            @if( Session::has( 'success' ))
            <div class="alert alert-success">
                 {{ Session::get( 'success' ) }}
            </div>
            @endif
            
            
            <table class="table table-bordered datatable" id="table-1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Code</th>
                        <th>Day/Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($congregations as $congregation)
                     <tr class="odd gradeX">
                         <td>{{ $congregation->name }}</td>
                         <td>{{ $congregation->display_name }}</td>
                         <td>{{ $congregation->code }}</td>
                         <td>{{ $day_array[($congregation->day)-1] }} / {{ $congregation->time }}</td>
                         <td class="center">
                             {!! Html::linkAction('CongregationsController@show', 'View', array($congregation->id), array('class'=>'btn btn-warning')) !!}
                             {!! Html::linkAction('CongregationsController@edit', 'Edit', array($congregation->id), array('class'=>'btn btn-orange')) !!}
                             {!! Html::linkAction('CongregationsController@destroy', 'Delete', array($congregation->id), array('class'=>'btn btn-red')) !!}
                         </td>
                     </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Code</th>
                        <th>Day/Time</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>

            <script type="text/javascript">
                var responsiveHelper;
                var breakpointDefinition = {
                    tablet: 1024,
                    phone : 480
                };
                var tableContainer;

                        jQuery(document).ready(function($)
                        {
                                tableContainer = $("#table-1");

                                tableContainer.dataTable({
                                        "sPaginationType": "bootstrap",
                                        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                                        "bStateSave": true,


                                    // Responsive Settings
                                    bAutoWidth     : false,
                                    fnPreDrawCallback: function () {
                                        // Initialize the responsive datatables helper once.
                                        if (!responsiveHelper) {
                                            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
                                        }
                                    },
                                    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                                        responsiveHelper.createExpandIcon(nRow);
                                    },
                                    fnDrawCallback : function (oSettings) {
                                        responsiveHelper.respond();
                                    }
                                });

                        });
            </script>
        </div>
    </div>

@stop