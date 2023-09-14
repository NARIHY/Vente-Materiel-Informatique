@extends('admin')
@php
    $title = "";
    if(request()->routeIS('Admin.Product.create')){
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
    @if (request()->routeIS('Admin.Product.create'))
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Nom du produit</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{@old('name')}}">
            @error('name')
                <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror

            <div class="row mb-3">
                <div class="col-6">
                    <label for="Price">Prix</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">Ar</span>
                        <input type="number" name="Price" id="Price" class="form-control @error('Price') is-invalid @enderror" value="{{@old('Price')}}">
                    </div>

                    @error('Price')
                        <p style="color: rgb(190, 4, 4)">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="quantityInStock">Quantité en stock</label>
                    <input type="number" name="quantityInStock" id="quantityInStock" class="form-control @error('quantityInStock') is-invalid @enderror" value="{{@old('quantityInStock')}}">
                    @error('quantityInStock')
                        <p style="color: rgb(190, 4, 4)">{{$message}}</p>
                    @enderror
                </div>


            </div>
            <label for="Description">Petite description du produit</label>
            <textarea name="Description"  height="30px" id="Description" class="form-control @error('Description') is-invalid @enderror" >
            {{@old('Description')}}
            </textarea>
            @error('Description')
                <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror

            <label for="picture">Enter une photo du produit</label>
            <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror">
            @error('picture')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror

            <label for="categoryId">Selectionner une category</label>
            <select name="categoryId" id="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                <option value="">Choisir une catégorie</option>
                @foreach ($category as $k => $v)
                <option value="{{$v}}">{{$k}}</option>
                @endforeach
            </select>
            @error('categoryId')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror

            <label for="sales_information">Selectionner l'information adéquat pour l'article</label>
            <select name="sales_information" id="sales_information" class="form-control @error('sales_information') is-invalid @enderror">
                <option value="">Choisir ...</option>
                @foreach ($sales as $s => $i)
                <option value="{{$i}}">{{$s}}</option>
                @endforeach
            </select>
            @error('sales_information')
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
        <label for="name">Nom du produit</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">
        @error('name')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
        @enderror

        <div class="row mb-3">
            <div class="col-6">
                <label for="Price">Prix</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">Ar</span>
                    <input type="number" name="Price" id="Price" class="form-control @error('Price') is-invalid @enderror" value="{{$product->Price}}">
                </div>

                @error('Price')
                    <p style="color: rgb(190, 4, 4)">{{$message}}</p>
                @enderror
            </div>

            <div class="col-6">
                <label for="quantityInStock">Quantité en stock</label>
                <input type="number" name="quantityInStock" id="quantityInStock" class="form-control @error('quantityInStock') is-invalid @enderror" value="{{$product->quantityInStock}}">
                @error('quantityInStock')
                    <p style="color: rgb(190, 4, 4)">{{$message}}</p>
                @enderror
            </div>


        </div>
        <label for="Description">Petite description du produit</label>
        <textarea name="Description"  height="30px" id="Description" class="form-control @error('Description') is-invalid @enderror" >
        {{@$product->Description}}
        </textarea>
        @error('Description')
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
                @if ($product->picture)
                    <img src="/storage/{{$product->picture}}" alt="{{$product->name}}" width="100%">
                @else
                    <img src="/storage/emptypic.png" alt="Aucune photo" width="70%">
                @endif
            </div>
        </div>



        <label for="categoryId">Selectionner une category</label>
        <select name="categoryId" id="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
            <option value="">Choisir une catégorie</option>
            @foreach ($category as $k => $v)

            <option value="{{$v}}" @if ($v == $product->categoryId) selected @endif>{{$k}}</option>
            @endforeach
        </select>
        @error('categoryId')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror
        <label for="sales_information">Selectionner l'information adéquat pour l'article</label>
            <select name="sales_information" id="sales_information" class="form-control @error('sales_information') is-invalid @enderror">
                <option value="">Choisir ...</option>
                @foreach ($sales as $s => $i)
                <option value="{{$i}}" @if ($i == $product->sales_information) selected @endif>{{$s}}</option>
                @endforeach
            </select>
            @error('sales_information')
            <p style="color: rgb(190, 4, 4)">{{$message}}</p>
            @enderror

        <div class="d-grid gap-2" style="margin-top: 20px">
            <input type="submit" value="Enregistrer" class="btn btn-primary">
        </div>



    </form>
    @endif
</div>


@endsection
