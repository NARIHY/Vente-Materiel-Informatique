@extends('public')
@section('title', 'nos produit')

@section('content')
<main id="main">
    <section class="carrousel">
        <div class="carousel-container">
            <div class="carousel-wrapper">
                <div class="carousel-slide">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFDtgZs31Fe6HJsP1KfLw-vHkaCLt6cgjQOg&usqp=CAU" alt="" width="100%" height="450px">
                </div>
                <div class="carousel-slide">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSahc6j6CI99zhRaeQT7AHtzGfC2PQAl0Gbug&usqp=CAU" alt="" width="100%" height="450px">
                </div>
                <div class="carousel-slide">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZK-1h7IvsqlqWD855KQEcoOju1gBJ_Y9jrw&usqp=CAU" alt="" width="100%" height="450px">
                </div>

            </div>
        </div>
    </section>
    <section class="ecriture">
        <div class="container">
            <h2 class="title">Explorez le Futur de la Technologie Informatique avec Nos Produits de Pointe!</h2>
            <p class="message" >
                Découvrez notre gamme exceptionnelle de produits informatiques qui répondront à tous vos besoins technologiques. Chez nous, l'informatique devient une expérience passionnante et accessible à tous. Que vous soyez un professionnel à la recherche d'équipements de pointe ou un passionné d'informatique À la recherche de la dernière technologie, nous avons tout ce qu'il vous faut. Des ordinateurs portables ultraperformants aux composants de haute qualité, en passant par une variété de périphériques innovants, nous vous proposons les solutions les plus fiables et les plus modernes. Explorez notre catalogue et plongez dans le monde passionnant de la technologie informatique. Nous sommes là pour vous accompagner dans chaque étape de votre parcours informatique.
            </p>
        </div>
    </section>
    <section class="content">

        <div class="container" style="color:black">


            @forelse ($category as $categories)





            @php
            $product = App\Models\Product::where('categoryId', $categories->id)
                                            ->where('quantityInStock', '>=', 1)
                                            ->orderBy('created_at')
                                            ->limit(3)
                                            ->get();
            $count = App\Models\Product::where('categoryId', $categories->id)
                                            ->where('quantityInStock', '>=', 1)
                                            ->orderBy('created_at')
                                            ->count();
            @endphp

                    @if (!empty($count))

                        <h2 class="name-category">{{$categories->name}}</h2>
                    @endif

                    <section class="splide" aria-label="Exemple HTML de base de Splide">

                        <div class="splide__track">
                            <ul class="splide__list">
                             @php

                             @endphp

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
                        @if(!empty($products))
                            <div class="text-center">
                                <a href="{{route('Public.Product.listOfProduct', ['id' => $categories->id])}}" style="text-align: center">Voir plus</a>
                            </div>
                        @endif
                </section>







            @empty

            @endforelse
        </div>

    </section>

</main>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elements = document.querySelectorAll('.splide');
    var elementsLength = elements.length;

    for (var i = 0; i < elementsLength; i++) {
        var additionalClass = 'splide-' + (i + 1); // Ajoute 'splide-1', 'splide-2', 'splide-3', ...

        new Splide(elements[i], {
            type: 'loop', // Pour le défilement en boucle
            perPage: 3,   // Affiche 3 éléments à la fois
            autoplay: true, // Défilement automatique
            pauseOnHover: false, // Ne pas mettre en pause en survol
            interval: 2000, // Intervalle de défilement en millisecondes (par exemple, toutes les 2 secondes)
        }).mount();

        // Ajoute la classe supplémentaire à l'élément
        elements[i].classList.add(additionalClass);
    }
});
  </script>
@endsection
