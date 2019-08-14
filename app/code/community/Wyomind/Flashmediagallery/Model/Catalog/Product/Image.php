<?php

/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Catalog product link model
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Wyomind_Flashmediagallery_Model_Catalog_Product_Image extends Mage_Catalog_Model_Product_Image {

    public function isMedia() {
        return (in_array(strtolower(pathinfo($this->_baseFile, PATHINFO_EXTENSION)), array('flv', 'gif', 'swf'))) ? true : false;
    }

    public function getUrl() {
        $baseDir = Mage::getBaseDir('media');
       
        $file = ($this->isMedia()) ? $this->_baseFile : $this->_newFile;
        $path = str_replace($baseDir . DS, "", $file);
       
        return Mage::getBaseUrl('media') . str_replace(DS, '/', $path);
    }

}
