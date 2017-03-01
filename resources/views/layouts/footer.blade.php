<footer class="row r-m">

<!-- Modal -->



<div class="modal fade" id="ConnexionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Se connecter</span></button>
                <h4 class="modal-title" id="myModalLabel">Connexion</h4>

            </div>

            <div class="modal-body">
                
                <!-- MESSAGE D' ALERTE -->
                <div class="alert" hidden></div>
 

                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

 

                    <div class="form-group">

                        <label class="col-md-4 control-label">Pseudo</label>

                        <div class="col-md-6">

                            <input type="text" class="form-control" name="pseudo" required>

                            <small class="help-block"></small>

                        </div>

                    </div>

 
 

                    <div class="form-group">

                        <label class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">

                            <input type="password" class="form-control" name="password" required>
                        </div>

                    </div>


 

                    <div class="form-group">

                        <div class="col-md-6 col-md-offset-4">

                            <button type="submit" class="btn btn-primary">

                                Connexion

                            </button>

                        </div>

                    </div>

                </form>                       

 

            </div>

        </div>

    </div>

</div>

@if(Auth::check())
    <a href="{{route('logout')}}"><button type="button" style="color: #808080;">Déconnexion</button></a>
@else
    <button type="button" data-toggle="modal" data-target="#ConnexionModal" style="color: #808080;">lien vers l'admin</button>
@endif

<br>
<br>
<br>

<div class="row r-m">
    <div class="col-md-12 lien">
        <ul>
            <li>
                <a href="http://www.pauline-arnaud.com/" target="_blank">http://www.pauline-arnaud.com/</a>
            </li>
            <li>
                <a href="http://annaaflalo.com/" target="_blank">http://annaaflalo.com/</a>
            </li>
            <li>
                <a href="http://villettemakerz.com/" target="_blank">http://villettemakerz.com/</a>
            </li>
        </ul>
        <br>
        <br>
        <p style="color: black;">@WF3 - Tous droits réservés - {{date('Y')}}  </p>
    </div>
</div>

</footer>