<?php
/**
 * LmcUserImpersonate Module Config
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

return array(
    'service_manager' => array(
        'allow_override' => true,
        'aliases' => array(
            'lmcuser_user_service' => 'lmcuserimpersonate_user_service',
        ),
    ),
);
