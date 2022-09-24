@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<h1>商品編集</h1>

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

        <div class="card card-primary">
            <form action="{{ route('update',['id' => $item->id]) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">商品名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ $item->name}}">
                    </div>
                    <div class="form-group">
                        <label for="price">販売価格<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="値段" value="{{ $item->price}}">
                    </div>

                    <div class="form-group">
                        <label for"=category">カテゴリ<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                       
                            <select name="category_id" class="custom-select form-control pl-4">
                                @foreach(Config::get('category_id.tag') as $key => $val)
                                @if($item->category_id === $key)
                                <option value="{{ $key }}" selected>{{ $val }}</option>
                                <!-- oldを付けるとvalueにカテゴリーIDが入らないのでoldはつけない -->
                                @else
                                <option value="{{ $key}}">{{ $val }}</option>
                                @endif
                                @endforeach
                            </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="detail">商品詳細<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明" value="{{ $item->detail}}">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-right"></i> 更新</button>
                </div>
            </form>
            
            <!-- formタグの始まりと終わりを確認
            デベロッパーツールでも確認出来る。
            routeも確認
             -->
            <div class="card-footer">
                <form method="POST" action="{{ route('destroy',['id' => $item->id]) }}" class="flex">
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick='return confirm("削除しますか？");'><i class="fa-solid fa-trash"></i> 削除</button>

                </form>
            </div>
        </div>
    </div>

    @stop

    @section('css')
    @stop

    @section('js')

    @stop