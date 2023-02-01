<!-- mail format -->

お問い合わせ内容を受け付けました。<br>
<br>
■job<br>
{!! $job !!}<br>
<br>
■name<br>
{!! $name !!}<br>
<br>
■email<br>
{!! nl2br($email) !!}<br>
<br>
■portfolio url<br>
{!! $portfolio !!}<br>
<br>
■Query<br>
{!! nl2br($query) !!}<br>
<br>
■Resume<br>
<a href="data:application/pdf;{{ $file1 }}" download>file1</a>
<br>
<br>
■Curriculum Vitae<br>
<a href="data:application/pdf;{{ $file2 }}" download>file2</a>
<br>
<br>
■Portfolio<br>
<a href="data:application/pdf;{{ $file3 }}" download>file3</a>
</br>