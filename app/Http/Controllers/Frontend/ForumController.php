<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use App\Models\DiscussionReplies;
use Auth;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $discussions = Discussion::all();
        $currentUserDiscussions = [];
        if (Auth::user()) {
            $currentUserDiscussions = Discussion::where("user_id", Auth::user()->id)->get();
        }

        return view("frontend.forum.forum", compact("discussions", "currentUserDiscussions"));
    }
    public function discussions($id)
    {
        $discussions = Discussion::with('replies.user')->find($id);

        return view("frontend.forum.discussions", compact("discussions"));
    }
    public function addDiscussion(Request $request)
    {


        $discussion = new Discussion();
        $discussion->title = $request->input("title");
        $discussion->description = $request->input("description");
        $discussion->user_id = Auth::user()->id;
        $discussion->save();
        return redirect()->back();
        // return redirect()->route('discussions.show', $discussion->id);
    }

    public function addReply(Request $request, $id)
    {

        // Find the discussion
        $discussion = Discussion::findOrFail($id);

        // Create a new reply instance
        $reply = new DiscussionReplies();
        $reply->reply = $request->input("reply");

        // Associate the reply with the discussion and the authenticated user
        $reply->discussion()->associate($discussion);
        $reply->user()->associate(auth()->user());

        // Save the reply
        $reply->save();

        return redirect()->back();
    }
}
