@extends ('layouts.master')

@push('css')
<!-- <link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'> -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link href="{{URL::asset('css/preco.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row messages">
        @if(session('success'))
            <div class="alert alert-success"> {{session('success')}} </div>
        @endif
    
        @if(isset($success))
            <div class="alert alert-success"> {{$success}} </div>
            <?php session()->forget('panier'); session()->forget('user'); ?>
        @endif

        @if(isset($error))
            <div class="alert alert-danger"> {{$error}} </div>
        @endif

        @if(count($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row" id="content">       
        
        <div class="col-xs-12">
            <h1>Formulaire de précommande</h1>


            <ul id="steps" class="nav nav-pills nav-justified">
                <li id="stepDesc0" {{($step == 0) ? 'class="current"' : '' }}><span>Etape 1 Informations</span></li>
                <li id="stepDesc1" {{($step == 1) ? 'class="current"' : '' }}><span>Etape 2 Commande</span></li>
                <li id="stepDesc2" {{($step == 2) ? 'class="current"' : '' }}><span>Etape 3 Résumé</span></li>
            </ul>



            <!-- CLIENTS -->
            <form class="form-horizontal form_preco" action="{{route('preorders.customer')}}" method="post" autocomplete="on" <?= ($step == 1 || $step == 2) ? 'hidden' : '' ?>>
                <fieldset>
                    {{ csrf_field() }}
                    <legend>Informations</legend>
                    <p class="indication">
                        Les champs avec une<span class="required"> * </span>sont obligatoires
                    </p>
                    
                    <div class="col-xs-12" id="client">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname" class="col-xs-4"> Nom <span class="required">*</span>
                                </label>
                                 <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                                        <input class="form-control" type="text" name="lastname" id="lastname" value="<?= (session('user')) ? session('user.lastname') : '' ?>" required>
                                    </div>
                                </div>   
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-xs-4"> Prénom <span class="required">*</span></label>
                                <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-user"></span>
                                        <input class="form-control" type="text" name="firstname" id="firstname" value="<?= (session('user')) ? session('user.firstname') : '' ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-xs-4">Email <span class="required">*</span></label>
                                <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                                        <input class="form-control" type="email" name="email" id="email" value="<?= (session('user')) ? session('user.email') : '' ?>" required>
                                    </div>
                                </div>     
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="col-xs-4"> Adresse <span class="required">*</span></label>
                                <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-map-marker"></span>
                                        <input class="form-control" type="text" name="address" id="address" value="<?= (session('user')) ? session('user.address') : '' ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cp" class="col-xs-4">Code Postal<span class="required">*</span></label>
                                <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-map-marker"></span>
                                        <input class="form-control" type="text" name="cp" id="cp" value="<?= (session('user')) ? session('user.cp') : '' ?>" required>
                                    </div>
                                    <ul class="cp_list" hidden></ul>
                                </div>                        
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-xs-4">Ville <span class="required">*</span></label>
                                <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-map-marker"></span>
                                        <input class="form-control" type="text" name="city" id="city" value="<?= (session('user')) ? session('user.city') : '' ?>" required>
                                    </div>
                                    <ul class="city_list" hidden></ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                </fieldset>
            </form>
            <!-- fin Client -->  









            <!-- COMMANDE -->
            <form class="form-horizontal form_preco" action="{{route('preorders.panier')}}" method="post" autocomplete="on" {{($step != 1) ? 'hidden' : '' }}>
                <fieldset>                
                    <legend>Commande</legend>
                    {{ csrf_field() }}
                    <div class="col-xs-12" id="commande">
                        <div class="list-group">
                            <div data-toggle="buttons">

                                @foreach($products as $product)
                                <!-- Est-il en session ? -->
                                    @if(session('panier'))
                                        <?php $key = array_search($product->id, session('panier.id_produit')); ?>
                                    @else
                                        <?php $key = false; ?>
                                    @endif
    
                                    <label class="list-group-item btn col-md-3 col-xs-6 {{($product->modele != 'LapiKuti') ? 'item-middle' : ''}} {{($key !== false) ? 'active' : ''}}" for="{{$product->modele}}">

                                        <img src="{{URL::asset('img/products/'.$product->photo)}}" alt="{{$product->title}}">

                                        <input type="checkbox" name="product[{{$product->id}}]" value="{{$product->id}}" {{($key !== false) ? 'checked' : ''}}>

                                        @if($product->modele != "LapiKuti") <br>  @endif

                                        <p>{{$product->modele}} - {{$product->couleur}} - {{$product->price}} €</p>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div> 
                </fieldset>
            </form>
            <!-- fin  Commande -->








            <!-- RESUME -->
            <form class="form-horizontal form_preco" action="{{route('preorders.store')}}" <?= ($step != 2) ? 'hidden' : '' ?>  method="post">
                <fieldset>
                    <legend>Résumé</legend>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <!-- lol -->
                            <h4>Coordonnées</h4>
                            <p id="coordinates">
                                {{session('user.lastname')}} {{session('user.firstname')}}<br>
                                {{session('user.email')}}<br>
                                {{session('user.address')}}<br>
                                {{session('user.cp')}} {{session('user.city')}}
                            </p>
                        </div>


                        <div class="col-md-6">
                            <h4>Produits</h4>
                            <table id="list_products">
                                <tr>
                                    <th colspan="3">Produit</th>
                                    <th rowspan="2">Quantité</th>
                                    <th rowspan="2">Prix Par <br> Article</th>
                                </tr>
                                <tr>
                                    <th>Modèle</th>
                                    <th>Couleur</th>
                                    <th>Prix Unitaire</th>                                    
                                </tr>
                                <?php $total = 0; ?>
                                @foreach($products as $product)

                                    @if(session('panier'))
                                        <?php $key = array_search($product->id, session('panier.id_produit')); ?>
                                    @else
                                        <?php $key = false; ?>
                                    @endif
                                    <?php $i = 0; $quantities = session('panier.quantity')?>
                                    @if(session('panier') && $key !== false)
                                        <tr>
                                            <td>{{$product->modele}}</td>
                                            <td>{{$product->couleur}}</td>
                                            <td>{{$product->price}} €</td>
                                            <td>
                                                <a href="{{route('preorders.decrementation', ['quantity' => $quantities[$key], 'id' => $key])}}" class="glyphicon glyphicon-minus"title="Diminuer la quantité"> </a> 
                                                <span> {{$quantities[$key]}} </span> 
                                                <a href="{{route('preorders.incrementation', ['quantity' => $quantities[$key], 'id' => $key])}}" class="glyphicon glyphicon-plus" title="Augmenter la quantité"> </a>
                                            </td>
                                            <td>{{$sstotal = $product->price*$quantities[$key]}} €</td>
                                        </tr>
                                        <?php $i++; $total += $sstotal;?>
                                    @endif
                                @endforeach
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th colspan="2">{{$total}} €</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </fieldset>
 
                <!-- <div class="form-group">
                    <div class="col-md-6 col-md-offset-6">
                        <input type="submit" value="C'est parti !" class="btn" id="save_preco"/>
                    </div> 
                </div> -->
            </form>
        </div>
    </div>
</div>

@endsection


@push('js')
    <script src="{{URL::asset('js/preorder.js')}}"></script>
@endpush