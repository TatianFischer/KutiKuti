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
            <form class="form-horizontal" action="{{route('preorders.store')}}" method="post" autocomplete="on" id="form_preco">
                <fieldset>
                    {{ csrf_field() }}
                    <legend>Informations</legend>
                    <p class="indication">
                        Les champs avec une<span class="required"> * </span>sont obligatoires
                    </p>
                    <!-- CLIENTS -->
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
                    </div> <!-- Client -->
                </fieldset>

                <fieldset>                
                    <legend>Commande</legend>
                    
                    <div class="col-xs-12" id="commande">
                        <div class="list-group">
                            <div data-toggle="buttons">
                                @foreach($products as $product)
                                <label class="list-group-item btn col-md-3 col-xs-6 {{($product->modele != 'LapiKuti') ? 'item-middle' : ''}}" for="{{$product->modele}}">
                                    <img src="{{URL::asset('img/products/'.$product->photo)}}" alt="{{$product->title}}">
                                    <input type="checkbox" name="product[{{$product->id}}]" value="{{$product->id}}">
                                    @if($product->modele != "LapiKuti") <br>  @endif
                                    <p>{{$product->modele}} - {{$product->couleur}} - {{$product->price}} €</p>
                                </label>
                                    
                                    <!-- <p>Quantité à commander :</p>
                                    <input type="text" name="quantity[{{$product->id}}]"> -->
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- Commande -->
                </fieldset>

                <fieldset>
                    <legend>Résumé</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- lol -->
                            <h5>Coordonnées</h5>
                            <p id="coordinates">
                                {{session('user.lastname')}} {{session('user.firstname')}}<br>
                                {{session('user.email')}}<br>
                                {{session('user.address')}}<br>
                                {{session('user.cp')}} {{session('user.city')}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5>Produits</h5>
                            <table id="list_products">
                                <tr>
                                    <th colspan="3">Produit</th>
                                    <th>Quantité</th>
                                </tr>
                                @foreach($products as $product)
                                <?php $i = 0; $quantities = session('panier.quantity')?>
                                    @if($key = array_search($product->id, session('panier.id_produit')) !== false)
                                        <tr>
                                            <td>{{$product->modele}}</td>
                                            <td>{{$product->couleur}}</td>
                                            <td>{{$product->price}} €</td>
                                            <td>{{$quantities[$key]}}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </fieldset>
 
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-6">
                        <input type="submit" value=" C'est parti ! " class="btn" id="save_preco"/>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('js')
    <script type="text/javascript">
        var urlCustomer = "{{route('preorders.customer')}}";
        var urlPanier = "{{route('preorders.panier')}}";
    </script>
    <script src="{{URL::asset('js/preorder.js')}}"></script>
@endpush