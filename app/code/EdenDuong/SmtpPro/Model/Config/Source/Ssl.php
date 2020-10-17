<?php
namespace EdenDuong\SmtpPro\Model\Config\Source;
/**
 * Class Ssl
 * @package EdenDuong\SmtpPro\Model\Config\Source
 */
class Ssl implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'ssl', 'label' => 'SSL'],
            ['value' => 'tls', 'label' => 'TLS']
        ];
    }
}
