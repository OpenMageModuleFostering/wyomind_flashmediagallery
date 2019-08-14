<?php

class Wyomind_Flashmediagallery_Model_Observer {

    public function changeTemplate($observer) {
        $block = $observer->getEvent()->getBlock();
       
        if (get_class($block) == 'Wyomind_Flashmediagallery_Block_Adminhtml_Catalog_Product_Helper_Form_Gallery_Content') {
            // consider getting the template name from configuration
            $template = 'flashmediagallery/catalog/product/helper/gallery.phtml';
            $block->setTemplate($template);
        }
    }

}
