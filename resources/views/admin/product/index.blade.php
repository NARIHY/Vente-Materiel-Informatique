@extends('admin')

@section('title', 'Liste de tous nos produit')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.Product.create')}}" class="btn btn-success" style="float: right">Ajouter un produit</a>
    <h1>Gestion de produit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <div class="container">
    <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix</th>
            <th scope="col">Quantité en stock</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

    @forelse ($product as $p)
    <tbody>
        <tr>
          <th scope="row">{{$p->id}}</th>
          <td>{{$p->name}}</td>
          @php
           // $cat = App\Models\Category::findOrFail($p->categoryId);
          @endphp
          <td>{{$p->categoryId}}</td>

          <td>{{$p->Price}}</td>
          <td>{{$p->quantityInStock}}</td>
          <td>
            <div class="row mb-3">
                <div class="col-6">
                    <a href="{{route('Admin.Product.edit', ['id' =>$p->id])}}" class="btn btn-primary"> Editer</a>
                </div>
                <div class="col-6">
                    <form action="{{route('Admin.Product.delete', ['id' =>$p->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Suprimer">
                    </form>

                </div>
            </div>

          </td>
        </tr>
      </tbody>
    @empty
    <tbody>
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td>Vide pour le moment</td>
            <td></td>
            <td></td>
        </tr>
      </tbody>
    @endforelse
    </table>
  </div>
@endsection
