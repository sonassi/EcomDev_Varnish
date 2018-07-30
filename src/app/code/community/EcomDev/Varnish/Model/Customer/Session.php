<?php

class EcomDev_Varnish_Model_Customer_Session extends Mage_Customer_Model_Session
{
    /**
     * Set Before auth url
     *
     * @param string $url
     * @return Mage_Customer_Model_Session
     */
    public function setBeforeAuthUrl($url)
    {
        if (strpos($url, '/varnish/esi/') !== false)
            return $this;

        return $this->_setAuthUrl('before_auth_url', $url);
    }

}