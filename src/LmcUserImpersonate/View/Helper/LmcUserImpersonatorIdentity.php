<?php
/**
 * LmcUserImpersonatorIdentity View Helper
 *
 * Returns the identity of the 'real user' if impersonation is currently in progress, otherwise returns false.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace LmcUserImpersonate\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LmcUser\Service\User as LmcUserUserService;

class LmcUserImpersonatorIdentity extends AbstractHelper
{
    /**
     * The user service.
     *
     * @var \LmcUser\Service\User
     */
    protected $userService;

    /**
     * __invoke returns the identity of the 'real user' if impersonation is currently in progress, otherwise returning
     * false.
     *
     * @return LmcUser\Model\UserInterface|boolean
     */
    public function __invoke()
    {
        if ($this->getUserService()->isImpersonated()) {
            return $this->getUserService()->getStorageForImpersonator()->read();
        } else {
            return false;
        }
    }

    /**
     * Get the user service.
     *
     * @return LmcUser\Service\User
     */
    public function getUserService()
    {
        return $this->userService;
    }

    /**
     * Set the user service.
     *
     * @param \LmcUser\Service\User $userService
     */
    public function setUserService(LmcUserUserService $userService)
    {
        $this->userService = $userService;

        // Fluent interface.
        return $this;
    }
}
