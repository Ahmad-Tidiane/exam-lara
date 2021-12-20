@extends('passe_sanitaires.layout')

@section('content')
<div class="containn">
<p id="titre1">Demande vaccination contre le COVID 19</p><br><br>
    </div>
    <!-- <p id="titre1">Demande du Certificat de vaccination contre le COVID 19</p><br><br> -->
    <main class="containn">
        <!-- <p id="titre1">Demande du Certificat de vaccination contre le COVID 19</p><br><br> -->
        <div class="demo-left">
            <img src=" {{ asset('img/TELFIGMA.jpeg') }}" alt="" id="mon-image">
        </div>
        <div class="demo-right">
            <div class="contain-form">
                <form action="{{ route('passe_sanitaires.store') }}" method="POST" enctype="multipart/form-data" id="formulaire">
                @csrf
                    <div id="ip">
                        <h4>Informations Personnelles</h4><hr>
                        <div class="row">
                            <div class="col-75-m">
                                <label for="prenom">Prénom</label><br>
                                <input type="text" id="prenom" name="prenom" placeholder="votre prénom" required>
                            </div>
                            <div class="col-75-m">
                                <label for="nom">Nom</label><br>
                                <input type="text" id="nom" name="nom" placeholder="votre nom" required>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-75">
                                <label for="telephone">Numéro de Téléphone <i>(WhatsApp)</i></label><br>
                                <input type="number" id="telephone" name="telephone" placeholder="votre numéro de téléphone" required>
                            </div>
                            <div class="col-75">
                                <label for="email">Email</label><br>
                                <input type="email" id="email" name="email" placeholder="votre adresse email" required>
                            </div>
                        </div>

                    </div>
                    <!-- pour la carte de vaccination -->
                    <div id="cs">
                        <h4>Carte de vaccination</h4><hr>
                        <div class="row">
                            <div class="col-75-m">
                                <label for="cv_recto">Recto</label><br>
                                <input type="file" id="cv_recto" name="cv_recto" required>
                            </div>
                            <div class="col-75-m">
                                <label for="cv_verso">Verso</label><br>
                                <input type="file" id="cv_verso" name="cv_verso" required>
                            </div>
                        </div>
                    </div>
                     <!-- pour le cni -->
                     <div>
                        <h4>CNI / Passeport</h4><hr>
                        <div class="row">
                            <div class="col-75-m">
                                <label for="cni_recto">Recto</label><br>
                                <input type="file" id="cni_recto" name="cni_recto" required>
                            </div>
                            <div class="col-75-m">
                                <label for="cni_verso">Verso</label><br>
                                <input type="file" id="cni_verso" name="cni_verso" required>
                            </div>
                        </div>
                    </div><br>
                    <!-- En cas d'urgence cocher  -->
                    <div id="urgence">
                        <input type="checkbox" onclick="billett()">&nbsp;&nbsp;
                        <label for="">Cocher en cas d'urgence ( optionnel )</label>

                        <div class="billet" id="divCacher" style="display: none;">
                            <label for="billet">Billet d'avion / VISA / Autres</label><br>
                            <input type="file" id="billet" name="billet"><br>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <input type="submit" value="Envoyer">
                    </div>

                </form>
            </div>
        </div>
    </main>

    <script>
        function billett() {
            var div = document.getElementById("divCacher");
            if (div.style.display === "none"){
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    </script>
@endsection
