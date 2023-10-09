@extends('public')

@section('title', 'Nous contactés')

@section('content')
<section id="hero">
<div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="bloc">
        <video id="myVideo" autoplay loop muted>
            <source src="{{asset('public/assets/video/contact.mp4')}}" type="video/mp4" muted="">

        </video>
        <div>
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




        <div class="container" style="margin-top: 20vh ; text-align:left">


                @if (request()->routeIS('Public.Contact.contacts'))
                <form action="{{route('Public.Contact.contactsSave')}}" method="post">
                    <h1 class="text-center" style="color: rgb(0, 0, 0)" style="margin-top: -15px">Nous contacter</h1>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <input type="text" name="name" id="name" class="form-nary-contact" placeholder="Votre nom*" value="{{@old('name')}}">
                            @error('name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">

                            <input type="text" name="last_name" id="last_name" class="form-nary-contact" placeholder="Votre prénon*" value="{{@old('last_name')}}">
                            @error('last_name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                    </div>



                    <input type="text" name="subject" id="subject" class="form-nary-contact" placeholder="Votre sujet de conversation*" value="{{@old('subject')}}">
                    @error('subject')
                        <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror


                    <input type="email" name="email" id="email" class="form-nary-contact" placeholder="Votre addresse email" value="{{@old('email')}}">
                    @error('email')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror
                    <label for="content" style="color: #ffffff; text-align:left">Votre message*</label>
                    <textarea name="content" id="content"  class="form-nary-contact" placeholder="Un petit message">
                        {{@old('content')}}
                    </textarea>
                    @error('content')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror

                    <div class="d-grid gap-2" style="margin-top: 20px">
                        <input type="submit" value="Send" width="100%" class="btn btn-danger">
                    </div>
                </form>
                @endif
                @if(request()->routeIS('Public.Contact.product'))
                <form action="{{route('Public.Contact.productSave', ['id' => $id])}}" method="post">
                    <h1 class="text-center" style="color: blue" style="margin-top: -15px">Nous contacter</h1>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" style="color: #333; text-align:left">Votre nom: (*)</label>
                            <input type="text" name="name" id="name" class="form-nary-contact" placeholder="Joseph" value="{{@old('name')}}">
                            @error('name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" style="color: #333; text-align:left">Votre prénon: (*)</label>
                            <input type="text" name="last_name" id="last_name" class="form-nary-contact" placeholder="Jean" value="{{@old('last_name')}}">
                            @error('last_name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                    </div>


                    <label for="subject" style="color: #333; text-align:left">Votre sujet de conversation: (*)</label>
                    <input type="text" name="subject" id="subject" class="form-nary-contact" placeholder="Sujet de conversation" value="{{@old('subject')}}">
                    @error('subject')
                        <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror

                    <label for="email" style="color: #333; text-align:left">Votre addresse email: (*)</label>
                    <input type="email" name="email" id="email" class="form-nary-contact" placeholder="Exemple@gmail.com" value="{{@old('email')}}">
                    @error('email')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror
                    <label for="content" style="color: #333; text-align:left">Votre message (*)</label>
                    <textarea name="content" id="content"  class="form-nary-contact" placeholder="Un petit message">
                        {{@old('content')}}
                    </textarea>
                    @error('content')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror

                    <div class="d-grid gap-2" style="margin-top: 20px">
                        <input type="submit" value="Send" class="btn btn-primary">
                    </div>
                </form>
                @endif
        </div>

    </div>
</div>


</section>
