@extends("layouts.template1")

@section("content")

<div class="flex justify-center items-center mt-10">    
        <h1 colspan="1" class="text-2xl">Entry Form</h1>
</div>

<div class="flex justify-center items-center border border-black mx-64 my-10 bg-amber-50">

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
                                    <input class="" type="radio" id="inlineRadio01" name="job" value="frontend" checked {{ old('job','frontend') == 'frontend' ? 'checked' : '' }}>
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
                            <div class="flex mx-20">
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
                                        <label for="inputFile1">Resume (PDF)</label>
                                        <p class="text-red-400 text-3xl mr-[105px]">&nbsp;*</p>
                                        <label for="inputFile1" class="p-1 bg-slate-200 border border-black hover:bg-slate-100">Select File</label>
                                        <input type="file" id="inputFile1" name="file1" accept="pdf, jpg" class="mb-3" style="display:none;">
                                        <div id="file1" class="ml-10"></div>
                                        @if ($errors->has('file1'))
                                            <p class="justify-center items-center ml-2 text-red-400">{{ $errors->first('file1') }}</p>
                                        @endif
                                    </div>

                                    <script>
                                        const input1 = document.getElementById("inputFile1")
                                        input1.addEventListener("change", (e) => {
                                            const file = e.target.files[0].name;
                                            document.getElementById("file1").innerHTML = file;

                                            // base64 logic
                                            const file1 = e.target.files[0];
                                            const reader1 = new FileReader()
                                            reader1.onload = (e) => {
                                                const base64Text = e.target.result
                                                input1.file = base64Text
                                            }
                                            reader1.readAsDataURL(file1)
                                        });
                                    </script>

                                    <div class="flex m-2">
                                        <label for="inputFile2">Curriculum Vitae (PDF)</label>
                                        <p class="text-red-400 text-3xl mr-[43px]">&nbsp;*</p>
                                        <label for="inputFile2" class="p-1 bg-slate-200 border border-black hover:bg-slate-100">Select File</label>
                                        <input type="file" id="inputFile2" name="file2" accept="pdf, jpg" class="mb-3" style="display:none;">
                                        <div id="file2" class="ml-10"></div>
                                        @if ($errors->has('file2'))
                                            <p class="justify-center items-center ml-2 text-red-400">{{ $errors->first('file2') }}</p>
                                        @endif
                                    </div>

                                    <script>
                                        const input2 = document.getElementById("inputFile2")
                                        input2.addEventListener("change", (e) => {
                                            const file = e.target.files[0].name;
                                            document.getElementById("file2").innerHTML = file;
                                            
                                            // base64 logic
                                            const file2 = e.target.files[0];
                                            const reader2 = new FileReader()
                                            reader2.onload = (e) => {
                                                const base64Text = e.target.result
                                                input2.file = base64Text
                                            }
                                            reader2.readAsDataURL(file2)
                                        });
                                    </script>

                                    <div class="flex m-2">
                                        <label for="inputFile3">Portfolio (PDF)</label>
                                        <p class="text-red-400 text-3xl mr-[100px]">&nbsp;*</p>
                                        <label for="inputFile3" class="p-1 bg-slate-200 border border-black hover:bg-slate-100">Select File</label>
                                        <input type="file" id="inputFile3" accept="pdf, jpg" name="file3" class="mb-3" style="display:none;">
                                        <div id="file3" class="ml-10"></div>
                                        @if ($errors->has('file2'))
                                            <p class="justify-center items-center ml-2 text-red-400">{{ $errors->first('file2') }}</p>
                                        @endif
                                    </div>

                                    
                                    <script>
                                        const input3 = document.getElementById("inputFile3")
                                        input3.addEventListener("change", (e) => {
                                            const file = e.target.files[0].name;
                                            document.getElementById("file3").innerHTML = file;

                                            // base64 logic
                                            const file3 = e.target.files[0];
                                            const reader3 = new FileReader()
                                            reader3.onload = (e) => {
                                                const base64Text = e.target.result
                                                input3.file = base64Text
                                            }
                                            reader3.readAsDataURL(file3)
                                        });
                                    </script>
                                </div>
                            </td>
                        </tr>

                </tbody>
            </table>
        </div>
        
        <!-- confirm -->
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
