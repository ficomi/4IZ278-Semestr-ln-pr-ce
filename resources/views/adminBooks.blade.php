@extends('layouts.app')
@section('content')
<div class="container">
    <h2>{{__('Správa knih')}}</h2>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover text-center table-radius">
                <tbody>
                    <thead>
                        <tr>
                            <th>{{__('Autor')}}</th>
                            <th>{{__("Název")}}</th>
                            <th>{{__('Žánr')}}</th>
                            <th>{{__('Cena v Kč')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($books as $book)
                    <tr>
                        <td class="text-center align-baseline">{{$book->author}}</td>
                        <td class="text-center align-baseline">{{$book->name}}</td>
                        <td class="text-center align-baseline">{{$book->genre}}</td>
                        <td class="text-center align-baseline">{{$book->price}}</td>
                        <td class="text-center align-baseline"><a class="btn btn-sm btn-info"
                                href="{{route('adminbook', $book->id)}}">{{__('Detailní informace knihy')}}</a>
                        </td>
                        <td class="text-center align-baseline">
                            <form method="POST" action="{{ route('adminbookdelete', $book->id)}}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Opravdu smazat?');">{{__('Odstranit knihu')}}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-7">
        <a class="btn btn-primary float-right" href="{{route('adminbookcreate')}}">{{__('Přidat novou knihu')}}</a>
    </div>
</div>
@endsection
