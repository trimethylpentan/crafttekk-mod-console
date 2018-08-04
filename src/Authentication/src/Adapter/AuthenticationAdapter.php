<?php declare(strict_types=1);

namespace CrafttekkModConsole\Authentication\Adapter;

use CrafttekkModConsole\Authentication\Entity\User;
use CrafttekkModConsole\Authentication\Repository\UserRepository;
use Zend\Authentication\Result;

class AuthenticationAdapter
{
    /** @var string */
    private $password;

    /** @var string */
    private $username;

    /** @var UserRepository */
    private $userRepository;

    /**
     * AuthenticationAdapter constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * Performs an authentication attempt
     *
     * @return Result
     */
    public function authenticate(): Result
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['userName' => $this->username]);

        if ($user && password_verify($this->password, $user->getPassword())) {
            return new Result(Result::SUCCESS, $user);
        }

        return new Result(Result::FAILURE_CREDENTIAL_INVALID, $this->username);
    }
}
