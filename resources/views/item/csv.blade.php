@extends('adminlte::page')

@section('content_header')
<h1>商品登録用CSVインサート画面</h1>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/di
st/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


@stop

@section('content')
    <p class="text-center">DBに追加したいCSVデータを選択してください。</p>
    <form  action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
      @csrf
         <div class="input-group mb-3">
  <input type="file" class="form-control" name="csv" id="csv">
  <button type="submit" class="btn btn-success"><i class="fa-solid fa-file-import"></i>  CSVインポート</button>
</div>
    </form>
   

@stop