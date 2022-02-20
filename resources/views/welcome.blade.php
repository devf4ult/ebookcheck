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
<center>
  <form action="{{route('ebooks.search')}}" method="GET">
    <input type="text" class="form-group col-sm-8 " name="search" placeholder="Check ebooks here..." value="{{ old('search') }}">
    <input type="submit" class="btn btn-primary" value="Search">
  </form>
<br>    
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
    @forelse($data as $ebooks)
    <tr>
    <td>{{$ebooks->name}}</td>
    <td>{{$ebooks->category}}</td>
    <td><a href="{{ url('files', $ebooks->file)}}" class="btn btn-secondary">Read/ Download</a></td>
    <tr>
        @empty
        <p>No Ebooks 😞</p>
    @endforelse
    </tbody>
  </table>
  {{$data->links()}}
</body>
@endsection