@extends('admin')

@section('title', 'Liste de tous nos produit')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.Product.create')}}" class="btn btn-success" style="float: right">Add new product</a>
    <h1>Product management</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
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
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Quantité in stock</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    @forelse ($product as $p)

        <tr>
          <th scope="row">{{$p->id}}</th>
          <td>{{$p->name}}</td>

          @php
            $cat = App\Models\Category::findOrFail($p->categoryId);
          @endphp
          <td>{{$cat->name}}</td>

          <td>{{$p->Price}}</td>
          <td>{{$p->quantityInStock}}</td>
          <td>
            <div class="row mb-3">
                <div class="col-6">
                    <a href="{{route('Admin.Product.edit', ['id' =>$p->id])}}" class="btn btn-primary"> Edit</a>
                </div>
                <div class="col-6">
                    <form action="{{route('Admin.Product.delete', ['id' =>$p->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </div>
            </div>

          </td>
        </tr>
    @empty
        <tr>
            <th scope="row"></th>
            <td></td>
            <td></td>
            <td>Empty</td>
            <td></td>
            <td></td>
        </tr>

    @endforelse
</tbody>
    </table>
  </div>
@endsection
