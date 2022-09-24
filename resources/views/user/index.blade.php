@extends('adminlte::page')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main>
    <div class="container">
        <div class="mx-auto">
            <br>
            <h2 class="text-center">ユーザー 一覧画面</h2>
            <br>
            <!--検索フォーム-->
            <div class="row">
                <div class="col-sm">
                    <form method="GET" action="{{ route('list')}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">キーワード</label>
                            <!--入力-->
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="keyword" value="{{ $keyword }}">
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary ">検索</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

    </div>
    <br>
    <p>全{{ $users->total() }}件中{{ $users->firstItem() }}〜{{ $users->lastItem() }} 件を表示</p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered mt-5 table-hover">
            <thead style="background-color: #00d9ff">
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>権限</th>
                    <th>更新日時</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>

                    <th class='table-text'>{{ $user->id }}</th>
                    <td class='table-text'>{{ $user->name }}</td>
                    <td class='table-text'>{{ $user->email }}</td>
                    <td class='table-text'>{{ $user->role }}</td>
                    <td class='table-text'>{{ $user->updated_at }}</td>
                    <td><a href="{{ route('user_edit',['id'=>$user->id]) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i>編集</a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <!--ページネーション-->
        <div class="pagination justify-content-center">
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </div>
        <!--ページネーションここまで-->


</main>

@endsection