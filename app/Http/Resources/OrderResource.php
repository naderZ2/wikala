<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->mapStatus($this->status),
            'order_number' =>$this->order_number ,
            'updated_at' => $this->updated_at->format('d-M-Y'),
            'order_details' =>$this->orderDetails ,
            'seller' =>$this->seller 

        ];
    }
    
    private function mapStatus($status)
    {
        $statusMapping = [
            "confirmed" => 'confirmed',
            "order_placed" => 'order placed',
            "out_for_deliver" => 'out for deliver',
            "cancel" => 'cancel',
            "delivered" => 'delivered',
            "shipped" => 'shipped'
        ];

        return $statusMapping[$status] ?? 'Unknown';
    }
}
