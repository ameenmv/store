<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
        'order_id'=> [
            'id'=>$this->order->id,
            'user_id' => $this->order->user_id,
            'total'=>$this->order->total,
        ],
        'product_id'=>[
            'id'=>$this->product->id,
            'name'=>$this->product->name,
            'description'=>$this->product->description,
            'price'=>$this->product->price,
        ],
        'quantity'=>$this->quantity,
        'price'=>$this->price,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at
        ];
    }
}
