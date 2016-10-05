<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Question;
use DB;
use Auth;
use App\User;
use App\Tag;
use App\Notification;





class questionController extends Controller
{

    public function index(){
        $question= Question::orderBy('created_at','desc')
                    ->where('parent_id',null)
                    ->where('parent_answer_id',stringValue())
                    ->paginate(7);

        $questionMark = Question::orderBy('marking', 'desc')
                    ->where('parent_id',null)
                    ->where('parent_answer_id',0)
                    ->paginate(7);


        $topUser=DB::table('users')
                    ->orderBy('rating','desc')
                    ->limit(5)
                    ->get();

        return view('index')->with([
                    'question'=> $question,
                     'questionMark' =>$questionMark,
                    'topUser'      => $topUser,
                ]);
    }

    public function show($id){
        $questions=Question::findOrFail($id);
        if(is_null($questions)){
            abort(404);
        }

        $replyID=$id;


        $reply=Question::all()->where('parent_id',$replyID);
        $count=count($reply);


        $similarQuestion=Question::all()->where('tag_id',$questions->tag_id);


        $comment=Question::all()->where('parent_answer_id', !0);
       


        return view('pages.questions.show')->with([
            'questions'=>$questions,
            'reply' => $reply,
            'similarQuestion' =>$similarQuestion,
            'count' => $count,
        ]);
    }


    public function create(){
        if(Auth::user()) {
            $tag=Tag::all();
            $i=1;
            return view('pages.questions.create')->with(['tag'=>$tag, 'i'=> $i]);
        }else{
            return redirect('/login');
        }
    }


    public function store(Request $request){
        $this->validate($request, [
            'title'  =>'required|',
            'body'   =>'required',
            'tag_id' =>'required',
        ]);
        $marking=2;
        $request['marking']=$marking;

        $question = new Question($request->all());

        Auth::user()->question()->save($question);

        return redirect('/questions');
    }


    public function addAnswer(Request $request,$id){

        $this->validate($request, [
            'body' => 'required',
        ]);
            $marking=0;
            $parent_id=$id;
            $request['parent_id']=$parent_id;
            $request['marking']=$marking;

        $question = new Question($request->all());
        $comment= Auth::user()->question()->save($question);
        if($comment) {
            $comments_id = $comment->id;
            $comments_user_id = $comment->user_id;
            $question_id = $comment->parent_id;


            $question_user_id=(int) DB::select('select user_id from questions where id = :id',
                ['id' => $question_id]);



            $notification = new Notification;

            $notification->question_id = $question_id;
            $notification->comments_id      = $comments_id;
            $notification->question_user_id = $question_user_id;
            $notification->comments_user_id =$comments_user_id;

            $notification->save();

        }



        return redirect()->back();
    }
    public  function addComment(Request $request,$id){
        $this->validate($request,[
            'body'   =>'required',
        ]);
        $answer_id=$id;

        $request['parent_answer_id']=$answer_id;
        $question = new Question($request->all());
        $comment= Auth::user()->question()->save($question);
        return redirect()->back();
    }

//    marking question's
    public function addMark($id){

        $input=Question::findOrFail($id);
        $marking=$input['marking'];

        $userId=$input['user_id'];
        if($userId==auth()->user()->id){

        }else{
            $reputation = DB::table('questions')
                ->where('id', $id)
                ->update(['marking' => 1+$marking]);


            if($reputation){
                $user=User::findOrfail($userId);
                $rating=$user['rating'];


                $updatedRating=  DB::table('users')
                    ->where('id', $userId)
                    ->update(['rating' => .5+$rating ]);
            }



            $this->badges($updatedRating,$userId,$rating);
        }




        return redirect()->back();
    }



    public function minusMark($id){

        $input=Question::findOrFail($id);
        $marking=$input['marking'];
        $userId=$input['user_id'];

        if($userId==auth()->user()->id){

        }else{
            $reputation=DB::table('questions')
                ->where('id', $id)
                ->update(['marking' => $marking-1]);

            if($reputation){
                $user=User::findOrfail($userId);
                $rating=$user['rating'];


                $updatedRating=  DB::table('users')
                    ->where('id', $userId)
                    ->update(['rating' => $rating-.5 ]);
            }
            $this->badges($updatedRating,$userId,$rating);
        }




        return redirect()->back();
    }
//end marking questions




    /*
    |Start marking comments
    |
    */

    public function addCommentMark($id){

        $input=Question::findOrFail($id);
        $marking=$input['marking'];
        $userId=$input['user_id'];


        if($userId==auth()->user()->id){

        }else{
            $reputation=  DB::table('questions')
                ->where('id', $id)
                ->update(['marking' => 2+$marking]);


            if($reputation){
                $user=User::findOrfail($userId);
                $rating=$user['rating'];


                $updatedRating=  DB::table('users')
                    ->where('id', $userId)
                    ->update(['rating' => $rating+.75 ]);
//
                $this->badges($updatedRating,$userId,$rating);

            }
        }


        return redirect()->back();
    }





    public function minusCommentMark($id){
        $input=Question::findOrFail($id);

        $marking=$input['marking'];
        $userId=$input['user_id'];


        if($userId==auth()->user()->id){


        }else {
            $reputation=DB::table('questions')
                ->where('id', $id)
                ->update(['marking' => $marking-2]);

            if($reputation){
                $user=User::findOrfail($userId);
                $rating=$user['rating'];


                $updatedRating=  DB::table('users')
                    ->where('id', $userId)
                    ->update(['rating' => $rating-.75 ]);
            }

            $this->badges($updatedRating,$userId,$rating);

        }

        return redirect()->back();
    }

    /* end minus comment marking */
    public function badges($updatedRating,$userId,$rating){
        if($updatedRating){
            if($rating <=  20){
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['badges' => 1 ]);
            }elseif($rating >20 && $rating <=50){
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['badges' => 2 ]);
            }elseif($rating>50 && $rating <=200){
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['badges' => 3 ]);

            }elseif($rating>200 && $rating<=400){
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['badges' => 4 ]);
            }else{
                DB::table('users')
                    ->where('id', $userId)
                    ->update(['badges' => 5 ]);
            }


        }
    }


}
