<h1>Tin Mới nhất </h1><br>
@foreach ($data as $item)
<h2>{{ $item->tieude }}</h2>
<br><em>Ngày đăng: {{ $item->ngaydang }}</em> 
<hr>  
<br>

@endforeach