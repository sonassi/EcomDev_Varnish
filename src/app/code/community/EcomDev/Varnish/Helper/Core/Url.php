<?php

class EcomDev_Varnish_Helper_Core_Url extends Mage_Core_Helper_Url
{

    /**
     * Retrieve current url
     *
     * @return string
     */
    public function getCurrentUrl()
    {
        $request = Mage::app()->getRequest();

        if (strpos($request->getServer('REQUEST_URI'), 'varnish/esi/handle') !== false && $current = $request->getParam('current')) {
            $current = base64_decode($current);
            return $current;
        }

        return parent::getCurrentUrl();
    }
}