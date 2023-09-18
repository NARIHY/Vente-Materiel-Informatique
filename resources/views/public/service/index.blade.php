@extends('public')
@section('title', 'Nos service')

@section('content')
<main id="main">
    <section id="about" class="about" style="margin-top: 80px">
        <div class="container">

          <div class="row content">
            <div class="col-lg-6" id="left">
              <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Accent Technologie : Votre Porte d'Accès à l'Excellence Informatique</font></font></h2>
              <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">L'excellence informatique à chaque clic, votre partenaire technologique.</font></font></h3>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0" id="right">
              <p style="justify">Accent Technologie : Votre partenaire de confiance pour une excellence informatique inégalée. Nous offrons des produits de qualité, des conseils experts, et un service client exceptionnel pour vous accompagner dans votre parcours informatique vers l'excellence.</p>
              <ul>
                <li><i class="ri-check-double-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Excellence Informatique</font></font></li>
                <li><i class="ri-check-double-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Partenariat de Confiance</font></font></li>
                <li><i class="ri-check-double-line"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dévouement à la Satisfaction Client </font><font style="vertical-align: inherit;">Duis aute irure dolor en réprimandant</font></font></li>
              </ul>
              <p class="fst-italic" style="text-align: justify"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Ainsi, chez Accent Technologie, nous nous efforçons constamment de faire de chaque interaction une expérience mémorable pour nos clients. Cependant, notre engagement ne s'arrête pas là. Découvrez maintenant les domaines spécifiques où nous excellons et comment nous pouvons vous aider à atteindre vos objectifs informatiques avec confiance et expertise
              </font></font></p>
            </div>
          </div>

        </div>
      </section>

      <section id="Service">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-6" id="left">
                        <img src="{{asset('public/img/accentic.jpg')}}" alt="accentic" width="100%">
                        <div style="margin-top: 15px">
                            <h5 class="title-6">Accentic Technology est un acteur majeur dans le domaine de la technologie informatique, offrant une gamme complète de produits, des ordinateurs portables aux composants haut de gamme. Notre engagement envers l'excellence informatique est au cœur de notre identité, et nous avons établi une solide réputation en tant que fournisseur de confiance pour les professionnels et les particuliers en quête de solutions informatiques de qualité.Notre équipe d'experts est là pour vous guider à chaque étape de votre parcours informatique, offrant des conseils avisés, un service client exceptionnel, et des produits de premier ordre. Rejoignez-nous chez Accentic Technology et découvrez pourquoi nous sommes bien plus qu'un simple fournisseur de technologie,nous sommes votre partenaire de confiance dans le monde en constante évolution de la technologie.</h5>
                        </div>
                    </div>
                    <div class="col-md-6" id="right">
                        <h3>Besoin du Client : </h3>
                        <p style="text-align:justify">Ce client, désireux de maximiser l'efficacité de son équipe créative grâce à des ordinateurs portables de qualité, est confronté à des défis inattendus en raison de problèmes de lenteur et de compatibilité logicielle, entravant ainsi leur flux de travail et leur productivité. Ils recherchent désormais une solution fiable pour résoudre ces problèmes informatiques.</p>

                        <h3>Service de Support Technique de accentic technology : </h3>
                        <p style="text-align: justify">
                            Le client se tourne vers Accentic Technology en quête d'assistance, sachant qu'ils offrent un service de support technique complet, soutenu par une équipe d'experts informatiques hautement qualifiés, prêts à résoudre une variété de problèmes informatiques pour restaurer la productivité de l'entreprise. 'équipe créative'.
                        </p>

                        <h3>Résolution :</h3>
                        <p style="text-align: justify">
                            Le client contacte le service de support technique de l'accentic technology par téléphone et explique les problèmes rencontrés. L'équipe de support technique pose des questions pour mieux comprendre les problèmes spécifiques. Ils proposent ensuite une solution qui implique des mises à jour logicielles et des ajustements de configuration sur les ordinateurs portables de l'entreprise de marketing.


                        </p>
                        <p style="text-align: justify">
                            L'équipe de support technique guide le client étape par étape pour effectuer ces ajustements, et ils restent en contact avec lui tout au long du processus. Après la mise en œuvre des solutions recommandées, les problèmes de lenteur et de compatibilité sont résolus, et l'équipe de marketing retrouve une productivité optimale.
                        </p>
                    </div>

                </div>
            </div>
      </section>
      <section class="category">
        <h3 class="third-title">Voici quelques de nos produit:</h3>
        <div class="container">
            <div class="row mb-3 hidden_container">
                <div class="slider-container">

                    @forelse ($product as $products)
                    <div class="card" style="padding: 10px">
                        @php
                            $sales = "";
                            //get sale_information
                            if(!empty($products->sales_information)) {
                                $sales = App\Models\SaleInformation::findOrFail($products->sales_information);
                            }

                        @endphp
                        @if (!empty($sales))
                        <h3 class="card-title" @if($sales->description == "Promotions") style="color:red" @endif>{{$sales->description}}</h3>
                        @else
                        <h3 class="card-title" style="color:black" >A vendre</h3>
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
                            <a href="#" class="btn btn-primary" style="float: right; margin-right:10px;"><i class="bi bi-plus-circle-dotted"></i></a>
                        </div>

                    </div>
                    @empty
                    <div class="empty">
                        Aucun produit disponible pour le moment
                    </div>
                    @endforelse
                </div>
                    @if ($product->count() > 2)
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
        <div style="text-align: center">
            <a href="{{route('Public.Product.listing')}}">Voir plus</a>
        </div>
      </section>
</main>
@endsection
