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
                        <a href="{{url('apropos')}}">&agrave; propos</a>
                    </li>
                    <li>
                        <a href="{{url('tutos')}}">tutos</a>
                    </li>
                    <li>
                        <a href="#">photos</a>
                    </li>
                </ul>
               <div class="nav navbar-nav navbar-right">
                  <a href="{{route('preorders.create')}}" class="btn btn-success">pré-commande</a>
              </div>
            </div>
          </div>

<div class="row">
    <div class="col-xs-12 logo">
      <a href="{{url('/')}}"><img src="{{URL::asset('img/logo.png')}}" alt=""></a>
    </div>
</div>
</nav>


