@extends('layouts.main')

@section('title')
    {{ $item->model }} {{ $item->name }} - Copy Star
@endsection

@section('body')
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-5">
                    <img src="{{ $item->img }}" width="100%" alt="">
                </div>
            </div>
            <div class="col-8">
                <h2>{{ $item->model }} {{ $item->name }} <span class="badge bg-warning text-dark">{{ $item->year }}</span></h2><hr>

                <p><b>Страна-производитель: </b>{{ $item->country }}</p>
                <p><b>Год выпуска: </b>{{ $item->year }}</p>
                <p><b>Модель: </b>{{ $item->model }}</p>

                <h4 class="my-4">{{ $item->price }} руб.</h4>

                @if (Auth::check())
                @if ($item->amount > 0)
                <button type="button" data-item="{{ $item->id }}" onclick="addToCart(this)" class="btn btn-warning btn-sm"><b>Добавить в корзину</b></button>
                @else
                <button type="button" data-item="{{ $item->id }}" onclick="addToCart(this)" class="btn btn-warning btn-sm" disabled><b>Добавить в корзину</b></button>
                @endif
                
                @endif
            </div>
        </div>
    </div>

@endsection