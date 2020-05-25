<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FlexiPeeHP\MultiSetup;

/**
 * Description of Configuration
 *
 * @author vitex
 */
class Configuration extends \Ease\SQL\Engine {

    public $myTable = 'configuration';

    public function __construct($identifier = null, $options = array()) {
        parent::__construct($identifier, $options);
    }

    public function getName() {
        $app = new Application((int) $this->getDataValue('app_id'));
        $cmp = new Company((int) $this->getDataValue('company_id'));
        return [new \Ease\TWB4\LinkButton('app.php?id=' . $app->getMyKey(), $app->getDataValue('nazev'), 'info'), ' @ ', new \Ease\TWB4\LinkButton('company.php?id=' . $cmp->getMyKey(), $cmp->getRecordName(), 'info')];
    }

    /**
     * Uloží pole dat do SQL. Pokud je $SearchForID 0 updatuje pokud ze nastaven  keyColumn.
     *
     * @param array $data        asociativní pole dat
     * @param bool  $searchForID Zjistit zdali updatovat nebo insertovat
     *
     * @return int ID záznamu nebo null v případě neůspěchu
     */
    public function saveToSQL($data = null, $searchForID = false) {
        if (is_null($data)) {
            $data = $this->getData();
        }
        $result = 0;
        unset($data['app_id']);
        unset($data['company_id']);
        foreach ($data as $column => $value) {
            $result += parent::saveToSQL(
                            ['app_id' => $this->getDataValue('app_id'), 'company_id' => $this->getDataValue('company_id'), 'key' => $column, 'value' => $value],
                            ['app_id' => $this->getDataValue('app_id'), 'company_id' => $this->getDataValue('company_id'), 'key' => $column]
            );
        }
        return $result;
    }

}