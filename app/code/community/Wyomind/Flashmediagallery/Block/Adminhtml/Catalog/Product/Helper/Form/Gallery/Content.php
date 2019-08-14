<?php


class Wyomind_Flashmediagallery_Block_Adminhtml_Catalog_Product_Helper_Form_Gallery_Content extends Mage_Adminhtml_Block_Catalog_Product_Helper_Form_Gallery_Content {

    protected function _prepareLayout() {
        $this->setChild('uploader', $this->getLayout()->createBlock('adminhtml/media_uploader')
        );

        $this->getUploader()->getConfig()
                ->setUrl(Mage::getModel('adminhtml/url')->addSessionParam()->getUrl('*/catalog_product_gallery/upload'))
                ->setFileField('image')
                ->setFilters(array(
                    'images' => array(
                        'label' => Mage::helper('adminhtml')->__('Images & flash (.gif, .jpg, .png, .flv, .swf'),
                        'files' => array('*.gif', '*.jpg', '*.png', '*.flv', '*.swf')
                    ),
        ));

        Mage::dispatchEvent('catalog_product_gallery_prepare_layout', array('block' => $this));

        
    }

}
