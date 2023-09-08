<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usj;

use App\Repositories\UsjRepository;

class UsjController extends Controller
{
    /**
     * usjリポジトリ
     * 
     * @var UsjRepository
     */
    protected $usjs;

    /**
     * コンストラクタ
     * 
     * @return void
     */
    public function __construct(UsjRepository $usjs)
    {
        $this->middleware('auth');

        $this->usjs = $usjs;
    }

    /**
     * usj一覧
     * 
     * @param Request $request
     * @param Request
     */
    public function index(Request $request)
    {
        //$usjs = Usj::orderBy('created_at', 'asc')->get();
       // $usjs = $request->user()->usjs()->get();
        return view('usjs.index', [
            'usjs' => $this->usjs->forUser($request->user()),
        ]);
    }

    /**
        *usj登録
        *
        * @param Request $request
        * @return Response
        */
        public function store(Request $request)
        {
            $this->validate($request, [
                'name' => 'required|max:255',
            ]);
     
            // usj作成
            //Usj::create([
              //  'user_id' => 0,
                //'name' => $request->name
            //]);
            $request->user()->usjs()->create([
                'name' => $request->name,
            ]);
     
            return redirect('/usjs');
        }

        /**
        * usj削除
        *
        * @param Request $request
        * @param Usj $usj
        * @return Response
        */
    public function destroy(Request $request, Usj $usj)
    {
        $this->authorize('destroy', $usj);

        $usj->delete();
        return redirect('/usjs');
    }
}
