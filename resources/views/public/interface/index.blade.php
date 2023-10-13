@extends('public')

@section('title', 'Acceuil du site')

@section('content')
<section id="hero">
<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="bloc">
        <video id="myVideo" autoplay loop muted>
            <source src="{{asset('public/assets/video/fond.mp4')}}" type="video/mp4" muted="">

        </video>
        <h1 class="animated-text"> Accentic Technology</h1>
        <p class="text_small">Welcome to Accentix Solutions, your trusted destination for IT hardware needs. We are proud to offer you a complete line of high-quality IT products, designed to meet your professional and personal needs.</p>

    </div>
</div>
</section>

<main id="main">


    <section class="information">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-6 mx-auto text-center">
                    <img src="/storage/{{$home->picture}}" alt="" width="100%" style="margin-top: 30px">

                </div>
                <div class="col-md-6 mx-auto text-center">
                    <section class="carrousel_text">
                        <h1 style="color: rgb(35, 35, 35)">{{$home->title}}</h1>
                        <p style="text-align: justify; font-family:'Times New Roman', Times, serif; font-size:20px">{{$home->content}}</p>
                    </section>


                </div>

            </div>
        </div>
    </section>

    <section id="clients" class="clients section-bg">
        <div class="container">
            <h1 style="color:red;">Our sponsors</h1>

            <div class="row">
                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
                    <img src="{{asset('public/assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
                    <img src="{{asset('public/assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center mx-auto">
                    <img src="{{asset('public/assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
                </div>
            </div>

        </div>
      </section>


      @if (!empty($category))
      <section class="category">
        <h3 class="third-title" style="color: rgb(41, 41, 41)">Here are all our categories of our products:</h3>
        <div class="container">
            <div class="row mb-3 hidden_container">
                <div class="slider-container">
                    @foreach ($category as $cat)

                            <div class="card" >
                                <img src="/storage/{{$cat->picture}}" width="100%" height="100%" class="bd-placeholder-img card-img-top" alt="{{$cat->name}}">
                                <div class="card-body">
                                    <h4 class="card-text" >{{$cat->name}}</h4>
                                </div>
                            </div>

                        <!-- decommenter pour avoir une aperçu lors du slide
                        <div class="card shadow-sm col-md-6">
                            <img src="/storage/category/category_4.jpg" width="100%" height="100%" class="bd-placeholder-img card-img-top" alt="sssssssssss">
                            <div class="card-body">
                                <h2 class="card-text">sssssssssss</h2>
                            </div>
                        </div>
                        -->
                    @endforeach
                </div>
                @if ($categoryCount > 2)
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



      </section>
      @endif


      <section class="contact">
                @if(session('success'))
                    <div class="alert alert-success" style="text-align: center">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-success" style="text-align: center">
                        {{session('error')}}
                    </div>
                @endif

                <video id="myContactVideo" autoplay loop muted>
                    <source src="{{asset('public/assets/video/aze.mp4')}}" type="video/mp4" muted="">

                </video>


                <div class="container">


                    <form action="{{route('Public.contact.store')}}" method="post">
                        <h1 class="text-center" style="color: rgb(255, 255, 255)" style="margin-top: -15px">Contact us</h1>
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">

                                <input type="text" name="name" id="name" class="form-nary" placeholder="Your name*" value="{{@old('name')}}">
                                @error('name')
                                <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">

                                <input type="text" name="last_name" id="last_name" class="form-nary" placeholder="Your lastname*" value="{{@old('last_name')}}">
                                @error('last_name')
                                <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                                @enderror
                            </div>
                        </div>



                        <input type="text" name="subject" id="subject" class="form-nary" placeholder="Your topic of conversation*" value="{{@old('subject')}}">
                        @error('subject')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                        @enderror


                        <input type="email" name="email" id="email" class="form-nary" placeholder="Your email address*" value="{{@old('email')}}">
                        @error('email')
                        <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                        @enderror

                        <textarea name="content" id="content" class="form-nary" placeholder="Your message*" onclick="supprimerEspaces()" style="padding: 0.73px; margin: 0; height: 45px; font-size:16px" cols="30" rows="10">
                            {{ old('content') }}
                        </textarea>

                        @error('content')
                        <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                        @enderror
                        <input type="submit" value="Send" class="btn btn-danger">
                    </form>

                </div>


      </section>

</main>

<script>
    function supprimerEspaces() {
        // Récupérer le texte du textarea
        var texte = document.getElementById("content").value;

        // Supprimer les espaces en utilisant la méthode replace()
        var texteSansEspaces = texte.replace(/\s+/g, "");

        // Réattribuer le texte au textarea
        document.getElementById("content").value = texteSansEspaces;
    }
</script>


@endsection
