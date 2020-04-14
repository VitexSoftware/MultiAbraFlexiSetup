<?php
/**
 * Multi FlexiBee Setup - Customer instance editor.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2017-2020 Vitex Software
 */

namespace FlexiPeeHP\MultiSetup\Ui;

use Ease\Html\ATag;
use Ease\TWB4\Panel;
use Ease\TWB4\Row;
use FlexiPeeHP\MultiSetup\Application;

require_once './init.php';


$oPage->onlyForLogged();

$oPage->addItem(new PageTop(_('Application')));

$apps    = new Application($oPage->getRequestValue('id', 'int'));
$instanceName = $apps->getDataValue('nazev');

if ($oPage->isPosted()) {
    if ($apps->takeData($_POST) && !is_null($apps->saveToSQL())) {
        $apps->addStatusMessage(_('Application Saved'), 'success');
//        $apps->prepareRemoteFlexiBee();
        $oPage->redirect('?id='.$apps->getMyKey());
    } else {
        $apps->addStatusMessage(_('Error saving Application'), 'error');
    }
}

if (strlen($instanceName)) {
    $instanceLink = '';
} else {
    $instanceName = _('New Application');
    $instanceLink = null;
}

$instanceRow = new Row();
$instanceRow->addColumn(8, new RegisterAppForm($apps));

$oPage->container->addItem(new Panel($instanceName, 'info',
        $instanceRow, $instanceLink));

$oPage->addItem(new PageBottom());

$oPage->draw();