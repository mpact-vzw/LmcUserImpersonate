<?php

namespace LmcUserImpersonate\Module;

use Laminas\ModuleManager\Feature\AutoloaderProviderInterface;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Laminas\ModuleManager\Feature\ControllerProviderInterface;
use Laminas\ModuleManager\Feature\ServiceProviderInterface;
use Laminas\ModuleManager\Feature\ViewHelperProviderInterface;

abstract class AbstractModule implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface,
    ViewHelperProviderInterface
{
    use \LmcUserImpersonate\ModuleManager\Feature\ClassDirTrait;
    use \LmcUserImpersonate\ModuleManager\Feature\ClassNamespaceTrait;
    use \LmcUserImpersonate\ModuleManager\Feature\AutoloaderProviderDefaultTrait;
    use \LmcUserImpersonate\ModuleManager\Feature\ConfigProviderTrait;
    use \LmcUserImpersonate\ModuleManager\Feature\ControllerConfigProviderTrait;
    use \LmcUserImpersonate\ModuleManager\Feature\ServiceConfigProviderTrait;
    use \LmcUserImpersonate\ModuleManager\Feature\ViewHelperConfigProviderTrait;
}
