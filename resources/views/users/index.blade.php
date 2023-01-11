@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">E-mail</th>
      <th scope="col">Imie</th>
      <th scope="col">Naziwsko</th>
      <th scope="col">Numer Telefonu</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
        <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->email}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->phone_number}}</td>
        <td>
            <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}">X</button>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
        {{ $users->links() }}
    </div>
</div>
@endsection
@section('javascript')
    $(function() {
        $( ".delete" ).click(function() {
             console.log($(this).data('id'))
            });
    });
@endsection
