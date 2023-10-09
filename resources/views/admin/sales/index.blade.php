@extends('admin')

@section('title', 'Liste de tous nos produit')

@section('content')
<div class="pagetitle">
    <a href="{{route('Admin.Sales.create')}}" class="btn btn-success" style="float: right">Add new iformation</a>
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
            <th scope="col">Content</th>

            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    @forelse ($sales as $s)

        <tr>
          <th scope="row">{{$s->id}}</th>
          <td>{{$s->description}}</td>
          <td>
            <div class="row mb-3">
                <div class="col-6">
                    <a href="{{route('Admin.Sales.edit', ['id' =>$s->id])}}" class="btn btn-primary"> Edit</a>
                </div>
                <div class="col-6">
                    <form action="{{route('Admin.Sales.delete', ['id' =>$s->id])}}" method="post">
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


            <td>Empty</td>

            <td></td>
        </tr>

    @endforelse
</tbody>
    </table>
  </div>
@endsection
