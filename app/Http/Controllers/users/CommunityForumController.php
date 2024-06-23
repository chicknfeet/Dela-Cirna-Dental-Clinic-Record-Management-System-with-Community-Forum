<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use App\Models\CommunityForum;
use Illuminate\Http\Request;

class CommunityForumController extends Controller
{
    public function index(){
        $communityforums = CommunityForum::all();
        return view('users.communityforum.communityforum', compact('communityforums'));
    }

    public function createCommunityforum(){
        return view('users.communityforum.create');
    }

    public function storeCommunityforum(Request $request){
        $request->validate([
            'post' => 'required|string',
        ]);

        $communityforum = CommunityForum::create([
            'post' => $request->input('post'),
        ]);

        return redirect()->route('communityforum')
            ->with('success', 'Post added successfully!');
    }

    public function deleteCommunityforum($id){
        $communityforum = CommunityForum::findOrFail($id);
        $communityforum->delete();

        return back()
            ->with('success', 'Post deleted successfully!');
    }

    public function updateCommunityforum($id){
        $communityforum = CommunityForum::findOrFail($id);
        return view('users.communityforum.updateCommunityforum')->with('communityforum', $communityforum);
    }

    public function updatedCommunityforum(Request $request, $id){

        $communityforum = CommunityForum::findOrFail($id);
        
        $request->validate([
            'post' => 'required|string',
        ]);

        $communityforum->update([
            'post' => $request->input('post'),
        ]);

        return redirect()->route('communityforum')
            ->with('success', 'Post updated successfully!');
    }

    public function createComment(){
        return view('users.communityforum.createComment');
    }

    public function storeComment(Request $request){
        $request->validate([
            'post' => 'required|string',
        ]);

        $communityforum = CommunityForum::create([
            'post' => $request->input('post'),
        ]);

        return redirect()->route('communityforum')
            ->with('success', 'Comment added successfully!');
    }
}
