@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

{{-- Faire en FR et EN (lang) --}}
@section('title', __('title.home'))
@section('description', __('description.home'))

@section('content')
    <div class="entrepot">
        <a href="{{ route('warehouse.login') }}">{{ __('basics.warehouse') }}</a>
    </div>

    <div class="magasin">
        <a href="{{ route('store.login') }}">{{ __('basics.store') }}</a>
    </div>


    {{-- Ajouter ca dans le header et dans la page login sous forme de drapeau --}}
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span>{{ $locale_name }}</span>
        @else
            <a href="{{ route('lang.switch', $available_locale) }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
@endsection