<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use App\Models\CommunityForum;
use Illuminate\Http\Request;

class CommunityForumController extends Controller
{
    public function index(){
        $communityforums = CommunityForum::all();
        $communityforums = CommunityForum::paginate(10);
        return view('users.communityforum.communityforum', compact('communityforums'));
    }

    public function createCommunityforum(){
        return view('users.communityforum.create');
    }

    public function storeCommunityforum(Request $request){
        $request->validate([
            'topic' => 'required|string',
        ]);

        $communityforum = CommunityForum::create([
            'topic' => $request->input('topic'),
        ]);

        return redirect()->route('communityforum')
            ->with('success', 'Topic added successfully!');
    }

    public function deleteCommunityforum($id){
        $communityforum = CommunityForum::findOrFail($id);
        $communityforum->delete();

        return back()
            ->with('success', 'Topic deleted successfully!');
    }

    public function updateCommunityforum($id){
        $communityforum = CommunityForum::findOrFail($id);
        return view('users.communityforum.updateCommunityforum')->with('communityforum', $communityforum);
    }

    public function updatedCommunityforum(Request $request, $id){

        $communityforum = CommunityForum::findOrFail($id);
        
        $request->validate([
            'topic' => 'required|string',
        ]);

        $communityforum->update([
            'topic' => $request->input('topic'),
        ]);

        return redirect()->route('communityforum')
            ->with('success', 'Topic updated successfully!');
    }

    public function showComment($communityforumId)
    {
        $communityforums = CommunityForum::findOrFail($communityforumId);
        $comments = $communityforums->comments;

        return view('users.communityforum.showComment', compact('communityforums', 'comments'));
    }
}
