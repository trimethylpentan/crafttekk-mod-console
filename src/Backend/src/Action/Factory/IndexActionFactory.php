<?php

namespace CrafttekkModConsole\Backend\Action\Factory;

use CrafttekkModConsole\Backend\Action\IndexAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexActionFactory implements FactoryInterface
{

    /**
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return IndexAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var TemplateRendererInterface $template */
        $template  = $container->get(TemplateRendererInterface::class);

        return new IndexAction($template);
    }
}
