@extends('adminlte::page')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- JQUeryをCDNで読み込む --}}
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<main>
    <div class="container">
        <div class="mx-auto">
            <br>
            <h2 class="text-center">商品詳細画面</h2>
            <br>





            <!--検索結果テーブル 検索された時のみ表示する-->

            <div class="itemTable">
                <table class="table table-striped table-bordered mt-5 table-hover">
                    <thead style="background-color: #00d9ff">
                        <tr>
                            <th style="width:30%">商品名</th>
                            <th>商品カテゴリ</th>
                            <th>価格</th>
                            <th>詳細説明</th>
                            <th>更新日時</th>

                        </tr>
                    </thead>

                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ url('items/') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left"></i>戻る</a>
                        </div>
                    </div>
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->category_name }}</td>
                        <td>{{ $item->price }}円</td>
                        <td>{{ $item->detail }}</td>
                        <td>{{ $item->updated_at }}</td>

                    </tr>

                </table>
            </div>
        </div>
</main>

@endsection