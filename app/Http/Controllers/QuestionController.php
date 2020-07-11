<?php

namespace App\Http\Controllers;

use App\Question;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $questions = Question::all();
      $users = Auth::user();
      return view('question.index',compact('questions','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::all();
      return view('question.form',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'title'=>'required',
        'description'=>'required'
      ]);
      
      $request->all();
      $request["user_id"] = Auth::user()->id;
      
      $questions = Question::create([
        "title"=>$request["title"],
        "description"=>$request["description"],
        "user_id"=>$request["user_id"],
      ]);

      
      $tagsArr = explode(',',$request->tags);
      
      $tagsMulti = [];
      foreach($tagsArr as $strTag){
        $tagsArrAssc["name"] = $strTag;
        $tagsMulti[] = $tagsArrAssc;
      }
      
      foreach($tagsMulti as $tagsCheck){
        $tags = Tag::firstOrCreate($tagsCheck);
        $questions->tag()->attach($tags->id);
      }

      

      // dd($data);
      return redirect('/question');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $questions = Question::find($id);
      $tags = Tag::all();
      return view('question.show',compact('questions','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $questions = Question::find($id);
      $users = Auth::user();
      $tags = Tag::all();

      if($users->id === $questions->user_id){
        return view('question.edit',compact('questions','tags'));
      }
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
      $this->validate($request,[
        'title'=>'required',
        'description'=>'required'
      ]);
      $data = $request->all();
      $questions = Question::find($id)->update($data);

      return redirect('/question');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Question::find($id)->delete();

      return redirect('/question');
    }
}
