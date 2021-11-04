@extends('layouts.system.master')
@section('title', "Task" ) 
@section('titleicon', "fa fa-cog") 

@section('pagecss') 
@endsection

@section('content')
  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                   {!! Form::select('state', array(""=>"Select State")+$statusList, null, array('id'=> 'state', 'data-toggle'=>'tooltip', 'class'=>'form-control select2','data-placement'=>'top', 'title'=> 'Phone State')) !!}
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                   {!! Form::select('country', array(""=>"Select Country")+$countriesList, null, array('id'=> 'country', 'data-toggle'=>'tooltip', 'class'=>'form-control select2','data-placement'=>'top', 'title'=> 'Phone Country')) !!}
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
              <table id="phones_table" class="table table-bordered table-hover table-responsive">
                <thead>
                 <tr>
                  <th>Conutry</th>
                  <th>State</th>
                  <th>Country Code</th>
                  <th>Name</th>
                  <th>Phone</th>
                </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
  
@section('pagejs')
<script type="text/javascript">
  var submitToken = '{{ csrf_token() }}';

  var stateBadges = [];
  stateBadges["Valid"] = "state-valid";
  stateBadges["Invalid"] = "state-invalid";

  $(document).ready(function() {
    var table = $('#phones_table').DataTable({
      processing: false,
      serverSide: true,
      scrollX: true,
      stateSave: false,
      rowId: 'id',
      "ajax": {
          "url": '{{ route('home') }}',
          "dataSrc": "data.data"
      },
      "columns": [
        {"width": "10%","data": "country", "name": "country" },
        {"width": "10%","data": "state", "name": "state",

        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {

          $(nTd).html("<span class='badge-style "+stateBadges[oData.state]+"'>"+oData.state+"</span>");    
        }},

        {"width": "5%","data": "code", "name": "code",
          fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          $(nTd).html("<span class='action-column'> +"+oData.code+"</span>");      
        }},
        {"width": "10%","data": "name", "name": "name" },
        {"width": "10%","data": "phone", "name": "phone"}, 
        ],
      "searchCols": [
        null,
        null,
        null,
         ]
        });
      $(".dataTables_filter").hide();
        $('#search_button').on('click', function () {
          table.search($("#text_search").val());
          table.columns(1).search($("#country").val());
          table.columns(2).search($("#state").val());
          table.draw();
      });

      $('#text_search').on('keyup', function (e){
        if(e.keyCode == 13)
          $('#search_button').trigger('click');
      });
            
      $('#reset_button').on('click', function () {
        $("#state").val("");
        $("#country").val("");
        $('#search_button').trigger('click');
      });
  });
</script>
@stop

