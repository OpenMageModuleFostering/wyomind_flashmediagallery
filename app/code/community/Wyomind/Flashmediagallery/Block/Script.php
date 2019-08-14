<?php

class Wyomind_Flashmediagallery_Block_Script extends Mage_Core_Block_Template {

    public function __construct() {
        
    }

    function _toHtml() {


        return "<script  type='text/javascript'>var fmg_selector='" . Mage::getStoreConfig("flashmediagallery/settings/selector") . "';</script>";
    }

}
