@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
<h1>商品登録</h1>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@stop

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
        <div class="card card-primary">
        <form action="{{ route('add') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">商品名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前"}}">
                  
                    <div class="form-group">
                        <label for="price">販売価格<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="値段">
                    </div>
                    <div class="form-group">
                        <label for="category">カテゴリ<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label><br>
                        <select name="category_id" class="form-control">
                            @foreach(Config::get('category_id.tag')  as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail">商品詳細<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i>  登録</button>
                    <a href="{{ url('items/') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left"></i>戻る</a>

                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop