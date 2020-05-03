<?php

/**
 * Multi FlexiBee Setup  - Services for Company
 *
 * @author     Vítězslav Dvořák <vitex@arachne.cz>
 * @copyright  2015-2020 Vitex Software
 */

namespace FlexiPeeHP\MultiSetup\Ui;

/**
 * Description of ServicesForCompanyForm
 *
 * @author vitex
 */
class ServicesForCompanyForm extends \Ease\TWB4\Form {

    /**
     * 
     * @param \FlexiPeeHP\MultiSetup\Company $company
     * @param array $tagProperties
     */
    public function __construct($company, $tagProperties = array()) {
        $companyID = $company->getMyKey();

        $apps = (new \FlexiPeeHP\MultiSetup\Application())->listingQuery()->where('enabled',1)->fetchAll();
        $glue = new \FlexiPeeHP\MultiSetup\AppToCompany();

        $assigned = $glue->getColumnsFromSQL(['app_id', 'interval'], ['company_id' => $companyID], 'id', 'app_id');
        parent::__construct($tagProperties);

        foreach ($apps as $appData) {
            $code = $appData['id'];
            $twbsw = $this->addInput(
                    new IntervalChooser($code . '_interval', array_key_exists($code, $assigned) ? $assigned[$code]['interval'] : 'n', ['id' => $code . '_interval', 'data-company' => $companyID, 'checked' => 'true',
                        'data-app' => $code]),
                    new \Ease\Html\ImgTag($appData['image'], $appData['nazev'], ['height' => '30']) . '&nbsp;' . $appData['nazev']
            );
        }
    }

    public function finalize() {
        \Ease\TWB4\Part::twBootstrapize();
        $this->addJavaScript('

$(\'#' . $this->getTagID() . ' select\').change( function(event, state) {

$.ajax({
   url: \'toggleapp.php\',
        data: {
                app: $(this).attr("data-app"),
                company: $(this).attr("data-company"),
                interval: $(this).val()
        },
        error: function() {
            console.log("not saved");
        },

        success: function(data) {
            console.log("saved");
        },
            type: \'POST\'
        });
});
');
    }

}
