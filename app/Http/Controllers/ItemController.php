<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Models\Item;
use App\Models\Category;

use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->category = new Category();
    }

    public function page()
    {
        $inquiries = Inquiry::paginate(5);
        return view('items.search', compact('inquiries'));
    }

    /**
     * 商品一覧&並び替え
     */
    public function index(Request $request)
    {
        // セレクトボックスで選択した値
        $select = $request->select;
        // セレクトボックスの値でソート
        switch ($select) {
            case '1':
                //「指定なし」はID順
                $items = Item::get();
                break;
            case '2':
                // 「価格が低い順」でソート
                $items = Item::orderBy('price', 'asc')->get();
                break;
            case '3':
                // 「価格が高い順」でソート
                $items = Item::orderBy('price', 'desc')->get();
                break;
            default:
                // デフォルトはID順
                $items = Item::get();
                break;
        }
        // dd($select);
        //並び替えを実行した後、下の$items=Item::all()で再度カラムのデータを取得してしまっていた
        //itemsからitems２へ名前を変更し対処

        //フォームを機能させるために各情報を取得して、viewに返す
        $category = new Category;
        $categories = $category->getLists();
        $keyword = $request->input('keyword');
        $categoryId = $request->input('categoryId');
        $items2 = Item::all();
        $items2 = Item::paginate(10);
        return view(
            'item.index',
            compact(
                'items',
                'items2',
                'categories',
                'keyword',
                'categoryId',
                'select'
            )
        );
    }



    /**
     * 商品登録
     */
    public function add(itemRequest $request)
    {

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->detail = $request->detail;

        $item->save();

        return redirect('/');
    }

    /**
     * 登録画面
     */
    public function register(Request $request)
    {
        return view('item.add');
    }

    /*==================================
    検索フォームのみ表示(show)
    ==================================*/
    public function show(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す
        $category = new Category;
        $categories = $category->getLists();
        $keyword = $request->input('keyword');
        $categoryId = $request->input('categoryId');

        return view('item.search', [
            'categories' => $categories,
            'keyword' => $keyword,
            'categoryId' => $categoryId
        ]);
    }
    /*==================================
    検索メソッド(search)
    ==================================*/
    public function search(Request $request)
    {
        //入力される値nameの中身を定義する
        $keyword = $request->input('keyword'); //商品名の値
        $categoryId = $request->input('categoryId'); //カテゴリの値

        $query = Item::query();
        //商品名が入力された場合、itemsテーブルから一致する商品を$queryに代入
        if (isset($keyword)) {
            $query->where('name', 'like', '%' . self::escapeLike($keyword) . '%');
        }
        //カテゴリが選択された場合、categoriesテーブルからcategory_idが一致する商品を$queryに代入
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        //$queryをcategory_idの昇順に並び替えて$itemsに代入
        $items = $query->orderBy('category_id', 'asc')->paginate(10);

        //categoriesテーブルからgetLists();関数でcategory_nameとidを取得する
        $category = new Category;
        $categories = $category->getLists();


        return view('item.search', compact(
            'items',
            'categories',
            'keyword',
            'categoryId',

        ));
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    /**
     * 編集画面
     */
    public function edit(Request $request)
    {
        $item = Item::find($request->id);
        $category = Category::find($request->id);

        return view('item.edit', compact('item', 'category'));
    }

    /**
     *詳細画面
     */
    public function detail(Request $request)
    {
        $item = Item::find($request->id);
        return view('item.detail', compact('item'));
    }

    /**
     *更新機能
     */
    public function update(itemRequest $request)
    {
        //既存のレコードを取得し、編集し保存
        $item = Item::find($request->id);
        // dd($request->all());
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->detail = $request->detail;
        $item->save();
        return redirect()->route('top');
    }

    /**
     *削除機能
     */
    public function destroy($id)
    {
        // 指定されたIDのレコードを削除
        $item = Item::find($id);
        $item->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect()->route('search');
    }

    /**
     * csvダウンロード
     */
    public function download()
    {
        // データ
        $items = Item::all();
        //mb_convert_variables('UTF-8','SJIS',$items);
        // 書き込みモードで開く
        $stream = fopen('php://temp', 'w');
        //カラム名の指定
        $arr = array('id', 'name','category_id', 'price', 'detail', 'created-at');
        
        // 1行目にカラム名のみ書き込む
        fputcsv($stream, $arr);
        // ２行目以降の出力
        foreach ($items as $item) {
            $arrInfo = array(
                'id' => $item->id,
                'name' => $item->name,
                'category_id' =>$item->category_id,
                'price' => $item->price,
                'detail' => $item->detail,
                'created_at' => $item->created_at
            );
            fputcsv($stream, $arrInfo);
        }
        //ファイルポインタを先頭に
        rewind($stream);
        //ストリームを変数に格納
        $csv = stream_get_contents($stream);
        //文字コードを変換
      // mb_convert_variables('SJIS', 'UTF-8','$csv');
      $csv = mb_convert_encoding($csv,'SJIS', 'UTF-8');
        fclose($stream);
        // ファイルダウンロードさせるために、ヘッダー出力を調整
        $headers = array(
            'Content-Type' => 'text/csv',
            'Pragma' => 'no-cache', 
        'Content-Disposition' => 'attachment; filename=test.csv'
        );
        return Response::make($csv, 200,$headers);
    }

/**
 * csvアップロード画面
 * */
public function csv_up(Request $request){
    return view('item.csv');
}

/**
 * csvアップロード画面
 * */
public function up(Request $request)
{

   // CSV ファイル保存
   $tmpName = mt_rand().".".$request->file('csv')->guessExtension(); //TMPファイル名
   $request->file('csv')->move(public_path()."/csv/tmp",$tmpName);
   $tmpPath = public_path()."/csv/tmp/".$tmpName;

   //Goodby CSVのconfig設定
   $config = new LexerConfig();
   $interpreter = new Interpreter();
   $lexer = new Lexer($config);

   //CharsetをUTF-8に変換、CSVのヘッダー行を無視
   $config->setToCharset("UTF-8");
   $config->setFromCharset("UTF-8");
   $config->setIgnoreHeaderLine(true);

   $dataList = [];
    
   // 新規Observerとして、$dataList配列に値を代入
   $interpreter->addObserver(function (array $row) use (&$dataList){
       // 各列のデータを取得
       $dataList[] = $row;
   });

   // CSVデータをパース
   $lexer->parse($tmpPath, $interpreter);

   // TMPファイル削除
   unlink($tmpPath);

   // 登録処理
   foreach($dataList as $row){
       Item::insert(['name' => $row[0] ,'category_id' => $row[1],'price' => $row[2],'detail' => $row[3]]);

       
   }

    return redirect()->route('search');


}
}