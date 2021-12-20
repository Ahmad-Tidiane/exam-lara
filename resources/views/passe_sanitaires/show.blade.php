@extends('passe_sanitaires.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mes infos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('passe_sanitaires.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenom:</strong>
                {{ $passe_sanitaire->prenom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $passe_sanitaire->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type vaccin:</strong>
                {{ $passe_sanitaire->type-vaccin }}
            </div>
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date pemiere dose:</strong>
                {{ $passe_sanitaire->date-premiere-dose }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>photo Recto:</strong>
                <img src="/img/cv_recto/{{ $passe_sanitaire->cv_recto }}" width="500px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>photo Verso:</strong>
                <img src="/img/cv_verso/{{ $passe_sanitaire->cv_verso }}" width="500px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CNI Recto:</strong>
                <img src="/img/cni_recto/{{ $passe_sanitaire->cni_recto }}" width="500px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CNI_Verso:</strong>
                <img src="/img/cni_verso/{{ $passe_sanitaire->cni_verso }}" width="500px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Billet :</strong>
                <img src="/img/billet/{{ $passe_sanitaire->billet }}" width="500px">
            </div>
        </div>
    </div>
@endsection
