<?php

namespace Modules\Blog\Http\Controllers;

use Modules\Blog\Entities\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Actions\CreatePost;
use Modules\Blog\Actions\DeletePost;
use Modules\Blog\Actions\UpdatePost;
use Modules\Blog\Entities\PostCategory;
use Modules\Blog\Http\Requests\PostFormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\BlogComment;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class BlogController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the post list.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!userCan('post.view')) {
            return abort(403);
        }

        $posts = Post::with('category')->latest()->get();
        return view('blog::index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!userCan('post.create')) {
            return abort(403);
        }

        $categories = PostCategory::all();

        if ($categories->count() < 1) {
            flashWarning("You don't have any post category. Please create category first.");
            return redirect()->route('module.postcategory.index');
        }

        return view('blog::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param PostFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostFormRequest $request)
    {
        if (!userCan('post.create')) {
            return abort(403);
        }

        $post = CreatePost::create($request);

        if ($post) {
            flashSuccess('Post Created Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Show the form for editing the specified post.
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (!userCan('post.update')) {
            return abort(403);
        }

        $categories = PostCategory::all();

        return view('blog::edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     * @param PostFormRequest $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {
        if (!userCan('post.update')) {
            return abort(403);
        }

        $post = UpdatePost::update($request, $post);

        if ($post) {
            flashSuccess('Post Updated Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified post from storage.
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if (!userCan('post.delete')) {
            return abort(403);
        }

        $post = DeletePost::delete($post);

        if ($post) {
            flashSuccess('Post Deleted Successfully');
            return back();
        } else {
            flashError();
            return back();
        }
    }

    public function comment()
    {
        $comments = BlogComment::where('comment_id', NULL)->latest()->paginate(10);
        return view('blog::comment.index', compact('comments'));
    }

    public function commentDelete($id)
    {
        $comments = BlogComment::findOrFail($id);
        $comments->delete();

        Toastr::success('Blog comment successfully delete :-)','Success');
        return redirect()->back();
    }

    public function commentStatus(Request $request)
    {
        BlogComment::where('id', $request->comment_id)->update([
            'status' => $request->status,
        ]);
        Toastr::success('Blog comment updated successfully :-)','Success');
        return redirect()->back();
    }

    public function commentsReplay(Request $request)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required",
            'body' => "required",
        ]);

        BlogComment::insert([
            'post_id'=>$request->post_id,
            'comment_id'=>$request->comment_id,
            'name'=>$request->name,
            'body'=>$request->body,
            'email'=>$request->email,
            'image'=> 0,
            'status'=> 1,
            'created_at'=> Carbon::now(),
        ]);
        
        Toastr::success('Comment replay done successfully :-)','Success');
        return redirect()->back();
    }

}