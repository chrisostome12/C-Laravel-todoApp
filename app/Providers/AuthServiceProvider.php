<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;
use App\Policies\TaskPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les politiques d'autorisation du projet.
     *
     * @var array
     */
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

    /**
     * Enregistrement des services d'autorisation.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
