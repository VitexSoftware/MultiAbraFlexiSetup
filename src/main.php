<?php


use AbraFlexi\MultiSetup\Ui\AppsMenu;
use AbraFlexi\MultiSetup\Ui\DbStatus;
use AbraFlexi\MultiSetup\Ui\PageBottom;
use AbraFlexi\MultiSetup\Ui\PageTop;

/**
 * Multi AbraFlexi Setup - Index page.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 * @copyright  2020 Vitex Software
 */

namespace AbraFlexi\MultiSetup\Ui;

require_once './init.php';

$oPage->onlyForLogged();

$oPage->addItem(new PageTop(_('Multi AbraFlexi Setup')));

$mainPageMenu = new AppsMenu();

$oPage->container->addItem( new \Ease\TWB4\Panel( _('Modules Availble'),'default', $mainPageMenu, new DbStatus())  );


$oPage->addItem(new PageBottom());

$oPage->draw();
