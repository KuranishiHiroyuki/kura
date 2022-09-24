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
      <h2 class="text-center">商品管理画面</h2>
      <br>
    <!--検索フォーム-->
    <div class="row">
        <div class="col-sm">
          <form method="GET" action="{{ route('admin')}}">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">ユーザー名</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="keyword" value="{{ $keyword }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary "><i class="fa-solid fa-magnifying-glass"> </i>検索</button>
              </div>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
  

  <!--検索結果テーブル 検索された時のみ表示する-->
  @if (!empty($users))
  <div class="table-responsive">
    <table class="table table-striped table-bordered mt-5 table-hover">
     
    <thead style="background-color: #00d9ff">
        <tr>
          <th style="width:30%">ユーザー名</th>
          <th>メールアドレス</th>
          <th>更新日時</th>
          <th></th>
        </tr>
      </thead>
      <a href="{{ route('register') }}" class="btn btn-primary"><i class="fa-solid fa-check"></i>ユーザー登録</a>
  
      <div class="mx-auto">
<div class="row">
            <div class="col-sm">
            <div class="col-auto">
            <p>全{{ ＄users->total() }}件中{{ $users->firstItem() }}〜{{ $users->lastItem() }} 件を表示</p>
          
        </div>
      </div>
      </div>
      </div>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->updated_at }}</td>
        <td><a href="{{ route('edit',['id'=>$user->id]) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>編集</a></td>
      </tr>
      @endforeach
    </table>
  </div>
  <!--テーブルここまで-->
  <!--ページネーション-->
  <div class="pagination justify-content-center">
  {{ $users->links('vendor.pagination.bootstrap-4') }}
            
          </div>
  <!--ページネーションここまで-->
  @endif
  </div>

</main>

@endsection