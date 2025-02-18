<?php
/**
 * LmcUserImpersonate View Helper Config
 *
 * @created 20131010
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

use LmcUserImpersonate\View\Helper\LmcUserImpersonatorDisplayName;
use LmcUserImpersonate\View\Helper\LmcUserImpersonatorIdentity;

return array(
    'factories' => array(
        'lmcUserImpersonatorDisplayName' => function ($hm) {
            $viewHelper = new LmcUserImpersonatorDisplayName();
            $viewHelper->setUserService($hm->getServiceLocator()->get('lmcuserimpersonate_user_service'));
            return $viewHelper;
        },
        'lmcUserImpersonatorIdentity' => function ($hm) {
            $viewHelper = new LmcUserImpersonatorIdentity();
            $viewHelper->setUserService($hm->getServiceLocator()->get('lmcuserimpersonate_user_service'));
            return $viewHelper;
        },
    ),
);
