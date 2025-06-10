<?php
/**
 * LmcUserImpersonate Controller Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use LmcUserImpersonate\Controller;

return array(
    'factories' => array(
        'lmcuserimpersonate_adminController' => function ($cm) {
            $sm = $cm;

            $adminController = new Controller\Admin();
            $adminController->setConfig($sm->get('lmcuserimpersonate_module_options'));
            $adminController->setUserService($sm->get('lmcuserimpersonate_user_service'));

            return $adminController;
        },
        'lmcuser' => function($cm) {
            /* @var ControllerManager $cm*/
            $serviceManager = $cm;

            /* @var RedirectCallback $redirectCallback */
            $redirectCallback = $serviceManager->get('lmcuser_redirect_callback');

            /* @var UserController $controller */
            $controller = new Controller\User($redirectCallback);
            $controller->setServiceLocator($serviceManager);

            return $controller;
        },
    )
);
