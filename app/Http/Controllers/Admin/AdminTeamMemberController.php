<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\TeamMemberExperience;
use Illuminate\Validation\Rule;

class AdminTeamMemberController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::orderBy('id','asc')->get();
        return view('admin.team_member.index',compact('team_members'));
    }

    public function create()
    {
        return view('admin.team_member.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => ['required', 'unique:team_members'],
            'slug' => ['required', 'alpha_dash', 'unique:team_members'],
            'designation' => ['required'],
            'photo' => ['required','mimes:jpeg,png,gif'],
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug already exists'),
            'designation.required' => __('Designation is required'),
            'photo.required' => __('Photo is required'),
            'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
        ]);

        $obj = new TeamMember();

        $final_name = 'team_member_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name);
        $obj->photo = $final_name;

        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->designation = $request->designation;
        $obj->tagline = $request->tagline;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->website = $request->website;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;
        $obj->youtube = $request->youtube;
        $obj->pinterest = $request->pinterest;
        $obj->experience_text = $request->experience_text;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->save();

        return redirect()->route('admin_team_member_index')->with('success', __('Data is added successfully'));
    }

    public function edit($id)
    {
        $team_member = TeamMember::find($id);
        return view('admin.team_member.edit', compact('team_member'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = TeamMember::find($id);
        $request->validate([
            'name' => ['required', Rule::unique('team_members')->ignore($id)],
            'slug' => ['required', 'alpha_dash', Rule::unique('team_members')->ignore($id)],
            'designation' => ['required'],
        ],[
            'name.required' => __('Name is required'),
            'name.unique' => __('Name already exists'),
            'slug.required' => __('Slug is required'),
            'slug.alpha_dash' =>  __('Slug can contain only letters, numbers, hyphens, and underscores'),
            'slug.unique' => __('Slug already exists'),
            'designation.required' => __('Designation is required'),
        ]);
        if($request->photo != null) {
            $request->validate([
                'photo' => ['mimes:jpeg,png,gif'],
            ],[
                'photo.mimes' => __('Photo must be jpeg, png, jpg or gif'),
            ]);
            if($obj->photo) {
                unlink(public_path('uploads/'.$obj->photo));
            }
            $final_name = 'team_member_'.time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->slug = strtolower($request->slug);
        $obj->designation = $request->designation;
        $obj->tagline = $request->tagline;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->website = $request->website;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;
        $obj->youtube = $request->youtube;
        $obj->pinterest = $request->pinterest;
        $obj->experience_text = $request->experience_text;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->update();

        return redirect()->route('admin_team_member_index')->with('success', __('Data is updated successfully'));
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = TeamMember::find($id);
        if($obj->photo) {
            unlink(public_path('uploads/'.$obj->photo));
        }
        $obj->delete();

        TeamMemberExperience::where('team_member_id',$id)->delete();

        return redirect()->route('admin_team_member_index')->with('success', __('Data is deleted successfully'));
    }

    public function experience($id)
    {
        $team_member = TeamMember::find($id);
        $experiences = TeamMemberExperience::where('team_member_id',$id)->orderBy('id','asc')->get();
        return view('admin.team_member.experience',compact('team_member','experiences'));
    }

    public function experience_store(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => ['required'],
            'percentage' => ['required', 'numeric', 'min:1', 'max:100'],
        ],[
            'name.required' => __('Name is required'),
            'percentage.required' => __('Percentage is required'),
        ]);
        $obj = new TeamMemberExperience();
        $obj->team_member_id = $id;
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->save();

        return redirect()->back()->with('success', __('Data is added successfully'));
    }

    public function experience_update(Request $request,$id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }

        $obj = TeamMemberExperience::find($id);
        $request->validate([
            'name' => ['required'],
            'percentage' => ['required', 'numeric', 'min:1', 'max:100'],
        ],[
            'name.required' => __('Name is required'),
            'percentage.required' => __('Percentage is required'),
        ]);
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->update();

        return redirect()->back()->with('success', __('Data is updated successfully'));
    }

    public function experience_destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('info', env('PROJECT_NOTIFICATION'));
        }
        
        $obj = TeamMemberExperience::find($id);
        $obj->delete();

        return redirect()->back()->with('success', __('Data is deleted successfully'));
    }
}
