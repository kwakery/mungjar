<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommissionResource extends JsonResource
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
          'name' => $this->name,
          'email' => $this->email,
          'duedate' => $this->duedate,
          'type' => getCType($this->type),
          'commercial' => $this->commercial ? true : false,
          'info' => $this->info,
          'status' => getStatus($this->status),
          'token' => $this->token,
          'discord' => $this->discord,
          'created_at' => $this->created_at
        ];
    }
}
