<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('rPostCategory')->orderBy('id','desc')->get();
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
        $post_categories = PostCategory::orderBy('name', 'asc')->get();
        return view('admin.post.create', compact('post_categories'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = new Post();
        
        $request->validate([
            'title' => ['required', 'unique:posts,title'],
            'slug' => ['required', 'alpha_dash', 'unique:posts,slug'],
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ],[
            'title.required' => __('Title is required'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug must be unique'),
            'description.required' => __('Description is required'),
            'photo.required' => __('Photo is required'),
            'photo.image' => __('Photo must be an image'),
            'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
        ]);

        if($request->tags == null) {
            $tags = '';
        } else {
            $tags = implode(',', $request->tags);
        }

        $final_name = 'post_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $obj->photo = $final_name;
        
        $obj->post_category_id = (int)$request->post_category_id;
        $obj->title = $request->title;
        $obj->slug = strtolower($request->slug);
        $obj->description = $request->description;
        $obj->tags = $tags;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        return redirect()->route('admin_post_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $post_categories = PostCategory::orderBy('name', 'asc')->get();
        $post_tags = explode(',',$post->tags);
        return view('admin.post.edit', compact('post', 'post_categories', 'post_tags'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = Post::find($id);
        
        $request->validate([
            'title' => ['required', 'unique:posts,title,'.$id],
            'slug' => ['required', 'alpha_dash', 'unique:posts,slug,'.$id],
            'description' => ['required'],
        ],[
            'title.required' => __('Title is required'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug must be unique'),
            'description.required' => __('Description is required'),
        ]);

        if($request->tags == null) {
            $tags = '';
        } else {
            $tags = implode(',', $request->tags);
        }

        if($request->photo != null) {
            $request->validate([
                'photo' => 'mimes:jpg,jpeg,png',
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);

            if($obj->photo!=null) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            
            $final_name = 'post_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->post_category_id = (int)$request->post_category_id;
        $obj->title = $request->title;
        $obj->slug = strtolower($request->slug);
        $obj->description = $request->description;
        $obj->tags = $tags;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->update();

        return redirect()->route('admin_post_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = Post::find($id);
        if($obj->photo != null) {
            unlink(public_path('uploads/'.$obj->photo));
        }
        $obj->delete();

        return redirect()->route('admin_post_index')->with('success', __('Data is deleted successfully'));
    }
}
