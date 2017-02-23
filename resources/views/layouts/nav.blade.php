



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
                        <a href="{{url('tutos')}}">Tutos</a>
                    </li>
                    <li>
                        <a href="#">Photos</a>
                    </li>
                </ul>
               <form class="navbar-form navbar-right inline-form">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-sm"><a href="{{route('preorders.create')}}">pré-commande</a></button>
                </div>
              </form>
            </div>
          </div>

<div class="row">
    <div class="col-xs-12 logo">
      <a href="{{url('/')}}"><img src="{{URL::asset('img/logo.png')}}" alt=""></a>
    </div>
</div>
</nav>
