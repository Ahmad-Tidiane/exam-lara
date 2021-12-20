@extends('layouts.admin')

<div class="wrapper" style="height:1000px">

    @section('content')
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
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
                    <div class="row">
                        <table class="table striped">
                            <!-- <div class="row"> -->
                                <thead>
                                        <tr>
                                            <th scope="col">Numero:</th>
                                            <td>{{ $passe_sanitaire->id}}</td>
                                            <th scope="col">Prenom:</th>
                                            <td>{{ $passe_sanitaire->prenom }}</td>
                                            <th scope="col">Nom:</th>
                                            <td>{{ $passe_sanitaire->nom }}</td>
                                            <th scope="col">Telephone:</th>
                                            <td>{{ $passe_sanitaire->telephone}}</td>
                                            <th scope="col">Email:</th>
                                            <td>{{ $passe_sanitaire->email }}</td>
                                        </tr>
                                </thead>
                        </table>
                    </div>
                    <!--  -->
                    <div class="container">
                        <div class="row">
                            <div class="col-8 ">
                                    <!-- les images -->
                    <!-- <div class="col-9"> -->
                        <div class="row row-cols-2">
                            <div class="col">
                                <label for="">Carte de vaccination Recto</label>
                                <img src="/img/cv_recto/{{ $passe_sanitaire->cv_recto }}" width="100%">
                            </div>
                            <div class="col">
                                <label for="">Carte de vaccination Verso</label>
                                <img src="/img/cv_verso/{{ $passe_sanitaire->cv_verso }}" width="100%">
                            </div> 
                        </div>

                        <div class="row row-cols-3">
                            <div class="col">
                                <label for="">CNI/Passeport Recto</label>
                                <a href="#">
                                    <img src="/img/cni_recto/{{ $passe_sanitaire->cni_recto}}" width="100%">
                                </a>
                            </div>
                            <div class="col">
                                <label for="">CNI/Passeport Verso</label>
                                <img src="/img/cni_verso/{{ $passe_sanitaire->cni_verso}}" width="100%">
                            </div>
                        </div>

                        <div class="row row-cols-4">
                            <div class="col-6">
                                <label for="">Billet / VISA / Autres</label>
                                <img src="/img/billet/{{ $passe_sanitaire->billet}}" width="100%">
                            </div>
                        </div>
                    <!-- </div> -->
                    </div>
                            <div class="col-4 bg-lights">
                            <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data" class="border border-dark p-2">
                            @csrf        
                            <br>
                                    <div class="border border-5"></div>
                                     <!-- Recuperer l'identifiant -->
                                     <div class="row">
                                        <div class="col">
                                            <input type="text" name="passe_sanitaires_id" id="passe_sanitaires_id" class="form-control" readonly value="{{ $passe_sanitaire->id}}">
                                        </div>
                                    </div>
 
                                    <!-- Saisir la date -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Date</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                    </div>
                                    <!-- Saisir l'heure souhaite -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Heure</label>
                                            <input type="time" class="form-control" name="heure" id="heure" >
                                        </div>
                                    </div>
                                    <!-- choisir le mode d'envoi -->
                                    <div class="row">
                                        <div class="col">
                                            <br>
                                            <label>Choisissez le mode d'envoi</label>
                                            <div class="col p-2">
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" name="type_envoi" id="sms" value="{{ $passe_sanitaire->telephone}}" class="custom-control-input">
                                                    <label for="sms" class="custom-control-label">Par SMS</label>
                                                </div>
                                                
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" name="type_envoi" id="email" value="{{ $passe_sanitaire->email}}" class="custom-control-input">
                                                    <label for="email" class="custom-control-label">Par Email</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Observations -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="">Observations</label>
                                            <textarea name="observation" id="observation" cols="90" rows="10" class="form-control" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for=""></label><br>
                                            <button type="submit" class="btn btn-primary float-left">Valider</button>  
                                            <button type="reset" class="btn btn-danger float-right">Annuler</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                </div>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>  
</div>

@endsection

