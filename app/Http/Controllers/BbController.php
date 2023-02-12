<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use App\Http\Requests\StoreBbsRequest;
use App\Http\Requests\UpdateBbsRequest;

class BbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bbs/bbs', ['bbses' => Bb::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBbsRequest $request)
    {
        $bbs = new Bb();               // Modelをインスタンス化
        $bbs->create($request->all());  // requestからfillを通してモデルを作成後、登録処理
        return redirect('/bbs/bbs');        // indexへリダイレクト
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bb  $bb
     * @return \Illuminate\Http\Response
     */
    public function show(Bb $bb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bb  $bb
     * @return \Illuminate\Http\Response
     */
    public function edit(Bb $bb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bb  $bb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bb $bb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bb  $bb
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bbs::destroy($id);
        return redirect('/bbs/bbs');
    }
}
