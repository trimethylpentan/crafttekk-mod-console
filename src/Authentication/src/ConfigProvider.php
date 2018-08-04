<?php declare(strict_types=1);
namespace CrafttekkModConsole\Authentication;

use CrafttekkModConsole\Authentication\Action\AuthenticationAction;
use CrafttekkModConsole\Authentication\Action\Factory\AuthenticationActionFactory;
use CrafttekkModConsole\Authentication\Action\Factory\LoginActionFactory;
use CrafttekkModConsole\Authentication\Action\Factory\LoginPostActionFactory;
use CrafttekkModConsole\Authentication\Action\LoginAction;
use CrafttekkModConsole\Authentication\Action\LoginPostAction;
use CrafttekkModConsole\Authentication\Adapter\AuthenticationAdapter;
use CrafttekkModConsole\Authentication\Adapter\Factory\AuthenticationAdapterFactory;
use CrafttekkModConsole\Authentication\Service\Factory\AuthenticationServiceFactory;
use Zend\Authentication\AuthenticationService;

class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                LoginAction::class          => LoginActionFactory::class,
                LoginPostAction::class      => LoginPostActionFactory::class,
                AuthenticationAction::class => AuthenticationActionFactory::class,

                AuthenticationService::class => AuthenticationServiceFactory::class,
                AuthenticationAdapter::class => AuthenticationAdapterFactory::class
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
                'backend' => [__DIR__ . '/../templates/backend']
            ],
        ];
    }
}
