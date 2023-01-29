@extends("layouts.template1")

@section("content")

<form method="POST" action="{{route('contact.send')}}">
  @csrf

  <label>Job</label>
  {{ $inputs['email'] }}
  <input name="email" value="{{ $inputs['job'] }}" type="hidden">

  <label>Name</label>
  {{ $inputs['title'] }}
  <input name="title" value="{{ $inputs['name'] }}" type="hidden">

  <label>Mail</label>
  {!! nl2br(e($inputs['body'])) !!}
  <input name="body" value="{{ $inputs['mail'] }}" type="hidden">

  <label>Portfolio</label>
  {{ $inputs['email'] }}
  <input name="email" value="{{ $inputs['portfolio'] }}" type="hidden">

  <label>Query</label>
  {{ $inputs['title'] }}
  <input name="title" value="{{ $inputs['query'] }}" type="hidden">

  <label>Resume</label>
  {!! nl2br(e($inputs['body'])) !!}
  <input name="body" value="{{ $inputs['resume'] }}" type="hidden">

  <label>Curriculum Vitae</label>
  {!! nl2br(e($inputs['body'])) !!}
  <input name="body" value="{{ $inputs['cv'] }}" type="hidden">

  <label>Portfolio</label>
  {!! nl2br(e($inputs['body'])) !!}
  <input name="body" value="{{ $inputs['portfolio'] }}" type="hidden">

  <button type="submit" name="action" value="back">入力内容修正</button>
  <button type="submit" name="action" value="submit">送信する</button>
</form>

@endsection
