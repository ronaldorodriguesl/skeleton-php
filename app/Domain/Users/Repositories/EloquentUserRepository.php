<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Contracts\UserRepository;
use App\Domain\Users\Entities\User;
use App\Shared\Abstracts\EloquentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class EloquentUserRepository extends EloquentRepository implements UserRepository
{

    private string $defaultSort = '-created_at';

    private array $defaultSelect = [
        'id',
        'name',
        'active',
        'login',
        'created_at',
        'updated_at',
    ];

    private array $allowedFilters = [
        'active',
        'name'
    ];

    private array $allowedSorts = [
        'updated_at',
        'created_at',
    ];

    private array $allowedIncludes = [
    ];

    public function findByFilters(): LengthAwarePaginator
    {
        $perPage = (int)request()->get('limit');
        $perPage = $perPage >= 1 && $perPage <= 100 ? $perPage : 20;

        return QueryBuilder::for(User::class)
            ->select($this->defaultSelect)
            ->allowedFilters($this->allowedFilters)
            ->allowedIncludes($this->allowedIncludes)
            ->allowedSorts($this->allowedSorts)
            ->defaultSort($this->defaultSort)
            ->paginate($perPage);
    }
}
