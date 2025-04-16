<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;

class AdminPostCategoryController extends Controller
{
    public function index()
    {
        $post_categories = PostCategory::orderBy('name','asc')->get();
        return view('admin.post_category.index',compact('post_categories'));
    }

    public function create()
    {
        return view('admin.post_category.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => ['required', 'unique:post_categories,name'],
            'slug' => ['required', 'alpha_dash', 'unique:post_categories,slug'],
        ],[
            'name.required' => __('Name is required'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug must be unique'),
        ]);

        $obj = new PostCategory();
        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        return redirect()->route('admin_post_category_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $post_category = PostCategory::find($id);
        return view('admin.post_category.edit', compact('post_category'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = PostCategory::find($id);
        $request->validate([
            'name' => ['required', 'unique:post_categories,name,'.$obj->id],
            'slug' => ['required', 'alpha_dash', 'unique:post_categories,slug,'.$obj->id],
        ],[
            'name.required' => __('Name is required'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug must be unique'),
        ]);
        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->update();

        return redirect()->route('admin_post_category_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $posts = Post::where('post_category_id',$id)->get();
        foreach($posts as $post)
        {
            if($post->photo!=null) {
                unlink(public_path('uploads/'.$post->photo));
            }
        }

        Post::where('post_category_id',$id)->delete();
        $obj = PostCategory::find($id);
        $obj->delete();

        return redirect()->route('admin_post_category_index')->with('success', __('Data is deleted successfully'));
    }
}
