<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsCollection;
use App\Http\Resources\News as NewsResource;
use App\Models\Cryptocurrency;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $new = DB::table('news')->orderBy('id','desc')->limit(8)->get();
        $new = News::all();
        
        return response()->json([
            'data' => $new
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'resume' => 'required',
            'image' => 'required'
        ]);
 
        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->image = $request->image;
 
        if (News::create($news))
            return response()->json([
                'success' => true,
                'data' => $news->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'No se ha podido añadir la noticia.'
            ], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=  News::find($id);
        

        return response()->json([
            'data' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = News::find($id);
 
        if (!$new) {
            return response()->json([
                'success' => false,
                'message' => 'News not found'
            ], 400);

        }

        $updated = $new->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'News can not be updated'
            ], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);

        if (!$new) {
            return response()->json([
                'success' => false,
                'message' => 'No se ha encontrado la noticia'
            ], 400);
        }

        if ($new->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se puede borrar la noticia'
            ], 500);
        }
    }

    /**
     * Display a last New.
     *
     * @return \Illuminate\Http\Response
     */
    public function last()
    {
        $new = DB::table('news')->orderBy('id','desc')->limit(1)->get();
        return response()->json([
            'data' => $new
        ]);

    }

    /**
     * Find news for criptocurrency.
     *
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $crypto = Cryptocurrency::find($id);
        $news = $crypto->news;
        return response()->json([
            'data' => $news
        ]);

    }

    /**
     * Find news .
     *
     * @return \Illuminate\Http\Response
     */
    public function findNew($id)
    {
        $news = News::find($id);
        $crypto = $news->criptocurrency;
        return response()->json([
            'news' => $news,
            'crypto' => $crypto
        ]);

    }

}
