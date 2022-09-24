@extends('adminlte::page')

@section('title', 'ユーザー情報編集')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<h1 class="justify-content-center">ユーザー情報編集</h1>

@stop

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="row">
    <div class="col-md-12">
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
            <form action="{{ route('up',['id' => $user->id]) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ユーザー名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="名前" value="{{ $user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="メールアドレス" value="{{ $user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">パスワード<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="パスワード" value="{{ $user->password}}">
                    </div>
                    <div class="form-group">
                    <p>権限</p>
                <input type="radio" name="role" value="2" {{ old ('role', $user->role)==2 ? "checked" : "" }} />管理者
                <input type="radio" name="role" value="1" {{ old('role', $user->role)==1 ? "checked" : "" }} />利用者<br />
             
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-right"></i> 更新</button>
                    <a href="{{ route('list') }}" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left"></i>戻る</a>
                </div>
            </form>
            
               
                
               
        </div>
    </div>
</div>
</div>
</div>


</div>
</div>
@stop

@section('css')
@stop

@section('js')

@stop