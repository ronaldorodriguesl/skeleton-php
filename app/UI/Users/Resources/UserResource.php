<?php

namespace App\UI\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'active' => $this->active,
        ];
    }
}
