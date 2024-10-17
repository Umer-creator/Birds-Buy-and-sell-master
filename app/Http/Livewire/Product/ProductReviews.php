<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ProductReviews extends Component
{

    public $productId;
    public $reviewMessage;
    public $rating;
    public $reviews;
    public $userHasSubmittedReview;

    public function mount($productId)
    {
        $this->productId = $productId;
    }
    public function submitReview()
    {
        $this->validate([
            'reviewMessage' => 'required|min:10',
            'rating' => 'required|numeric|between:0,5',
        ]);

        $review = new Review;
        $review->product_id = $this->productId;
        $review->user_id = Auth::user()->id;
        $review->review_message = $this->reviewMessage;
        $review->rating = $this->rating;
        $review->save();
        $this->dispatchBrowserEvent('success', 'Review posted');
        //     // Reset the review message and rating fields
        $this->reviewMessage = '';
        $this->rating = '';
    }

    public function render()
    {
        $this->reviews = Review::where('product_id', $this->productId)->get();
        if (Auth::check()) {
            if (Auth::user()->utype == "user") {
                $userId = Auth::user()->id;
                $userReview = Review::where('product_id', $this->productId)->where('user_id', $userId)->first();
                $this->userHasSubmittedReview = $userReview !== null;
            }
        }
        return view('livewire.product.product-reviews');
    }
}
