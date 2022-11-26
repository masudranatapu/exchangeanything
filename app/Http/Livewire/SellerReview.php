<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerReview extends Component
{
    public $user;
    public $seller;
    public $reviews;
    public $total;
    public $rating;
    public $average;

    public function mount($user_id)
    {
        $this->seller = Customer::where('id', $user_id)->first();
        $this->reviews = DB::table('reviews')->where('seller_id', $user_id)->where('status', 1)->get();
        
        foreach($this->reviews as $review){
            $review->reviewcustomer = DB::table('customers')->where('id', $review->user_id)->first();
        }
        
        $this->total = $this->reviews->count();
        $this->rating = $this->reviews->sum('stars');
        $this->average = $this->reviews->avg('stars');
    }
    public function render()
    {
        return view('livewire.seller-review');
    }
}
