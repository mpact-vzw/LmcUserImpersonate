<?php
/**
 * LmcUserImpersonate Module Class
 *
 * @created 20130709
 * @author Mark Tudor <code AT icefusion DOT co DOT uk>
 */

namespace LmcUserImpersonate;

use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\ViewModel;
use LmcUserImpersonate\Module\AbstractModule;

class Module extends AbstractModule
{
    public function onBootstrap(MvcEvent $e)
    {
        // TODO: I'm not convinced that this is really the best way to achieve this.
        // TODO: LmcUserImpersonate (future) view scripts will have to be in a lmcuser folder, not lmc-user-impersonate.
        // As a consequence of overriding the LmcUser User controller, ZF2 will look for all view scripts within
        // LmcUserImpersonate's folder. Use the Mvc Dispatch event to point the view script at LmcUser again so that
        // we don't have to copy all view scripts from LmcUser to LmcUserImpersonate.
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, function($e) {
            $model = $e->getResult();
            if (!$model instanceof ViewModel) {
                return;
            }
            $model->setTemplate(str_replace('lmc-user-impersonate', 'lmc-user', $model->getTemplate()));
        }, -85);
    }
}
