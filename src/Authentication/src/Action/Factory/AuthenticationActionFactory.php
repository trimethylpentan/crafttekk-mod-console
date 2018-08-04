<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Action\Factory;

use CrafttekkModConsole\Authentication\Action\AuthenticationAction;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticationActionFactory implements FactoryInterface
{

    /**
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return AuthenticationAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AuthenticationAction
    {
        /** @var AuthenticationService $authenticationService */
        $authenticationService = $container->get(AuthenticationService::class);

        return new AuthenticationAction($authenticationService);
    }
}
