<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Authentication\AuthenticationService;
use Zend\Diactoros\Response\RedirectResponse;

class AuthenticationAction implements MiddlewareInterface
{
    /** @var AuthenticationService */
    private $authenticationService;

    /**
     * @param AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate):ResponseInterface
    {
        if (! $this->authenticationService->hasIdentity()) {
            return new RedirectResponse('/login');
        }

        $identity = $this->authenticationService->getIdentity();
        return $delegate->process($request->withAttribute(self::class, $identity));
    }
}
