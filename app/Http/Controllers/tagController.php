<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Question;
use DB;
use App\User;

class tagController extends Controller
{
     public function index(){

         $tag= Tag::orderBy('created_at','asc')->paginate(20);

         return view('pages.tags.index')->with('tag',$tag);
     }

    public function description($id){

        $tag=Tag::findOrfail($id);

        if(is_null($tag)){
            abort(404);
        }
        $tagID=$tag->id;


        $similarQuestion=Question::where('tag_id',$tagID)->get();
        $similarTag = Tag::where(DB::raw('tag_name'), 'LIKE', "%{$tag->tag_name}%")->get();

        return view('pages.tags.description')->with([
            'tag' =>$tag,
            'similarQuestion'=>$similarQuestion,
            'similarTag' =>$similarTag,
        ]);
    }

    public function add(Request $request){

        $this->validate($request, [
            'tag_name' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();

        Tag::create($input);

        Session::flash('flash_message','Your tag has been created!');
        $tag=Tag::all();
        $index=1;

        return view('/admin/tag')->with(
                ['tag' =>$tag,

                'index' => $index ]);

    }

    public function destroy($id)
    {
        Tag::findOrfail($id)->delete();



        return redirect('/admin/tag');
    }

    public function update($id){
      $tag=Tag::findOrfail($id);
        if(is_null($tag)){
            abort(404);
        }
        return view('admin/tagEdit')->with('tag',$tag);

    }
    public function postUpdate(Request $request,$id){
        $this->validate($request, [
            'tag_name' => 'required',
            'description' => 'required',
        ]);

        $input = $request->all();
        $data=Tag::findOrfail($id);
        if(is_null($data)){
            abort(404);
        }
        $data->update($input);
        return redirect('/admin/tag');


    }
    public function getTags(Request $request)
    {
        $query = $request->input('query');
        if ($query == null) {
            return redirect()->back();
        }

        $tag = Tag::where(DB::raw('tag_name'), 'LIKE', "%{$query}%")->get();

        return view('pages.tags.tagSearch')->with('tag', $tag);


    }
}
