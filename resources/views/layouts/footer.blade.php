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
                
                @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 

                <form id="formRegister" class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

 

                    <div class="form-group">

                        <label class="col-md-4 control-label" style="color: black;">pseudo</label>

                        <div class="col-md-6">

                            <input type="text" class="form-control" name="pseudo" required>

                            <small class="help-block"></small>

                        </div>

                    </div>

 
 

                    <div class="form-group">

                        <label class="col-md-4 control-label" style="color: black;">Password</label>

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


</footer>