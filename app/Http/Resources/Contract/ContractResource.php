<?php

namespace App\Http\Resources\Contract;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed title
 * @property mixed content
 * @property mixed user_id
 * @property mixed is_sign
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed id
 */
class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $this->user_id,
            'is_sign' => $this->is_sign,
            'created_at' => ($this->created_at != null) ? Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->isoFormat('dddd D MMMM HH[h]mm') : 'Aucune date',
            'updated_at' => ($this->updated_at != null) ? Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->isoFormat('dddd D MMMM HH[h]mm') : 'Aucune date',
        ];
    }
}
