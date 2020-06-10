@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">{{__('Úprava knihy')}}</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('adminbookedit', $book->id) }}" aria-label="{{ __('Úprava knihy') }}">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid p-2 rounded mx-auto d-block" width="360px" height="auto" src="{{ Storage::url($book->image)}}">
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row justify-content-center">
                    <label for="image" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('Nová titulní obrázek') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" name="image" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}">
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Informace o knize') }}</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{__('Název knihy') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$book->name}}"
                                    autofocus required>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">{{__('Autor') }}</label>

                            <div class="col-md-6">
                                <input id="author" type="text" name="author" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"
                                    value="{{$book->author}}">
                                @if ($errors->has('author'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('author') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{__('Žánr') }}</label>

                            <div class="col-md-6">
                                <input id="genre" type="text" name="genre" class="form-control{{ $errors->has('genre') ? ' is-invalid' : '' }}" value="{{$book->genre}}">
                                @if ($errors->has('genre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('genre') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{__('Cena v Kč') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" name="price" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                    value="{{$book->price}}" required>
                                @if ($errors->has('price'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-md-4 col-form-label text-md-right">{{__('Jazyk') }}</label>

                            <div class="col-md-6">
                                <input id="language" type="text" name="language" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}"
                                    value="{{$book->language}}">
                                @if ($errors->has('language'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('language') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="published_in" class="col-md-4 col-form-label text-md-right">{{__('Rok vydání') }}</label>

                            <div class="col-md-6">
                                <input id="published_in" type="number" step="1" min="0" name="published_in"
                                    class="form-control{{ $errors->has('published_in') ? ' is-invalid' : '' }}" value="{{$book->published_in}}">
                                @if ($errors->has('published_in'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('published_in') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-success float-right">{{__('Upravit knihu')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
