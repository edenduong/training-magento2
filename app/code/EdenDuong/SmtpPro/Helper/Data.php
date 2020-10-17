<?php
namespace EdenDuong\SmtpPro\Helper;

/**
 * Class Data
 * @package EdenDuong\SmtpPro\Helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
    }

    /**
     * @param null $store_id
     * @return mixed
     */
    public function getConfigPassword($store_id = null){
        return $this->scopeConfig->getValue('smtppro/general/password',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * @param null $store_id
     * @return mixed
     */
    public function getConfigUsername($store_id = null){
        return $this->scopeConfig->getValue('smtppro/general/username',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * @param null $store_id
     * @return mixed
     */
    public function getConfigSsl($store_id = null){
        return $this->scopeConfig->getValue('smtppro/general/ssl',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }

    /**
     * @param null $store_id
     * @return mixed
     */
    public function getConfigSmtpHost($store_id = null){
        return $this->scopeConfig->getValue('smtppro/general/smtphost',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $store_id);
    }
}