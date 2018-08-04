<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Action\Factory;

use CrafttekkModConsole\Authentication\Action\LoginAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoginActionFactory implements FactoryInterface
{

    /**
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return LoginAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): LoginAction
    {
        /** @var TemplateRendererInterface $templateRenderer */
        $templateRenderer = $container->get(TemplateRendererInterface::class);

        return new LoginAction($templateRenderer);
    }
}
