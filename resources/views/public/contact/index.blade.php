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
                    <h1 class="text-center" style="color: rgb(0, 0, 0)" style="margin-top: -15px">Contact us</h1>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <input type="text" name="name" id="name" class="form-nary-contact" placeholder="Your name*" value="{{@old('name')}}">
                            @error('name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">

                            <input type="text" name="last_name" id="last_name" class="form-nary-contact" placeholder="Your lastname*" value="{{@old('last_name')}}">
                            @error('last_name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                    </div>



                    <input type="text" name="subject" id="subject" class="form-nary-contact" placeholder="Your topic of conversation*" value="{{@old('subject')}}">
                    @error('subject')
                        <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror


                    <input type="email" name="email" id="email" class="form-nary-contact" placeholder="Your email address" value="{{@old('email')}}">
                    @error('email')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror
                    <label for="content" style="color: #ffffff; text-align:left">Your message*</label>
                    <textarea name="content" id="content"  class="form-nary-contact" placeholder="Your message*">
                        {{@old('content')}}
                    </textarea>
                    @error('content')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror

                    <div class="text-center" style="margin-top: 20px">
                                <input type="submit" value="Send" class="btn btn-danger">
                            </div>

                </form>
                @endif
                @if(request()->routeIS('Public.Contact.product'))
                <form action="{{route('Public.Contact.productSave', ['id' => $id])}}" method="post">
                    <h1 class="text-center" style="color: rgb(0, 0, 0)" style="margin-top: -15px">Contact us</h1>
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">

                            <input type="text" name="name" id="name" class="form-nary-contact" placeholder="Your name*" value="{{@old('name')}}">
                            @error('name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">

                            <input type="text" name="last_name" id="last_name" class="form-nary-contact" placeholder="Your lastname*" value="{{@old('last_name')}}">
                            @error('last_name')
                            <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                            @enderror
                        </div>
                    </div>



                    <input type="text" name="subject" id="subject" class="form-nary-contact" placeholder="Your topic of conversation*" value="{{@old('subject')}}">
                    @error('subject')
                        <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror


                    <input type="email" name="email" id="email" class="form-nary-contact" placeholder="Your email address" value="{{@old('email')}}">
                    @error('email')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror
                    <label for="content" style="color: #ffffff; text-align:left">Your message*</label>
                    <textarea name="content" id="content"  class="form-nary-contact" placeholder="Your message*">
                        {{@old('content')}}
                    </textarea>
                    @error('content')
                    <p style="color:rgb(158, 0, 0)">{{$message}}</p>
                    @enderror

                    <div class="text-center" style="margin-top: 20px">
                                <input type="submit" value="Send" class="btn btn-danger">
                            </div>

                </form>
                @endif
        </div>

    </div>
</div>
</section>
