<?php
/**
 * Trellis_AmazonCdn
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0), a
 * copy of which is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @package    Trellis_AmazonCdn
 * @author     Zach Loubier <zach@growwithtrellis.com>
 * @copyright  Copyright (c) 2014 Trellis, Inc.
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Trellis_AmazonCdn_Model_Varien_Image extends Varien_Image
{
    /**
     * Get helper
     *
     * @return Trellis_AmazonCdn_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('trellis_amazoncdn');
    }

    /**
     * Open an image and create image handle.
     * Must override parent class method because of file_exists() check in it :(
     */
    public function open()
    {
        if ($this->_getHelper()->isConfigured()) {
            $this->_getAdapter()->checkDependencies();
            $this->_getAdapter()->open($this->_fileName);
        } else {
            parent::open();
        }
    }

    /**
     * Hijack the normal method to add CDN hooks. Fail back to parent method as appropriate.
     *
     * @param string $adapter
     * @return Trellis_AmazonCdn_Model_Varien_Gd2
     */
    protected function _getAdapter($adapter = null)
    {
        if (!isset($this->_adapter)) {
            if ($this->_getHelper()->isConfigured()) {
                $this->_adapter = Mage::getModel('trellis_amazoncdn/varien_gd2');
            } else {
                parent::_getAdapter();
            }
        }

        return $this->_adapter;
    }
}
