<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

   //更新
   public function up(UsersRequest $request){
     //既存のレコードを取得し、編集し保存
     $user = User::find($request->id);
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password =Hash::make($request->password);
     $user->role = $request->role;
     $user->save();
     return redirect()->route('/');
   }

    //ユーザー情報編集画面
    public function user_edit(Request $request){
        $user = User::find($request->id);
return view('user.user_edit',compact('user'));
    }
    /**
     * ユーザー一覧
     */
    public function list(Request $request)
    {
        $keyword = $request->input('keyword');
        $role = $request->role;
        $query = User::query();
        if(!empty($keyword))
            {
                $query->where('email','like','%'.$keyword.'%');
                $query->orWhere('name','like','%'.$keyword.'%');
            
            }
        if(!empty($role))
        {
            $query->Where('role','like','%'.$role.'%');
        }
        // 全件取得 +ページネーション
        $users = $query->orderBy('id','asc')->paginate(10);
        return view('user.index')->with('users',$users)->with('keyword',$keyword)->with('role',$role);
    }

    /**log out */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login')->with('logout', 'ログアウト！');;
    }
}
