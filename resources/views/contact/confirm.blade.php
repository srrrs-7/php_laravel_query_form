@extends("layouts.template1")

@section("content")

<div class="flex justify-center items-center mt-10">    
        <h1 colspan="1" class="text-2xl">Check Form</h1>
</div>

<div class="flex justify-center items-center border border-black m-10 p-10 bg-amber-50">

  <form method="POST" action="{{route('contact.send')}}">
      @csrf

      <div class="flex flex-col">
        <div class="flex">
          <label class="mr-10">Job</label>
          {{ $inputs['job'] }}
          <input name="job" value="{{ $inputs['job'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Name</label>
          {{ $inputs['name'] }}
          <input name="name" value="{{ $inputs['name'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Mail</label>
          {!! nl2br(e($inputs['email'])) !!}
          <input name="email" value="{{ $inputs['email'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Portfolio</label>
          {{ $inputs['portfolio'] }}
          <input name="portfolio" value="{{ $inputs['portfolio'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Query</label>
          {!! nl2br(e($inputs['query'])) !!}
          <input name="query" value="{{ $inputs['query'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Resume</label>
          {{ $inputs['file1'] }}
          <input name="file1" value="{{ $inputs['file1'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Curriculum Vitae</label>
          {{ $inputs['file2'] }}
          <input name="file2" value="{{ $inputs['file2'] }}" type="hidden">
        </div>

        <div class="flex">
          <label class="mr-10">Portfolio</label>
          {{ $inputs['file3'] }}
          <input name="file3" value="{{ $inputs['file3'] }}" type="hidden">
        </div>

      </div>
      
      <div class="flex justify-center items-center mt-10">
        <button type="submit" name="action" value="back" class="border border-black bg-slate-200 p-1 mr-10">入力内容修正</button>
        <button type="submit" name="action" value="submit" class="border border-black bg-slate-200 p-1">送信する</button>
      </div>

  </form>
</div>

@endsection
