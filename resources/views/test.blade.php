@extends('layouts.app')

@section('content')
    <h1>TEST</h1>


    <div class="max-w-sm">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
            autofocus autocomplete="name" />
    </div>
@endsection
