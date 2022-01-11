<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use App\ReviewReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function status($id){
        $review = Review::where('id',$id)->first();
        if ($review) {
            if ($review->status == 1) {
                $review->status = 2;
            }else{
                $review->status = 1;
            }
            $review->save();
            return back()->with('alert-success','Review Update Successfully');
        }else{
            abort(404);
        }
    }

    public function index(){
        $reviews = Review::get();
        return view('admin.review.index',[
            'reviews' => $reviews
        ]);
    }

    public function view($id){
        $review = Review::where('id',$id)->first();
        Review::where('id',$id)->update([
            'read_reting' => 'read'
        ]);
        return view('admin.review.view',[
            'review' => $review
        ]);
    }

    public function reply($id){
        $review = Review::where('id',$id)->first();
        $allReplies = ReviewReply::where('review_id',$review->id)->get();
        return view('admin.review.reply',[
            'review' => $review,
            'allReplies' => $allReplies
        ]);
    }

    public function replySubmit(Request $request){
        $request->validate([
            'message' => 'required'
        ]);
        $reply = ReviewReply::create([
            'review_id' => $request->review_id,
            'message' => $request->message,
            'created_by' => Auth::user()->email,
        ]);
        Review::where('id',$reply->review_id)->update([
            'reply_status' => '2'
        ]);
        return back();
    }

    public function destroy($id){
        Review::where('id',$id)->delete();
        return back();
    }

}
