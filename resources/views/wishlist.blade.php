@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{__('Můj wishlist')}}</h1>
    <hr />
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($books)<1) <div class="jumbotron text-center">
                <h3>{{__('Ve vašem wishlistu nic není')}}</h3>
        </div>
        @else
        <form method="POST" action="{{ route('updatecount') }}">
            @csrf
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <thead class="thead-info">
                    <tr>
                        <th>{{__('Autor')}}</th>
                        <th>{{__('Název produktu')}}</th>
                        <th>{{__('Cena jednoho kusu v Kč')}}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td class="text-center align-baseline"> {{$book->author}} </td>
                        <td class="text-center align-baseline"> {{$book->name}} </td>
                        <td class="text-center align-baseline"> {{$book->price}} </td>
                        <td class="text-center align-baseline"><a class="btn btn-danger"
                                href="{{ route('wishlistdelete', $book->id) }}" onclick="event.preventDefault();
                        document.getElementById('delete{{$book->id}}').submit();">{{__('Odebrat z Wishlistu')}}</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        @endif
    </div>
</div>
</div>
@foreach ($books as $book)
<form id="delete{{$book->id}}" method="POST" action="{{ route('wishlistdelete', $book->id) }}">
    @csrf
    @method('delete')
</form>
@endforeach
@endsection
