<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Service\Factory;

use CrafttekkModConsole\Authentication\Adapter\AuthenticationAdapter;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticationServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AuthenticationService
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AuthenticationService
    {
        /** @var AuthenticationAdapter $authenticationAdapter */
        $authenticationAdapter = $container->get(AuthenticationAdapter::class);

        return new AuthenticationService(null, $authenticationAdapter);
    }
}
