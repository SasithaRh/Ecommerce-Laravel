<?php

namespace App\Http\Livewire\Admin;
use App\Models\OrderItem;
use Livewire\Component;
use App\Models\Review;
class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;
    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'rating' => 'required',
            'comment' => 'required'
        ]);
    }
    public function addReview()
    {
        $this->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id=  $this->order_item_id;
        $review->save();
        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->rstatus= true;
        $orderItem->save();
        session()->flash('reviewmessage',"Your review has been added successfully");
    }
    public function render()
    {
        $order_item= OrderItem::find($this->order_item_id);
        return view('livewire.admin.user-review-component',['orderItem'=>$order_item])->layout('layouts.base');
    }
}
