<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
          'commission_token' => $this->commission_token,
          'status' => $this->status ? 'Complete' : 'Incomplete',
          'created_at' => $this->created_at,
          'commission' => new CommissionResource($this->commission)
        ];
    }
}
