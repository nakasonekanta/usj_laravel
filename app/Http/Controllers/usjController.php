<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usj;

class UsjController extends Controller
{
    /**
     * usj一覧
     * 
     * @param Request $request
     * @param Request
     */
    public function index(Request $request)
    {
        $usjs = Usj::orderBy('created_at', 'asc')->get();
        return view('usjs.index', [
            'usjs' => $usjs,
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
            Usj::create([
                'user_id' => 0,
                'name' => $request->name
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
        $usj->delete();
        return redirect('/usjs');
    }
}
