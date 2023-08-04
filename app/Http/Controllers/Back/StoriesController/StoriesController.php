<?php

namespace App\Http\Controllers\Back\StoriesController;

use App\Http\Controllers\Controller;
use App\Models\Stories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoriesController extends Controller
{
    public function storyIndex(){
        $stories = Stories::all();
        return view('back.story.list',compact('stories'));
    }
    public function storyPost(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
        'stories.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif',
        'link' => 'required|min:3',
    ]);

    $story = new Stories();
    $story->redirect_link = $request->link;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = 'story_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
        $directory = 'back/assets/images/stories/';
        $image->move($directory, $name);
        $name = $directory . $name;
        $story->image = $name;
    }

    if ($request->hasFile('stories')) {
        $names = []; 

        foreach ($request->file('stories') as $storyFile) {
            $name = 'story_' . Str::random(6) . '.' . $storyFile->getClientOriginalExtension();
            $directory = 'back/assets/images/stories/';
            $storyFile->move($directory, $name);
            $name = $directory . $name;
            $names[] = $name; 
        }

        $namesJSON = json_encode($names);
        $story->stories = $namesJSON; 
    }
    

    return redirect()->back()->with($story->save() ? 'success' : 'error', true);
}

    public function storyEdit($id){
        $story = Stories::find($id);
        return View('back.story.edit', get_defined_vars());
    }
    public function storyEditPost(Request $request){
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:1024',
            'stories.*' => 'image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif',
            'link' => 'required|min:3',
        ]);

        $story = Stories::find($request->id);
        if(!$story){
            return redirect()->back()->with('error',true);
        }
        
        $story->redirect_link = $request->link;
       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'story_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $directory = 'back/assets/images/stories/';
            $image->move($directory, $name);
            $name = $directory . $name;
            $story->image = $name;
        }
        
        if ($request->hasFile('stories')) {
            $names = []; 
    
            foreach ($request->file('stories') as $storyFile) {
                $name = 'story_' . Str::random(6) . '.' . $storyFile->getClientOriginalExtension();
                $directory = 'back/assets/images/stories/';
                $storyFile->move($directory, $name);
                $name = $directory . $name;
                $names[] = $name; 
            }
    
            $namesJSON = json_encode($names);
            $story->stories = $namesJSON; 
        }
        
        dd($story);
        die;
        return redirect()->back()->with($story->save() ? 'success' : 'error',true);
    }
    public function storyStatus(Request $request){
        $story = Stories::find($request->id);
        if(!$story){
            return response()->json('0');
        }
        $story->status = $story->status == '0' ? '1' : '0';
        return $story->save() ? response()->json('1') : response()->json('0');
    }
    public function storyDelete(Request $request){
        $story = Stories::find($request->id);
        if(!$story){
            return response()->json('0');
        }
        $old_image = $story->image;
        if(file_exists($old_image)){
            unlink($old_image);
        }
        return $story->delete() ? response()->json('1') : response()->json('0');
    }
}
