@extends('admin')
@php
    $title = "";
    if(request()->routeIS('Admin.Category.create')){
        $title = 'Ajout \'un nouvelle catégorie';
    } else {
        $title = 'Edition \'une catégorie';
    }
@endphp
@section('title', $title)

@section('content')

<div class="pagetitle">
    <h1>Acceuil du site</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="">Gestion de catégorie</a></li>
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
<div class="container">
    @if (request()->routeIS('Admin.Category.create'))
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Nom du catégorie</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{@old('name')}}">
            @error('name')
                <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror

            <label for="picture">Enter une photo du produit</label>
            <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
            @error('picture')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror



            <div class="d-grid gap-2" style="margin-top: 20px">
                <input type="submit" value="Enregistrer" class="btn btn-primary">
            </div>



        </form>
    @else
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Nom du catégorie</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$category->name}}">
        @error('name')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
        @enderror


        <div class="row mb-3" style="margin-top: 20px">
            <div class="col-6">
                <label for="picture">Enter une photo du produit</label>
                <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
                @error('picture')
                <p style="color: rgb(190, 4, 4)">{{$message}}</p>
                @enderror
            </div>
            <div class="col-6">
                @if ($category->picture)
                    <img src="/storage/{{$category->picture}}" alt="{{$category->name}}" width="100%">
                @else
                    <img src="/storage/emptypic.png" alt="Aucune photo" width="70%">
                @endif
            </div>
        </div>
        <div class="d-grid gap-2" style="margin-top: 20px">
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </div>



    </form>
    @endif
</div>


@endsection
