@extends("layouts.template1")

@section("content")
{{ __('送信完了') }}

<div class="flex justify-center items-center text-blue-500 underline">  
    <a href="{{route('contact.index')}}">
        <p>HOME</p>
    </a>
</div>


@endsection