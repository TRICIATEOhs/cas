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

            <strong>View All Attendances</strong>
        </li>
    </ol>

    <h2>View All Attendances</h2>
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
                        <th>Congregation</th>
                        <th>Service Date</th>
                        <th>Regular Count</th>
                        <th>Visitor Count</th>
                        <th>Staff ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($attendances as $attendance)
                     <tr class="odd gradeX">
                         <td>{{ $attendance->congregation_name }}</td>
                         <td>{{ $attendance->service_date }}</td>
                         <td>{{ $attendance->regular_count }}</td>
                         <td>{{ $attendance->visitor_count }}</td>
                         <td>{{ $attendance->staff_name }}</td>
                         <td class="center">
                             {!! Html::linkAction('AttendancesController@show', 'View', array($attendance->id), array('class'=>'btn btn-warning')) !!}
                             {!! Html::linkAction('AttendancesController@edit', 'Edit', array($attendance->id), array('class'=>'btn btn-orange')) !!}
                             {!! Html::linkAction('AttendancesController@destroy', 'Delete', array($attendance->id), array('class'=>'btn btn-red')) !!}
                         </td>
                     </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Congregation</th>
                        <th>Service Date</th>
                        <th>Regular Count</th>
                        <th>Visitor Count</th>
                        <th>Staff ID</th>
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