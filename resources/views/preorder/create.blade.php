@extends ('layouts.master')

@push('css')
<link href='http://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet' type='text/css'>
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link href="{{URL::asset('css/preco.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
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

<div id="content">
    <h1>Formulaire de précommande</h1>

    <form action="{{route('preorders.store')}}" method="post" autocomplete="on">
      {{ csrf_field() }}
        <div class="group">
            <label for="lastname" class="icon-user"> Nom
                <span class="required">*</span>
            </label>
            <input type="text" name="lastname" id="lastname" required="required" placeholder="Votre nom" />
        </div>

        <div class="group">
            <label for="firstname" class="icon-home">Prenom</label>
                <span class="required">*</span>
            <input type="text" name="firstname" id="firstname" placeholder="Votre prenom" />
        </div>

        <div class="group">
            <label for="email" class="icon-envelope"> email</label>
                <span class="required">*</span>
            <input type="email" name="email" id="email" placeholder="Entrez votre email" required="required" />
        </div>

        <div class="group">
            <label for="address" class="icon-home"> Adresse
                <span class="required">*</span>
            </label>
            <input type="text" name="address" id="address" placeholder="Entrez votre adresse" required="required" />
        </div>

        <div class="group">
            <label for="cp" class="icon-envelope"> code postal
                <span class="required">*</span>
            </label>
            <input type="text" name="cp" id="cp" placeholder="Entrez votre code postal" required="required" />
            <ul class="cp_list"></ul>
        </div>

        <div class="group">
            <label for="city" class="icon-envelope"> ville
                <span class="required">*</span>
            </label>
            <input type="text" name="city" id="city" placeholder="Entrez votre ville" required="required" />
            <ul class="city_list"></ul>
        </div>

        <hr>
        <div class="produit_choix">
          @foreach($products as $product)
          <div class="group">
              <label for=""> {{$product->modele}} - {{$product->couleur}} - {{$product->price}} € </label>
                <img src="{{URL::asset('img/products/'.$product->photo)}}" alt="{{$product->title}}">
                <input type="checkbox" name="product[{{$product->id}}]" value="{{$product->id}}">
                <p>Quantité à commander :</p>
                <input type="text" name="quantity[{{$product->id}}]">
          </div>
          @endforeach
        </div>

        <p class="indication">Les champs avec une
            <span class="required"> * </span>sont obligatoires
        </p>

        <input type="submit" value=" C'est parti ! " />

    </form>
</div>


@endsection


@push('js')
    <script src="{{URL::asset('js/preorder.js')}}"></script>
@endpush