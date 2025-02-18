<?php
/**
 * LmcUserImpersonate Service Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use Laminas\Authentication\Storage\Session;
use LmcUserImpersonate\Options\ModuleOptions;
use LmcUserImpersonate\Service\User as UserService;

return array(
    'factories' => array(
        'lmcuserimpersonate_module_options' => function ($sm) {
            $config = $sm->get('Config');
            return new ModuleOptions(isset($config['lmcuserimpersonate']) ? $config['lmcuserimpersonate'] : array());
        },
        'lmcuserimpersonate_user_service' => function ($sm) {
            $userService = new UserService();
            $userService->setServiceManager($sm);
            $userService->setStorageForImpersonator(new Session(get_class($userService), 'impersonator'));
            $userService->setStoreUserAsObject($sm->get('lmcuserimpersonate_module_options')->getStoreUserAsObject());
            return $userService;
        }
    ),
);
