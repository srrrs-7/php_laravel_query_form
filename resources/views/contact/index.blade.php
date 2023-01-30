@extends("layouts.template1")

@section("content")

<div class="flex justify-center items-center mt-10">    
        <h1 colspan="1" class="text-2xl">Entry Form</h1>
</div>

<div class="flex justify-center items-center border border-black m-20 bg-amber-50">

    <form method="POST" action="{{route('contact.confirm')}}" enctype="multipart/form-data">
        @csrf
        <div class="flex justify-start items-center">
            
            <table>
                <tbody>
                <!-- job -->
                    <tr>
                        <td>
                            <div class="flex mt-20 mx-20">
                                <label>Job</label>
                                <p class="text-red-400 text-3xl">&nbsp;*</p>
                            </div>
                        </td>
                        <td>
                            <div class="flex flex-row mt-20">
                                <div class="mr-5">
                                    <input class="" type="radio" id="inlineRadio01" name="job" value="frontend" {{ old('job','frontend') == 'frontend' ? 'checked' : '' }}>
                                    <label class="" for="inlineRadio01">frontend</label>
                                </div>
                                <div class="mx-10">
                                    <input class="" type="radio" id="inlineRadio02"  name="job" value="backend" {{ old('job','backend') == 'backend' ? 'checked' : '' }}>
                                    <label class="" for="inlineRadio02">backend</label>
                                </div>
                                <div class="mx-10">
                                    <input class="" type="radio" id="inlineRadio03"  name="job" value="infrastructure" {{ old('job','infrastructure') == 'infrastructure' ? 'checked' : '' }}>
                                    <label class="" for="inlineRadio03">infrastructure</label>
                                </div>
                            </div>
                            @if ($errors->has('job'))
                                <p class="text-red-400">{{ $errors->first('job') }}</p>
                            @endif
                        </td>
                    </tr>

                    <!-- name -->
                    <tr>
                        <td>
                            <div class="flex mt-10 mb-10 mx-20">
                                <label for="name">Name</label>
                                <p class="text-red-400 text-3xl">&nbsp;*</p>
                            </div>
                        </td>
                        <td>
                            <div class="my-10">
                                <input
                                    class="border border-black p-1 w-80"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    type="text"
                                >
                                @if ($errors->has('name'))
                                    <p class="text-red-400">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- mail address -->
                    <tr>
                        <td>
                            <div class="flex mb-5 mx-20">
                                <label for="email">mail address</label>
                                <p class="text-red-400 text-3xl ">&nbsp;*</p>
                            </div>
                        </td>
                        <td>
                            <div class="">
                                <input
                                    class="border border-black p-1 w-80"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    type="text"
                                >
                                @if ($errors->has('email'))
                                    <p class="text-red-400">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="flex mb-10 mx-20">
                                <label for="check">check mail address</label>
                                <p class="text-red-400 text-3xl">&nbsp;*</p>
                            </div>
                        </td>
                        <td>
                            <div class="mb-10">
                                <input
                                    class="border border-black p-1 w-80"
                                    name="check"
                                    id="check"
                                    value="{{ old('email') }}"
                                    type="text"
                                >
                                @if ($errors->has('email'))
                                    <p class="text-red-400">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- portfolio -->
                    <tr>
                        <td>
                            <div class="mb-10">
                                <label for="portfolio" class="mx-20">Portfolio (URL)</label>
                            </div>
                        </td>
                        <td>    
                            <div class="mb-10">
                                <input
                                    class="border border-black p-1 w-80"
                                    name="portfolio"
                                    id="portfolio"
                                    value="{{ old('portfolio') }}"
                                    type="text"
                                >
                                @if ($errors->has('portfolio'))
                                    <p class="text-red-400">{{ $errors->first('portfolio') }}</p>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- query content -->
                        <tr>
                            <td>
                                <div class="mb-10">
                                    <label for="query" class="mx-20">Query</label>
                                </div>
                            </td>
                            <td>    
                                <div class="mb-10">
                                    <textarea class="border border-black p-3 w-96" name='query'>{{ old('query') }}</textarea>
                                    @if ($errors->has('query'))
                                        <p class="text-red-400">{{ $errors->first('query') }}</p>
                                    @endif
                                </div>
                            </td>
                        </tr>

                    <!-- file upload -->
                        <tr>
                            <td>
                                <div class="mb-10">
                                    <label class="mx-20">Upload</label>
                                </div>
                            </td>
                            <td>    
                                <div class="mb-10">
                                    <div class="flex m-2">
                                        <label for="file1">Resume</label>
                                        <p class="text-red-400 text-3xl mr-[105px]">&nbsp;*</p>
                                        <label for="file1" class="p-1 bg-slate-200 border border-black hover:bg-slate-100">Resume</label>
                                        <input type="file" id="file1" name="file1" class="mb-3" style="display:none;">
                                        <p>{{ old("file1") }}</p>
                                        @if ($errors->has('file1'))
                                            <p class="justify-center items-center ml-2 text-red-400">{{ $errors->first('file1') }}</p>
                                        @endif
                                    </div>

                                    <div class="flex m-2">
                                        <label for="file2">Curriculum Vitae</label>
                                        <p class="text-red-400 text-3xl mr-[43px]">&nbsp;*</p>
                                        <label for="file2" class="p-1 bg-slate-200 border border-black hover:bg-slate-100">Curriculum Vitae</label>
                                        <input type="file" id="file2" name="file2" class="mb-3" style="display:none;">
                                        <p>{{ old("file2") }}</p>
                                        @if ($errors->has('file2'))
                                            <p class="justify-center items-center ml-2 text-red-400">{{ $errors->first('file2') }}</p>
                                        @endif
                                    </div>

                                    <div class="flex m-2">
                                        <label for="file3">Portfolio</label>
                                        <p class="text-red-400 text-3xl mr-[100px]">&nbsp;*</p>
                                        <label for="file3" class="mr-[120px] p-1 bg-slate-200 border border-black hover:bg-slate-100">Portfolio</label>
                                        <input type="file" id="file3" name="file3" class="mb-3" style="display:none;">
                                        <p>{{ old("file3") }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>

                </tbody>
            </table>
        </div>
        
        <!-- appropriate -->
        <div class="flex justify-center items-center mb-10">
            <input class="mr-5 w-5 h-5" type="checkbox" id="agree" name="agree">
            <p class="text-xl">I agree with the agreement</p>
        </div>

        <div class="flex justify-center items-center my-3">
            <button class="border border-black p-3 bg-blue-200 hover:scale-110" type="submit">入力内容確認</button>
        </div>
        
    </form>
</div>



@endsection
