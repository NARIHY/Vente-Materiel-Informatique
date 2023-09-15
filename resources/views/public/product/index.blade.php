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
    <section>
        <div class="container">
            <h2 class="title">Explorez le Futur de la Technologie Informatique avec Nos Produits de Pointe!</h2>
            <p class="message" style="float: left">
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
                                                        ->get();
                    $count = App\Models\Product::where('categoryId', $categories->id)
                                                        ->where('quantityInStock', '>=', 1)
                                                        ->orderBy('created_at')
                                                        ->count();
                @endphp
                @if (!empty($count))

                    <h3 class="name-category">{{$categories->name}}</h3>
                @endif





                <div class="container">
                    <div class="row mb-3 hidden_container">
                        <div class="slider-container">
                            @forelse ($product as $products)
                            <div class="cards{{$products->id}}">
                                @php
                                    $sales = "";
                                    //get sale_information
                                    if(!empty($products->sales_information)) {
                                        $sales = App\Models\SaleInformation::findOrFail($products->sales_information);
                                    }

                                @endphp
                                @if (!empty($sales))
                                <h3 class="card-title" @if($sales->description == "Promotions") style="color:red" @endif>{{$sales->description}}</h3>
                                @endif

                                <div class="card-body">
                                    <img src="/storage/{{$products->picture}}" alt="Product" class="card-img">
                                    <h3 class="title-product">{{$products->name}}</h3>
                                    @php
                                    $text = new Nari\Text();
                                    @endphp
                                    <p class="product-text">

                                        {{ $text->excerpt($products->Description, 60)}}
                                    </p>
                                    <p class="quantity">Quantité en stock: <b class="quantity-stock" @if ($products->quantityInStock < 5) style="color: red" @endif>{{$products->quantityInStock}}</b></p>
                                    <h4 class="price">Prix: <b class="price-price">{{number_format($products->Price, 0, '.', ' ')}} Ar</b></h4>
                                    <a href="#" class="btn btn-primary" style="float: right; margin-right:10px;">Voir plus</a>
                                </div>

                            </div>
                            @empty
                            <div class="empty">

                            </div>
                            @endforelse
                        </div>
                        @if ($count >= 3)
                            <div class="slider-buttons">
                                <button class="prev-button" >
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAABfElEQVR4nO3cbUrEMBSF4W5C0WXdQDasuAHnh2tJ/xyJKAxI0jb3TgfN+8CAqBU59PVrapcFAABgmMwe62P8I0xMOT+sKb2vZh8ye7735/M3x0tJXw9G3K8mu6Z0+R7vcv0yOR858+pZl/PTr9eR8/7xmm9jxH62P6kWs7eS0mvvfaanzjB1vGL2sjX0tNTJdvcxs+asHdkeOW4qOpDt3uOmoYFsPcf9KyLbcWTrQLYOZOtAtg5k60C2DmTrGS/zQ3L4mVf43XYb2TqIbB3jGdmGj1fxJ6kNZOsgso0fryLbDeK77TiRbfx4FdluENmOE9neaMDUft62d9yUNHgZBZdfXGHEADqQJZekOUcsXJLWORP5mugncj5vxELObeQcQOR83oiFnNvIOYDI+bwRCzm3kXMAkbMfOQcg5wDkHICcA5BzAHIOQM4ByDkAOd8pZ564d+TMP107RmQ8x4iM5xiR8Q7i5mO3uv3djHfpCLsBI+ON4RagAAAsE/oE4iIkkOSR0NEAAAAASUVORK5CYII=">
                                </button>
                                <button class="next-button" >
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAACXBIWXMAAAsTAAALEwEAmpwYAAABgElEQVR4nO2cUWrDMBAFfYmG9lgr0IVbeoHmo2eRf7aotGAotiPts0OqGTCEJAIzaEhiK5omAAAAGAA3u9Tj3ufxkHjOT3NKH7PZp5u93Pt8HlNeSv59ILFBntllTun6I++6fEzOLTOvzrqcn/88R863y1t9DYnb2f6mWszeS0pvW+8ZHt8QU+UVs9c90cPiG9nePGbknL1hRpFzUGIh542Z2JklOS8gZwFOzgKJmZxPm4kVPp1XIGcBTs4CiUbOp0ksfNleh5wFODnHIWcB5CyAnAWQswByFkDOAshZADkLIGcB5CyAnAWQ85kCF5fCWEIy9S0biYz7Vzjyjl0q1zJuKLxhqdyt44bBybYfsg1AtgHINgDZBiDbAGQbgGwDkG1EXubCgHzmFX7b7kO2AZxsA/KMbOXyKlyS2oFsAzjZ6uVVyHYH59O2HyfbgwQmbgAd8ncu56Z3v0TkBSQ6M69foiOvDWfzsYO2v8sDrpKSbcCYkdcn0dgCFAAAACYRX4CaJJ6XLrD8AAAAAElFTkSuQmCC">
                                </button>
                            </div>
                        @endif

                    </div>


                </div>
            @empty

            @endforelse
        </div>

    </section>
</main>



@endsection
