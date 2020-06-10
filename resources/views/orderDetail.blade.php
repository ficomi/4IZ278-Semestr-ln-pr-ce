@extends('layouts.app')

@section('content')
<h2 class="text-center">{{__('Detail objednávky - ') . $order->id}}</h2>
<hr />
<div class="row justify-content-center">
    <div class="row">
        <div class="col-md-12">
            <ul>
                <li>
                    <h4>{{__('Ulice a č.p.: ')}}{{$order->street}}</h4>
                </li>
                <li>
                    <h4>{{__('PSČ: ')}}{{$order->postal_code}}</h4>
                </li>
                <li>
                    <h4>{{__('Město: ')}}{{$order->city}}</h4>
                </li>
                <li>
                    <h4>{{__('Země: ')}}{{$order->country}}</h4>
                </li>
                <li>
                    <h4>{{__('Telefonní číslo: ')}}{{$order->phone_number}}</h4>
                </li>
                <li>
                    <h4>{{__('Stav ojednávky: ')}}{{$order->status}}</h4>
                </li>
                @if(auth()->user()->isAdmin())
                <li>
                    <h4>{{__('Uživatel: ')}}{{$order->user->email}}</h4>
                </li>
                @endif

            </ul>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <thead>
                    <tr>
                        <th>{{__('Autor')}}</th>
                        <th>{{__('Název produktu')}}</th>
                        <th>{{__('Počet koupených knih')}}</th>
                        <th>{{__('Cena v Kč')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td class="text-center align-baseline"> {{$book->author}} </td>
                        <td class="text-center align-baseline"> {{$book->name}} </td>
                        <td class="text-center align-baseline"> {{$book->pivot->count}} </td>
                        <td class="text-center align-baseline"> {{$book->price * $book->pivot->count}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <br />
            <h3 class="float-right">{{__('Celková cena objednávky: ') . $order->price . __(' Kč')}}</h3>
        </div>
    </div>
</div>
<hr />
<div class="col-md-4">
    <a class="btn btn-danger btn-sm float-right" @if(auth()->user()->isAdmin()) href="{{route('adminorders')}}" @else
        href="{{route('orders')}}"
        @endif>{{__('Zpět na seznam objednávek')}}</a>
</div>
@endsection
