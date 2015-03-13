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

class Trellis_AmazonCdn_Block_Widget_Banner extends Enterprise_Banner_Block_Widget_Banner
{
    /**
     * Prepare Content HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        $html = parent::_toHtml();

        /* @var $helper Trellis_AmazonCdn_Helper_Data */
        $helper = Mage::helper('trellis_amazoncdn');
        if ($helper->isConfigured()) {
            return $helper->replaceWysiwygUrls($html);
        } else {
            return $html;
        }
    }
}
