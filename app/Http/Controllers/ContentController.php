<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $content = Content::with(['icon'])->latest()->paginate(5);
        // $content = Content::with(['icon'])->get();
        // return $content;
        return view('admin',[
            'data' => $content

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Content();
        return view('new',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Content();
        $model->title = $request->title;
        $model->slug = $request->slug;
        $model->user_id = $request->user_id;
        if($request->file('picture')){
            $file = $request->file('picture');

            $nama_file =str_replace(" ", "",time().$file->getClientOriginalName()) ;
            $file->move('picture',$nama_file);
            $model->picture = $nama_file;
        }
        $model->save();
        return redirect('content')->with('success', '{{$model->title}} has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model =Content::find($id);
        return view('fileContent', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Content::find($id);
        return view('update',compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Content::find($id);
        $model->title = $request->title;
        $model->slug = $request->slug;
        $model->user_id = $request->user_id;
        $model->save();
        return redirect('content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= Content::find($id);
        $model->delete();
        return redirect('content');
    }
}
