<footer class="row r-m">
    <!-- Modal : Connexion -->

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

    <div class="row r-m">
        <ul class="col-xs-12 lien">
            <li class="col-md-4 col-sm-6">
                <a href="http://www.pauline-arnaud.com/" target="_blank">http://www.pauline-arnaud.com/</a>
            </li>
            <li class="col-md-4 col-sm-6">
                <a href="http://annaaflalo.com/" target="_blank">http://annaaflalo.com/</a>
            </li>
            <li class="col-md-4">
                <a href="http://villettemakerz.com/" target="_blank">http://villettemakerz.com/</a>
            </li>
        </ul>    
    </div>
    <div class="row">
        <div class="col-xs-12">
            @if(Auth::check())
                <a href="{{route('logout')}}" class="btn btn-default">Déconnexion</a>
            @else
                <a data-toggle="modal" data-target="#ConnexionModal">Administration</a>
            @endif
        </div>
        <p class="col-xs-12">@WF3 - Tous droits réservés - {{date('Y')}}  </p>
    </div>
    
</footer>