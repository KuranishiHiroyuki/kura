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
      <h2 class="text-center">商品一覧画面</h2>

      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-md-12">
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

     <!-- 並び替え -->
  
     <div class="row">
            <div class="col-sm">
              <form id="form">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"> 並び替え</label>
                  <div class="col-sm-5">
                 <select name="select" id="number" class="form-control">
                  <option value="1" {{ $select == '1' ? 'selected': '' }}>指定なし</option>
                  <option value="2" {{ $select == '2' ? 'selected': '' }}>価格が低い順</option>
                  <option value="3" {{ $select == '3' ? 'selected': '' }}>価格が高い順</option>
                </select>
              </form>
 
            </div>
            </div>
          </div>
</div>
@can('Admin')
<a href="{{ route('csv') }}" class="btn btn-primary"><i class="fa-solid fa-file-arrow-down"></i> CSVダウンロード</a>
      @endcan
<div class="mx-auto">
<div class="row">
            <div class="col-sm">        
    <div class="col-auto">
    <p>
      全{{ $items2->total() }}件中{{ $items2->firstItem() }}〜{{ $items2->lastItem() }} 件を表示
    </p>
   
</div>
</div>
</div>
            </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered mt-5 table-hover">
     
        <thead style="background-color: #00d9ff">
          <tr>

            <th>ID</th>
            <th>商品名</th>
            <th>カテゴリー</th>
            <th>値段</th>
            <th>更新日時</th>
          </tr>
        </thead>
       <tbody>
          @foreach($items2 as $item)
          <tr>

            <th class='table-text'>{{ $item->id }}</th>
            <td class='table-text'><a href="/items/detail/{{$item->id}}">{{ $item->name }}</a></td>
            <td class='table-text'>{{ $item->category->category_name }}</td>
            <td class='table-text'>{{ $item->price }}</td>
            <td class='table-text'>{{ $item->created_at }}</td>

          </tr>
          @endforeach

        </tbody>
      </table>
      <!--ページネーション-->
      <div class="pagination justify-content-center">
        {{ $items2->links('vendor.pagination.bootstrap-4') }}
      </div>
      <!--ページネーションここまで-->


      <script>
        $(function($) {
          $('#number').change(function() {
            $('#form').submit();
          });
        });
      </script>
</main>

@endsection