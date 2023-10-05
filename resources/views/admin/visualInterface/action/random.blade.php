@extends('admin')
@php
    $title = "";
    if(request()->routeIS('Admin.Interface.Home.create')){
        $title = 'Création d\'une publication';
    } else {
        $title = 'Edition d\'une publication';
    }
@endphp
@section('title', $title)

@section('content')

<div class="pagetitle">
    <h1>Acceuil du site</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="">acceuil du site</a></li>
      </ol>
    </nav>
</div>

@if (session('error'))
    <div class="alert alert-danger">
        <p class="text-center">{{session('error')}}</p>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        <p class="text-center">{{session('success')}}</p>
    </div>
@endif
@php
    $resize = new App\Perso\Resize();
@endphp

<div class="container">
    @if (request()->routeIS('Admin.Interface.Home.create'))

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Titre du publication</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{@old('title')}}">
        @error('title')
            <p style="color:rgb(114, 19, 19)"> {{$message}} </p>
        @enderror



        <label for="media">Ajouter une video ou une photo</label>
        <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
        @error('picture')
            <p style="color:rgb(114, 19, 19)"> {{$message}} </p>
        @enderror

        <label for="content">Contenu de la publication</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">
            {{@old('content')}}
        </textarea>
        @error('content')
        <p style="color:rgb(114, 19, 19)"> {{$message}} </p>
        @enderror

        <div class="d-grid gap-2" style="margin-top: 20px">

            <button class="btn btn-primary" type="submit">Créer</button>
        </div>
    </form>
    @else

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="title">Titre du publication</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$home->title}}">
        @error('title')
            <p style="color:rgb(114, 19, 19)"> {{$message}} </p>
        @enderror

        <div class="row mb-3" style="margin-top: 20px">
            <div class="col-6">
                <label for="media" >Ajouter une photo</label>
                <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
                @error('picture')
                    <p style="color:rgb(114, 19, 19)"> {{$message}} </p>
                @enderror
            </div>
            <div class="col-6">
                <img src="/storage/{{$home->picture}}" alt="" width="100%">


            </div>
        </div>
        <label for="content" style="margin-top: 20px">Contenu de la publication</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">
                            {{$home->content}}
                        </textarea>
                        @error('content')
                        <p style="color:rgb(114, 19, 19)"> {{$message}} </p>
                        @enderror
                        <div class="d-grid gap-2" style="margin-top: 20px">
                            <button class="btn btn-primary" type="submit">Modifier</button>
                        </div>
    </form>

    @endif
</div>

@endsection
