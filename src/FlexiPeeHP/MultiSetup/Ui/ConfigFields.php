<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FlexiPeeHP\MultiSetup\Ui;

/**
 * Description of ConfigFields
 *
 * @author vitex
 */
class ConfigFields extends \Ease\Html\SelectTag {

    public function __construct($name, $defaultValue = null, $properties = array()) {
        parent::__construct($name,
                [
                    'text' => _('Text'),
                    'number' => _('Number'),
                    'date' => _('Date'),
                    'email' => _('Email'),
                    'password' => _('Password'),
                ]
                , $defaultValue, $properties);
    }

}