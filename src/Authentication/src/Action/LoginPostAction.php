<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Action;

use CrafttekkModConsole\Authentication\Adapter\AuthenticationAdapter;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class LoginPostAction
{
    /** @var AuthenticationService */
    private $authenticationService;

    /** @var AuthenticationAdapter */
    private $authenticationAdapter;

    /** @var TemplateRendererInterface */
    private $templateRenderer;

    /**
     * LoginPostAction constructor.
     * @param AuthenticationService $authenticationService
     * @param AuthenticationAdapter $authenticationAdapter
     * @param TemplateRendererInterface $templateRenderer
     */
    public function __construct(
        AuthenticationService $authenticationService,
        AuthenticationAdapter $authenticationAdapter,
        TemplateRendererInterface $templateRenderer
    ) {
        $this->authenticationService = $authenticationService;
        $this->authenticationAdapter = $authenticationAdapter;
        $this->templateRenderer      = $templateRenderer;
    }


    public function authenticate(ServerRequestInterface $request)
    {
        $params = $request->getParsedBody();

        if (empty($params['username'])) {
            return new HtmlResponse($this->templateRenderer->render('auth::login', [
                'error' => 'The username cannot be empty',
            ]));
        }

        if (empty($params['password'])) {
            return new HtmlResponse($this->templateRenderer->render('auth::login', [
                'username' => $params['username'],
                'error'    => 'The password cannot be empty',
            ]));
        }

        $this->authenticationAdapter->setUsername($params['username']);
        $this->authenticationAdapter->setPassword($params['password']);

        $result = $this->authenticationService->authenticate();
        if (!$result->isValid()) {
            return new HtmlResponse($this->templateRenderer->render('auth::login', [
                'username' => $params['username'],
                'error'    => 'The credentials provided are not valid',
            ]));
        }

        return new RedirectResponse('/admin');
    }
}
