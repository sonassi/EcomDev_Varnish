<?php

class EcomDev_Varnish_Helper_Directory_Url extends Mage_Directory_Helper_Url
{
    /**
     * Retrieve switch currency url
     *
     * @param array $params Additional url params
     * @return string
     */
    public function getSwitchCurrencyUrl($params = array())
    {
        $params = is_array($params) ? $params : array();

        if ($this->_getRequest()->getAlias('rewrite_request_path')) {
            $url = Mage::app()->getStore()->getBaseUrl() . $this->_getRequest()->getAlias('rewrite_request_path');
        }
        else {
            $url = $this->getCurrentUrl();
        }

        if (strpos($url, '/varnish/esi/') !== false) {
            $url = $this->_getRequest()->getParam('current');
        }

        $params[Mage_Core_Controller_Front_Action::PARAM_NAME_URL_ENCODED] = Mage::helper('core')->urlEncode($url);

        return $this->_getUrl('directory/currency/switch', $params);
    }
}