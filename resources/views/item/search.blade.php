@extends('adminlte::page')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

{{-- JQUeryをCDNで読み込む --}}
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<main>
  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">検索結果画面/商品管理画面</h2>
      <br>
    <!--検索フォーム-->
    <div class="row">
        <div class="col-sm">
          <form method="GET" action="{{ route('search')}}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">商品名</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="keyword" value="{{ $keyword }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary "><i class="fa-solid fa-magnifying-glass"> </i>検索</button>
              </div>
            </div>
            <!--プルダウンカテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">カテゴリー</label>
              <div class="col-sm-5">
                <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                  <option value="">未選択</option>

                  @foreach($categories as $id => $category_name)
                  <option value="{{ $id }}">
                    {{ $category_name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
  

  <!--検索結果テーブル 検索された時のみ表示する-->
  @if (!empty($items))
  <div class="table-responsive">
    <table class="table table-striped table-bordered mt-5 table-hover">
     
    <thead style="background-color: #00d9ff">
        <tr>
          <th style="width:30%">商品名</th>
          <th>商品カテゴリ</th>
          <th>価格</th>
          <th>更新日時</th>
          <th></th>
        </tr>
      </thead>
      @can('Admin')
      <a href="{{ route('item_register') }}" class="btn btn-primary"><i class="fa-solid fa-check"></i>商品登録</a>
  @endcan
      <div class="mx-auto">
<div class="row">
            <div class="col-sm">
            <div class="col-auto">
            <p>全{{ $items->total() }}件中{{ $items->firstItem() }}〜{{ $items->lastItem() }} 件を表示</p>
          
        </div>
      </div>
      </div>
      </div>
      @foreach($items as $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->category->category_name }}</td>
        <td>{{ $item->price }}円</td>
        <td>{{ $item->updated_at }}</td>
        @can('Admin')
        <td><a href="{{ route('edit',['id'=>$item->id]) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>編集</a></td>
      @endcan
      </tr>
      @endforeach
    </table>
  </div>
  <!--テーブルここまで-->
  <!--ページネーション-->
  <div class="pagination justify-content-center">
  {{ $items->links('vendor.pagination.bootstrap-4') }}
            
          </div>
  <!--ページネーションここまで-->
  @endif
  </div>

</main>

@endsection