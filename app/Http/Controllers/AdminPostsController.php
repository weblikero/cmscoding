<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AdminPostsRequests;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view ('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostsRequests $request)
    {

        $user = Auth::user();
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }
        $user->posts()->create($input);
        Session::flash('created_post','The Post was created with success');
        return redirect('/admin/posts');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        $post = Post::findOrFail($id);
//
//
//        return view('home.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','categories'));
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


        $post = Post::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);
            $photo =Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;


        }
        $post->update($input);
        Session::flash('updated_post','The Post #'.$post->title.' was updated with success');
        return redirect('/admin/posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->photo()) {

            if (!empty($post->photo->file)) {
                unlink(public_path().'/images/' . $post->photo->file);
//                $post->photo()->delete();
            }
    }
        $post->delete();

        Session::flash('deleted_post','The post was deleted');

        return redirect('/admin/posts');
    }


    public function post($id){
        $post = Post::findOrFail($id);
        $comments = $post->comments()->whereIsActive(1)->get();

         return view('post', compact('post','comments','replies'));

    }
}
