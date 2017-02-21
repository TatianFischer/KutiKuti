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


<div class="col-xs-12 map">
<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2623.139139853995!2d2.389043088540035!3d48.89368540395556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47e66dcb97e5f155%3A0xcf11e2120157690f!2sGalerie+de+la+Villette%2C+75019+Paris!3m2!1d48.8924398!2d2.3881942!5e0!3m2!1sfr!2sfr!4v1487684536483" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

</footer>