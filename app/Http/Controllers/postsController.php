<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use App\Models\User;

use function PHPUnit\Framework\returnSelf;

class postsController extends Controller
{
    public function index()
    {
        $posts=posts::orderBy('id','desc')->paginate();
        return view('posts.index',['posts'=>$posts]);
    }

    public function home()
    {
        $posts=posts::orderBy('id','desc')->paginate();
        return view('home',['posts'=>$posts]);
    }

    public function search(Request $R)
    {
        $search=$R->search;
        $posts=posts::where('description','LIKE',"%".$search."%")->get();
        if($posts){
            return view('posts.search',['posts'=>$posts]);
        }
    }

    public function create()
    {
        $users=User::all();
        return view('posts.add',['users'=>$users]);
    }
    public function edit($id)
    {
        $post=posts::findOrFail($id);
        $users=User::all();
        return view('posts.edit',['post'=>$post,'users'=>$users]);
    }
    public function update($id,Request $R)
    {
        $posts=posts::findOrFail($id);
        $posts->title=$R->title;
        $posts->description=$R->description;
        $posts->user_id=$R->user_id;
        $posts->save();
        return redirect('posts')->with('success','post with id '.$id.' updated successfully');
        // return view('posts.edit',['post'=>$post]);
        // dd($posts);
    }
    public function store(Request $R)
    {
        $R->validate([
            'title' => ['required', 'string','min:3'],
            'description' => ['required', 'string', 'max:1400'],
            'user_id' => ['required', 'exists:users,id'],
        ]);
        $posts=new posts();
        $posts->title=$R->title;
        $posts->description=$R->description;
        $posts->user_id=$R->user_id;
        $posts->save();
        return back()->with('success','post added successfully'); 
        
    }
    public function destroy($id)
    {   
        $post=posts::findOrFail($id);
        $post->delete();
        return back()->with('success','post with id '.$id.' deleted successfully');
    }

    public function show($id){
        $post=posts::findOrFail($id);
        return view('posts.show_post',['post'=>$post]);
    }

}
