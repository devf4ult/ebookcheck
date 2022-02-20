@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <title></title>
</head>
<body>
  <div class="container">
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif

  <form action="{{route('ebooks.searchAdminVersion')}}" method="GET">
  <a href="{{route('ebooks.create')}}">
    <button type="button" class="btn btn btn-success">Add</button></a>
    <input type="text" class="form-group col-sm-8 " name="keyword" value="{{ old('search') }}">
    <input type="submit" class="btn btn-primary" value="Search">
  </form>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $ebooks)
      <tr>
        <th scope="row">{{$ebooks->id}}</th>
        <td>{{$ebooks->name}}</td>
        <td>{{$ebooks->category}}</td>
        <td>
            <form action="{{ route('ebooks.destroy',$ebooks->id) }}" method="post">
              <a href="{{ url('files', $ebooks->file)}}" class="btn btn-secondary">Read/ Download</a>
              <a class="btn btn btn-warning" href="{{ route('ebooks.edit', $ebooks->id)}}">Edit</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn btn-danger" onclick="return confirm('Are u sure?')">Delete</button>
            </form>    
        </td>
      </tr>
      <tr>
      @endforeach

    </tbody>
  </table>
      {{$data->links()}}

</body>
@endsection
