<?php
/**
 * LmcUserImpersonatorDisplayName View Helper
 *
 * Returns a string containing the display name of the 'real user' if impersonation is currently in progress, otherwise
 * returns false.
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace LmcUserImpersonate\View\Helper;

use Laminas\View\Helper\AbstractHelper;
use LmcUser\Entity\UserInterface;
use LmcUser\Service\User as UserService;
use LmcUser\View\Helper\LmcUserDisplayName;
use LmcUserImpersonate\Exception\Domain as DomainException;

class LmcUserImpersonatorDisplayName extends LmcUserDisplayName
{
    /**
     * The user service.
     *
     * @var \LmcUser\Service\User
     */
    protected $userService;

    /**
     * __invoke returns a string containing the display name of the 'real user' if impersonation is currently in
     * progress, otherwise returns false.
     *
     * The bulk of the work is delegated to the LmcUserDisplayName view helper.
     *
     * @return String
     */
    public function __invoke(UserInterface $user = null)
    {
        // Only continue if impersonation is currently in progress, otherwise return false.
        if ($this->getUserService()->isImpersonated()) {
            // Get the 'real user' from the storage container.
            $realUser = $this->getUserService()->getStorageForImpersonator()->read();

            // If the stored 'real user' is not of the correct type, throw an exception.
            if (!$realUser instanceof UserInterface) {
                throw new DomainException(
                    '$realUser is not an instance of UserInterface',
                    500
                );
            }
        } else {
            // No impersonation is currently in progress.
            return false;
        }

        // The bulk of the work is delegated to the LmcUserDisplayName view helper.
        return parent::__invoke($realUser);
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
    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;

        // Fluent interface.
        return $this;
    }
}
