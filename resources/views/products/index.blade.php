@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>lista produktow</h1>
            </div>
            <div class="col-6 ">
                <a href="{{route('products.create')}}" class="btn btn-primary float-end ">Dodaj</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Ilość</th>
                    <th scope="col">Cena</th>
                    <th scope="col">{{__('shop.product.fields.category')}}</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->amount}}</td>
                        <td>{{$product->price}}</td>
                            <td>@if(!is_null($product->category)) {{$product->category->name}}@endif</td>
                        <td>
                            <a href="{{route('products.edit' , $product->id)}}" class="btn btn-sm btn-primary me-2">Edytuj</a>
                            <a href="{{route('products.show' , $product->id)}}" class="btn btn-sm btn-primary me-2">Podgląd</a>
                            <button class="btn btn-danger btn-sm delete" data-id="{{$product->id}}">Usun</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
@section('javascript')
        const deleteUrl = "{{ url('products') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
