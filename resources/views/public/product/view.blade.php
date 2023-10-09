@extends('public')

@section('title', $prod->name)

@section('content')
    <main id="main">
        <div class="container" style="margin-top: 80px; @if ($counts > 1) margin-bottom:80px @endif">
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="/storage/{{$prod->picture}}" alt="" width="100%">
                </div>
                <div class="col-md-6">
                    <a href="{{route('Public.Contact.product', ['id' => $prod->id])}}"><h3 style="color: blue">{{$prod->name}}</h3></a>

                    <p style="color: black; text-align: justify">
                        {{$prod->Description}}
                    </p>
                    <p style="color: black">Quantité en stock: <b style="color: orange">{{$prod->quantityInStock}}</b></p>
                    <p style="color: black">Prix: <b style="color: orange">{{number_format($prod->Price, 0, '.', ' ')}} Ar</b></p>
                    <p style="color: black">
                        {{$prod->Description}}
                    </p>
                </div>
            </div>


            @if ($counts > 1)
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
                                    <a href="{{route('Public.Product.view', ['id' => $products->id])}}" class="btn btn-primary" style="float: right; margin-right:10px;">Show plus</a>
                                </div>

                            </div>

                          </li>
                        @endforeach
                      </ul>
                </div>
            </section>
            @endif
        </div>


    </main>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez la classe splide
    const splideElement = document.querySelector('.splide');

    // Fonction pour mettre à jour le nombre d'éléments par slide en fonction de la largeur de l'écran
    function updatePerPage() {
        const screenWidth = window.innerWidth;
        let perPage = 3; // Par défaut, affiche 3 éléments par slide

        if (screenWidth <= 456) {
            perPage = 1; // Si la largeur de l'écran est inférieure ou égale à 456px, affiche 1 élément par slide
        } else if (screenWidth >= 457 && screenWidth <= 600) {
            perPage = 2; // Si la largeur de l'écran est entre 457px et 600px, affiche 2 éléments par slide
        }

        return perPage;
    }

    // Créez l'instance Splide en utilisant la fonction updatePerPage
    const splide = new Splide(splideElement, {
        type: 'loop', // Pour le défilement en boucle
        perPage: updatePerPage(), // Utilisez la fonction pour définir le nombre initial d'éléments par slide
        autoplay: true, // Défilement automatique
        pauseOnHover: false, // Ne pas mettre en pause en survol
        interval: 4000, // Intervalle de défilement en millisecondes (par exemple, toutes les 2 secondes)
    });

    // Mettez à jour le nombre d'éléments par slide lors du redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        splide.options.perPage = updatePerPage();
        splide.destroy(); // Détruisez l'instance actuelle
        splide.mount(); // Remontez-la avec les nouvelles options
    });

    // Montez l'instance Splide
    splide.mount();
});


      </script>
@endsection
