<?php

namespace Zulu\Cqrs;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Zulu\Cqrs\Console\Commands\CommandHandlerMakeCommand;
use Zulu\Cqrs\Console\Commands\CommandMakeCommand;
use Zulu\Cqrs\Console\Commands\InitProjectCommand;
use Zulu\Cqrs\Console\Commands\ModelMakeCommand;
use Zulu\Cqrs\Console\Commands\ModuleMakeCommand;
use Zulu\Cqrs\Console\Commands\QueryHandlerMakeCommand;
use Zulu\Cqrs\Console\Commands\QueryMakeCommand;
use Zulu\Cqrs\Console\Commands\RepositoryInterfaceMakeCommand;
use Zulu\Cqrs\Console\Commands\RepositoryMakeCommand;
use Zulu\Cqrs\Console\Commands\TransformerMakeCommand;
use Zulu\Cqrs\Bus\CommandBus;
use Zulu\Cqrs\Bus\QueryExecutor;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CommandHandlerMakeCommand::class,
                CommandMakeCommand::class,
                InitProjectCommand::class,
                ModelMakeCommand::class,
                ModuleMakeCommand::class,
                QueryHandlerMakeCommand::class,
                QueryMakeCommand::class,
                RepositoryInterfaceMakeCommand::class,
                RepositoryMakeCommand::class,
                TransformerMakeCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $commandNamespace = "Command";
        $commandHandlerNamespace = "Command\Handlers";

        $this->app->singleton(CommandBus::class, function ($app) use ($commandNamespace, $commandHandlerNamespace){
            return new CommandBus($app, $commandNamespace, $commandHandlerNamespace);
        });

        $queryNamespace = "Query";
        $queryHandlerNamespace = "Query\Handlers";

        $this->app->singleton(QueryExecutor::class, function ($app) use ($queryNamespace, $queryHandlerNamespace){
            return new QueryExecutor($app, $queryNamespace, $queryHandlerNamespace);
        });
    }
}
