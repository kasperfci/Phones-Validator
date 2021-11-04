@extends('layouts.system.master')
@section('title', "Logs" ) 
@section('subtitle', "All System Logs")
@section('titleicon', "fa fa-list")

@section('pagecss')

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                     {!! Form::select('model', array(""=>"Select Module")+$models, null, array('id'=> 'model', 'data-toggle'=>'tooltip', 'class'=>'form-control select2','data-placement'=>'top', 'title'=> 'Module')) !!}
          
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    {!! Form::select('log_type', array(""=>"Select Log Type")+$logTypes, null, array('id'=> 'log_type', 'data-toggle'=>'tooltip', 'class'=>'form-control select2','data-placement'=>'top', 'title'=> 'Log Type')) !!}

                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <input type="datetime-local" class="form-control" name="from" id="from">

                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <input type="datetime-local" class="form-control"  name="to" id="to">

                  </div>
                </div>


                <div class="col-md-2">
                  <div class="form-group">
                   
                    <input type="text" class="form-control" id="text_search" name="text_search" placeholder="Text Search">
                  </div>
                </div>

                <div class="col-md-2 float">
                    <button type="button" id="search_button" class="btn btn-primary" style="width: 100%">Search</button>
                 
                </div>

                <div class="col-md-2 float">
                    <button type="button" id="reset_button" class="btn btn-secondary" style="width: 100%">Reset</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="logs_table" class="table table-bordered table-hover">
                <thead>
                <tr>  
                  <td>User</td>
                  <td>Description</td>
                  <td>Date</td>
                  <td></td>
                  <td></td>
                </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->


@endsection

@section('pagejs')

<script src="/assets/system/factory.js"></script>
<!-- AdminLTE App -->
    <script type="text/javascript">
        $(document).ready(function() {
            var show = '{{ route('show_log', ['log'=>'#id']) }}';
            var table = $('#logs_table').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                stateSave: false,
                order: [[ 0, "desc" ]],
                rowId: 'id',
                "ajax": {
                    "url": '{{ route('logs') }}',
                    "dataSrc": "data.data"
                },
                "columns": [
               
                    {"width":"10%", "data": "full_name", "name": "full_name"},
                    {"width":"40%", "data": "description", "name": "description"},
                    
                    {"width":"10%", "data": "date", "name": "date"},
                    {"data": "id", "name": "id" ,"visible":false,
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                             var html = "";
                           if(oData.can_be_viewed==1){
                           
                            var url = show.replace('#id', oData.id);
                            html = "<a href='"+url+"'><i class='fa fa-eye'></i></a>";
                            $(nTd).html(html);
                        }else{
                            $(nTd).html(html);
                        }
                        }
                    },    {"data": "id", "name": "id" ,"visible":false}, 
                ],
            });

            $(".dataTables_filter").hide();

            $('#search_button').on('click', function () {
                table.search($("#text_search").val());
                table.columns(1).search($("#from").val());
                table.columns(2).search($("#to").val());
                table.columns(3).search($("#log_type").val());
                table.columns(4).search($("#model").val());
                table.draw();
            }); 

            $('#text_search').on('keyup', function (e) {
                if (e.keyCode == 13)
                    $('#search_button').trigger('click');
            });

            $('#reset_button').on('click', function () {
                $("#from").val("")
                $("#to").val("");
                $("#text_search").val("");
                $("#log_type").val("");
                $("#model").val("");
                $('#search_button').trigger('click');
            });
        });
    </script>
@endsection

