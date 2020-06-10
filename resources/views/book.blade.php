@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid p-2" width="360px" height="auto" src="{{ Storage::url($book->image)}}">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">{{$book->name}}</h1><br />
                    <h2 class="text-center">{{$book->author}}</h2>
                </div>
            </div>
            <hr />
            <br />
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        @isset($book->genre)<li><b>{{__('Žánr: ')}}</b>{{$book->genre}}</li>@endisset
                        @isset($book->language)<li><b>{{__('Jazyk: ')}}</b>{{$book->language}}</li>@endisset
                        @isset($book->published_in)<li><b>{{__('Rok vydání: ')}}</b>{{$book->published_in}}</li>@endisset
                    </ul>


                </div>
            </div>
            <hr />
            <br />
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right">
                        <a @auth href="{{ route('bookadd', $book->id) }}" @endauth @guest href=""
                            onclick="event.preventDefault(); alert('Nejdříve se, prosím, přihlašte.');" @endguest
                            class="btn btn-lg btn-success float-right">{{__('Přidat do košíku')}}</a>
                     
                    </div>
                    <h3 class="text-center">{{$book->price . __(' Kč')}}</h3>

                   
                </div>
                <div class="col-md-12">
                <a @auth href="{{ route('bookaddwishlist', $book->id) }}" @endauth @guest href=""
                            onclick="event.preventDefault(); alert('Nejdříve se, prosím, přihlašte.');" @endguest
                            >{{__('Přidat do Wishlistu')}}</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <h3>{{__('Podobné tituly')}}</h3>
    <div class="row justify-content-left">    
        @foreach($similairbooks as $similairbook)
        <div class="card my-card m-3">
            <div class="card-body">
                <h4 class="card-title">{{$similairbook->name}}</h4>
                <p class="card-text">{{$similairbook->author}}</p>

            </div>
            <hr>

            <div class="card-body">
                <p class="card-text">{{$similairbook->price . __(' Kč')}}</p>
                <a href="{{ route('singlebook', $similairbook->id ) }}" class="btn btn-sm btn-primary float-left">{{__('Detail knihy')}}</a>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
