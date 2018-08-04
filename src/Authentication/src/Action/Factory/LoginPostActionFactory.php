<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Action\Factory;

use CrafttekkModConsole\Authentication\Action\LoginPostAction;
use CrafttekkModConsole\Authentication\Adapter\AuthenticationAdapter;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoginPostActionFactory implements FactoryInterface
{

    /**
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return LoginPostAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): LoginPostAction
    {
        /**
         * @var AuthenticationService $authenticationService
         * @var AuthenticationAdapter $authenticationAdapter
         * @var TemplateRendererInterface $templateRenderer
         */
        $authenticationService = $container->get(AuthenticationService::class);
        $authenticationAdapter = $container->get(AuthenticationAdapter::class);
        $templateRenderer      = $container->get(TemplateRendererInterface::class);

        return new LoginPostAction($authenticationService, $authenticationAdapter, $templateRenderer);
    }
}
