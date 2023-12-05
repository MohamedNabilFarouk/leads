<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;


class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "slug"=>$this->slug,
            "email"=>$this->email,
            "photo"=>$this->photo,
            "domain"=>$this->slug.'.'. request()->getHttpHost()
        ];
    }
}
