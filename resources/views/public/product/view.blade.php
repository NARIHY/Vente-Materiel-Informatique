@extends('public')

@section('title', $prod->name)

@section('content')
    <main id="main">
        <div class="container" style="margin-top: 80px">
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="/storage/{{$prod->picture}}" alt="">
                </div>
                <div class="col-md-6">
                    <a href="{{route('Public.Contact.product', ['id' => $prod->id])}}"><h3 style="color: blue">{{$prod->name}}</h3></a>

                    <p style="color: black; text-align: justify">
                        {{$prod->Description}}
                    </p>
                    <p style="color: black">Quantité en stock: <b style="color: orange">{{$prod->quantityInStock}}</b></p>
                    <p style="color: black">Prix: <b style="color: orange">{{$prod->quantityInStock}}</b></p>
                </div>
            </div>


            <section class="splide" aria-label="Exemple HTML de base de Splide">
                <div class="splide__track">
                      <ul class="splide__list">
                        @foreach ($product as $products)
                          <li class="splide__slide">
                            <div class="cardz">
                                @php
                                    $sales = "";
                                    //get sale_information
                                    if(!empty($products->sales_information)) {
                                        $sales = App\Models\SaleInformation::findOrFail($products->sales_information);
                                    }

                                @endphp
                                @if (!empty($sales))
                                <h4  class="card-title" @if($sales->description == "Promotions") style="color:red" @else style="color: black" @endif>{{$sales->description}}</h4>
                                @endif

                                <div class="card-body">
                                    <img src="/storage/{{$products->picture}}" alt="Product" class="card-img">
                                    <a href="{{route('Public.Contact.product', ['id' => $products->id])}}"><h3 class="title-product">{{$products->name}}</h3></a>

                                    @php
                                    $text = new Nari\Text();
                                    @endphp
                                    <p class="product-text" >

                                        {{ $text->excerpt($products->Description, 40)}}
                                    </p>
                                    <p class="quantity">Quantité en stock: <b class="quantity-stock" @if ($products->quantityInStock < 5) style="color: red" @endif>{{$products->quantityInStock}}</b></p>
                                    <h4 class="price">Prix: <b class="price-price">{{number_format($products->Price, 0, '.', ' ')}} Ar</b></h4>
                                    <a href="{{route('Public.Product.view', ['id' => $products->id])}}" class="btn btn-primary" style="float: right; margin-right:10px;">Voir plus</a>
                                </div>

                            </div>

                          </li>
                        @endforeach
                      </ul>
                </div>
            </section>
        </div>


    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Splide('.splide', {
                type: 'loop', // Pour le défilement en boucle
                perPage: 3,   // Affiche 3 éléments à la fois
                autoplay: true, // Défilement automatique
                pauseOnHover: false, // Ne pas mettre en pause en survol
                interval: 4000, // Intervalle de défilement en millisecondes (par exemple, toutes les 2 secondes)
            }).mount();
        });
      </script>
@endsection
