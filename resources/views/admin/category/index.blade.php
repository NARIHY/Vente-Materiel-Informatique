@extends('admin')

@section('title', 'Liste de tous nos produit')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.Category.create')}}" class="btn btn-success" style="float: right">Ajouter une catégorie</a>
    <h1>Gestion de produit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Gestion de catégorie</li>
      </ol>
    </nav>
  </div>

  <div class="container">

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
    <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du catégorie</th>
            <th scope="col">Action</th>

          </tr>
        </thead>


    <tbody>
        @forelse ($category as $c)
        <tr>
          <th scope="row">{{$c->id}}</th>
          <td>{{$c->name}}</td>

          <td>
            <div class="row mb-3">
                <div class="col-6">
                    <a href="{{route('Admin.Category.edit', ['id' => $c->id])}}" class="btn btn-primary"> Editer</a>
                </div>
                <div class="col-6">
                    <form action="" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Suprimer">
                    </form>

                </div>
            </div>

          </td>
        </tr>

    @empty

        <tr>
            <th scope="row"></th>
            <td>Aucune catégorie pour le moment</td>
            <td></td>
        </tr>

    @endforelse
</tbody>
    </table>
  </div>
@endsection
