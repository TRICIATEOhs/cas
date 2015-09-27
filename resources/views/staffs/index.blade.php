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

            <strong>View All Staffs</strong>
        </li>
    </ol>
					
    <h2>View All Staffs</h2>
    <br />

    <!-- @foreach($staffs as $staff) 
        {{ $staff->name }}
    @endforeach -->

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
                        <th width="20%">Name</th>
                        <th width="20%">Staff ID</th>
                        <th width="20%">Role</th>
                        <th width="20%">Last Active</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($staffs as $staff)
                    <tr class="odd gradeX">
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->staff_id }}</td>
                        <td>{{ $staff->role }}</td>
                        <td>{{ $staff->last_active }}</td>
                        <td class="center">
                            {!! Html::linkAction('StaffsController@show', 'View', array($staff->id), array('class'=>'btn btn-warning')) !!}
                            {!! Html::linkAction('StaffsController@edit', 'Edit', array($staff->id), array('class'=>'btn btn-orange')) !!}
                            {!! Html::linkAction('StaffsController@destroy', 'Delete', array($staff->id), array('class'=>'btn btn-red')) !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Staff ID</th>
                        <th>Role</th>
                        <th>Last Active</th>
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