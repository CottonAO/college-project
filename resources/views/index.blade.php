@extends('layouts.main')

@section('title')
Copy Star - Интернет-магазин
@endsection

@section('body')

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Copy Star</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <button class="btn btn-warning btn-lg" type="button">Регистрация</button>
    </div>
</div>

<section id="catalog">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h5>Категории</h5>
                <ul class="list-group">
                    @foreach ($categories as $c)
                    <a href="{{ route('category', ['id' => $c->id]) }}" class="category"><li class="list-group-item shadow-sm">{{ $c->name }}</li></a>
                    @endforeach
                </ul>
            </div>
            <div class="col-9">
                <div class="d-flex justify-content-between mb-2 ">
                    @if (isset($catName))
                    <h5>{{ $catName->name }}</h5>
                    <div>
                        <select id="sort" class="form-select d-inline-block" onchange="filter(this, event, {{$catName->id}})" on>
                            <option selected disabled>Сортировать</option>
                            <option value="year">по году производства</option>
                            <option value="name">по наименованию</option>
                            <option value="price">по цене</option>
                        </select>
                    </div>
                    @else
                    <h5>Все товары</h5>
                    <div>
                        <select id="sort" class="form-select d-inline-block" onchange="filter(this, event)">
                            <option selected disabled>Сортировать</option>
                            <option value="year">по году производства</option>
                            <option value="name">по наименованию</option>
                            <option value="price">по цене</option>
                        </select>
                    </div>
                    @endif
                </div>
                
                <div id="items">
                    @include('incl.item')
                </div>

            </div>
        </div>
    </div>
</section>

@endsection