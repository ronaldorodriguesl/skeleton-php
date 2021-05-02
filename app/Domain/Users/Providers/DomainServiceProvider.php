<?php

namespace App\Domain\Users\Providers;

use App\Shared\Abstracts\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    protected string $alias = 'users';

    protected bool $hasMigrations = true;

    protected bool $hasTranslations = true;

    protected bool $hasPolicies = false;

    protected array $providers = [
        RepositoryServiceProvider::class,
    ];

    protected array $policies = [
    ];
}
