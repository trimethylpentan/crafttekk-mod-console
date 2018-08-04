<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Adapter\Factory;

use CrafttekkModConsole\Authentication\Adapter\AuthenticationAdapter;
use CrafttekkModConsole\Authentication\Entity\User;
use CrafttekkModConsole\Authentication\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticationAdapterFactory implements FactoryInterface
{

    /**
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return AuthenticationAdapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AuthenticationAdapter
    {
        /**
         * @var EntityManager $entityManager
         * @var UserRepository $userRepository
         */
        $entityManager = $container->get('doctrine.entity_manager.orm_default');

        $userRepository = $entityManager->getRepository(User::class);

        return new AuthenticationAdapter($userRepository);
    }
}
