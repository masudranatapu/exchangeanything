<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Ad\Entities\Ad;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class SellerDashboardController extends controller
{
    //
    public function profile($username)
    {
        $user = Customer::where('username', $username)->first();

        $ads = Ad::where('customer_id', $user->id)->paginate(6);

        $reviews = DB::table('reviews')->where('seller_id', $user->id)->where('status', 1)->get();

        $rating_details = [
            'total' => $reviews->count(),
            'rating' => $reviews->sum('stars'),
            'average' => $reviews->avg('stars'),
        ];

        return view('frontend.seller.dashboard', compact('ads', 'user', 'rating_details'));
    }

    public function rateReview(Request $request)
    {
        $user_id = auth('customer')->id();
        $review = DB::table('reviews')->where('user_id', $user_id)->where('seller_id', $request->seller_id)->get();
        if ($review && $review->count() > 0) {
            return redirect()->back()->with('error', 'You already reviewed this seller.');
        }

        session(['seller_tab' => 'review_store']);

        $request->validate([
            'stars' => 'required|numeric|between:1,5',
            'comment' => 'required|string|max:255',
        ]);

        DB::table('reviews')->insert([
            'seller_id' => $request->seller_id,
            'user_id' => auth('customer')->id(),
            'stars' => $request->stars,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully');
    }

    public function preSignup(Request $request)
    {
        session(['seller_tab' => 'review_store']);

        $request->validate([
            'email' => 'required',
        ]);

        return redirect()->route('frontend.signup', ['email' => $request->email]);
    }

    public function report(Request $request)
    {
        DB::table('reports')->insert([
            'report_from_id' => auth('customer')->id(),
            'report_to_id' => $request->user_id,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Report submitted successfully');
    }

}
