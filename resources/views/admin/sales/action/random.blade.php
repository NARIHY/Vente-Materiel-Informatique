@extends('admin')
@php
    $title = "";
    if(request()->routeIS('Admin.Sales.create')){
        $title = 'Ajout \'un nouveau produit';
    } else {
        $title = 'Edition \'un produit';
    }
@endphp
@section('title', $title)

@section('content')

<div class="pagetitle">
    <h1>Acceuil du site</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
        <li class="breadcrumb-item"><a href="">Gestion de proudit</a></li>
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
    @if (request()->routeIS('Admin.Sales.create'))
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <label for="description">Nom du produit</label>
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{@old('description')}}">
            @error('description')
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
        <label for="description">Nom du produit</label>
            <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{$sales->description}}">
            @error('description')
                <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror



        <div class="d-grid gap-2" style="margin-top: 20px">
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </div>



    </form>
    @endif
</div>


@endsection
