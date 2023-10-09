@extends('admin')

@section('title', 'Message received')

@section('content')
<div class="pagetitle">
    <h1>Message received</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Message received</li>
      </ol>
    </nav>
  </div>
  <div class="container">
    <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last name</th>
            <th scope="col">Subject of conversation</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
    @forelse ($contact as $contacts)

        <tr>
          <th scope="row">{{$contacts->id}}</th>
          <td>{{$contacts->name}}</td>
          <td>{{$contacts->last_name}}</td>

          <td>{{$contacts->subject}}</td>

          <td>
            <a href="{{route('Admin.Contact.view', ['id' => $contacts->id])}}" class="btn btn-primary">Show</a>

          </td>
        </tr>
    @empty
        <tr>
            <th scope="row"></th>
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
