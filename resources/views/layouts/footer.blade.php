<footer class="row">

<!-- Modal -->

<div class="modal fade" id="ConnexionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Se connecter</span></button>

                <h4 class="modal-title" id="myModalLabel">connexion</h4>

            </div>

            <div class="modal-body">

 

                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

 

                    <div class="form-group">

                        <label class="col-md-4 control-label" style="color: black;">pseudo</label>

                        <div class="col-md-6">

                            <input type="text" class="form-control" name="pseudo">

                            <small class="help-block"></small>

                        </div>

                    </div>

 
 

                    <div class="form-group">

                        <label class="col-md-4 control-label" style="color: black;">Password</label>

                        <div class="col-md-6">

                            <input type="password" class="form-control" name="password">

                            <small class="help-block"></small>

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

<button type="button" data-toggle="modal" data-target="#ConnexionModal" style="color: #808080;">lien vers l'admin</button>


</footer>