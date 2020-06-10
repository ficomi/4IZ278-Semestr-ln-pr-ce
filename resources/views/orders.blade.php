@extends('layouts.app')
@section('content')
<div class="container">
    @if(auth()->user()->isAdmin()) <h2>{{__('Všechny objednávky')}}</h2> @else <h2>{{__('Moje objednávky')}}</h2> @endif
    <hr />
    <div class="row">
        <div class="col-md-12">
            @if (count($orders)<1) <div class="jumbotron row justify-content-center">
                <h3 class="center-text">{{__('Nemáte žádné objednávky')}}</h3>
        </div>
        @else
        <table class="table table-striped table-bordered table-hover text-center table-radius">
            <tbody>
                <thead>
                    <tr>
                        <th>{{__('Číslo objednávky')}}</th>
                        <th>{{__('Datum vytvoření')}}</th>
                        <th>{{__('Cena objednávky')}}</th>
                        <th>{{__('Stav objednávky')}}</th>
                        <th></th>
                        @if(auth()->user()->isAdmin())
                        <th>{{__('Uživatel')}}</th>
                        <th></th>
                        <th></th>
                        @endif
                    </tr>
                </thead>
                @foreach($orders as $order)
                <tr>
                    <td class="text-center align-baseline">{{$order->id}}</td>
                    <td class="text-center align-baseline">{{$order->created_at}}</td>
                    <td class="text-center align-baseline">{{$order->price . __(' Kč')}}</td>
                    <td class="text-center align-baseline">{{$order->status}}</td>
                    <td class="text-center align-baseline"><a class="btn btn-sm btn-info"
                            href="{{route('ordershow', $order->id)}}">{{__('Detail objednávky')}}</a>
                    </td>
                    @if(auth()->user()->isAdmin())
                    <td>{{$order->user->email}}</td>
                    <td>
                        @if($order->status == 'Doručeno')
                        {{__('Objednávka je doručená.')}}
                        @else
                        <form method="POST" action="{{ route('adminorderstatus', $order->id) }}">
                            @csrf
                            <button class="btn btn-sm btn-info">
                                @if($order->status == 'Objednáno')
                                {{__('Nastavit na "Na cestě"')}}
                                @else
                                {{__('Nastavit na "Doručena"')}}
                                @endif
                            </button>
                        </form>
                        @endif
                    </td>
                    <td class="text-center align-baseline">
                        <form method="POST" action="{{ route('adminorderdelete', $order->id) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Opravdu smazat?');">{{__('Smazat objednávku')}}</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
</div>
@endsection
