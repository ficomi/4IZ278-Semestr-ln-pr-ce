@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$header}}</h3>
    <hr>
    <div class="row justify-content-left">
        @foreach($books as $book)
        <div class="card my-card m-3 xdcard">
            <div class="card-body">
                <h4 class="card-title">{{$book->name}}</h4>
                <ul class="listnostyle">
                    <li>{{__('Autor: ') .$book->author}}</li>
                    <li>{{__('Jazyk: ') .$book->language}}</li>
                </ul>
                <hr>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <span class="card-text">{{$book->price . __(' Kč')}}</span>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('singlebook', $book->id ) }}"
                                class="btn btn-sm btn-primary float-right">{{__('Detail knihy')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
