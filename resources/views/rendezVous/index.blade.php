@extends('layouts.admin')

<div class="wrapper">

    @section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-md-8">
          <div class="col">
            
            <!-- <h1>Bienvenue</h1> -->
            <div class="row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('Vous etes connecte en tant que administrateur') }} -->
                    <br><br>

                    <h1>La liste des demandes enregistres</h1><br>
                    
                    <table class="table table-bordered  table-striped datatable" style="width:960px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>N°</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Type Envoi</th>
                                <th>Observations</th>
                                <th width="180px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>  
</div>


@endsection
<!-- <script src="{{ asset('jquery/jquery.js') }}"></script>  -->
<script src="{{ asset('js/app.js') }}"></script> 
<script src="{{ asset('jquery/jquery.validate.js') }}"></script> 
<script src="{{ asset('DataTables/DataTables-1.10.24/js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('DataTables/DataTables-1.10.24/js/dataTables.bootstrap.min.js') }}"></script> 


<script type="text/javascript">

$(function(){
  $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    var table = $('.datatable').DataTable({
        "pageLenght": 5,
        processing: true,
        serverSide: true,
        ajax: "{{ route('rendezVous.index') }}",
        columns: [
            {data: 'checkbox', name: 'checkbox'},
            {data: 'id', name: 'rendezvouses.id'},
            {data: 'prenom', name: 'passe_sanitaires.prenom'},
            {data: 'nom', name: 'passe_sanitaires.nom'},
            {data: 'date', name: 'date'},
            {data: 'heure', name: 'heure'},
            {data: 'type_envoi', name: 'type_envoi'},
            {data: 'observation', name: 'observation'},
            
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
      // delete
  $('body').on('click', '.deletePS', function (){
            var passe_sanitaire_id = $(this).data("id");
            var result = confirm("Etes vous sur de le supprimer !");
            if(result){
                $.ajax({
                  headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
                    type: "DELETE",
                    url: "{{ route('admins.store') }}"+'/'+passe_sanitaire_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }else{
                return false;
            }
        });

     
    });

  
</script>


