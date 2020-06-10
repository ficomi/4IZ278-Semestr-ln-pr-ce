@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('orderconfirm') }}" aria-label="{{ __('Doručení a platba') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Doručení a platba') }}</div>
                    <div class="card-body">


                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('Ulice a č. p.') }}</label>

                            <div class="col-md-6">
                                <input id="street" type="text" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}"
                                    value="{{old('street')}}" required>
                                @if ($errors->has('street'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('PSČ') }}</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="number" name="postal_code" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}"
                                    value="{{old('postal_code')}}" required>
                                @if ($errors->has('postal_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('Město') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{old('city')}}"
                                    required>
                                @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('Zěmě') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                    value="{{old('country')}}" required>
                                @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('Telefonní číslo') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" name="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    value="{{old('phone_number')}}" required>
                                @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="payment" class="col-md-4 col-form-label text-md-right font-weight-bold">{{__('Způsob platby') }}</label>

                            <div class="col-md-6">
                                <select id="payment" class="form-control" name="payment">
                                    <option {{ old('payment') == 'Karta' ? "selected":""}} value="Karta">{{__('Kartou')}}</option>
                                    <option {{ old('payment') == 'Dobírka' ? "selected":""}} value="Dobírka">{{__('Dobírkou')}}</option>
                                </select>
                                @if ($errors->has('payment'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('payment') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pokračovat') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
