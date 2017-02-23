



<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barre_navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            
            
            <div class="collapse navbar-collapse" id="barre_navigation">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="{{url('apropos')}}">à propos</a>
                    </li>
                    <li>
                        <a href="{{url('tutos')}}">tutos</a>
                    </li>
                    <li>
                        <a href="#">photos</a>
                    </li>
                </ul>
               <form class="navbar-form navbar-right inline-form">
                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><a href="{{url('preorder.create')}}"></a><span class="glyphicon glyphicon-eye-open"></span>pré-commande</button>
            </div>
          </form>
        </div>
    </div>

    <div class="logo">
        <img src="img/logo.png">
    </div>
</nav>