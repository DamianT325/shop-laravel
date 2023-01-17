@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Podgląd produktu</div>

                    <div class="card-body">
                        <form >
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{__('shop.fields.name')}}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $product->name }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">Opis</label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="1500" class="form-control" name="description"  disabled>{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="amount" class="col-md-4 col-form-label text-md-end">Ilość</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control" name="amount" value="{{ $product->amount}}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-end">Cena</label>
                                <div class="col-md-6">
                                    <input id="price" type="number"class="form-control" name="price" value="{{ $product->price }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">Zdjecie</label>
                                <div class="col-md-6">
                                    @if(!is_null($product->image_path))
                                        <img src="{{asset('storage/'. $product->image_path)}}" class="img-fluid h-10" >
                                    @else
                                        <input id="image" type="file" class="form-control" name="image" disabled>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

