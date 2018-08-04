<?php

namespace CrafttekkModConsole\Backend\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class IndexAction implements MiddlewareInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @param TemplateRendererInterface $template
     */
    public function __construct(TemplateRendererInterface $template)
    {
        $this->template = $template;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return HtmlResponse
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): HtmlResponse
    {
        $viewData = [
            'layout' => 'layout::backend'
        ];

        return new HtmlResponse($this->template->render('backend::index', $viewData));
    }
}
