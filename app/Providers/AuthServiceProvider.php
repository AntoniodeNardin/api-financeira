<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\ReceitaPolicy;
use App\Models\Receita;
use App\Policies\MetaPolicy;
use App\Models\Meta;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\Categoria::class => \App\Policies\CategoriaPolicy::class,
        \App\Models\Despesa::class => \App\Policies\DespesaPolicy::class,
        Receita::class => ReceitaPolicy::class,
        Meta::class => MetaPolicy::class,

        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
