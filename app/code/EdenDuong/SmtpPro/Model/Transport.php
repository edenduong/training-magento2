<?php
namespace EdenDuong\SmtpPro\Model;

/**
 * Class Transport
 * @package EdenDuong\SmtpPro\Model
 */
class Transport extends \Zend_Mail_Transport_Smtp implements \Magento\Framework\Mail\TransportInterface
{

    /**
     *
     */
    const AUTHORIZE_METHOD = 'login';
    /**
     * @var \Zend_Mail
     */
    protected $_message;
    /**
     * @var \EdenDuong\SmtpPro\Helper\Data
     */
    protected $_dataHelper;

    /**
     * @param \Magento\Framework\Mail\MessageInterface $message
     * @param \EdenDuong\SmtpPro\Helper\Data $dataHelper
     */
    public function __construct(
        \Magento\Framework\Mail\MessageInterface $message,
        \EdenDuong\SmtpPro\Helper\Data $dataHelper
    ){
        $this->_dataHelper = $dataHelper;
        if (!$message instanceof \Zend_Mail) {
            throw new \InvalidArgumentException('The message should be an instance of \Zend_Mail');
        }

        $smtpConfig = [
           'auth' => self::AUTHORIZE_METHOD,
           'ssl' =>  $this->_dataHelper->getConfigSsl(),
           'username' =>  $this->_dataHelper->getConfigUsername(),
           'password' =>  $this->_dataHelper->getConfigPassword()
        ];

        $smtpHost = $this->_dataHelper->getConfigSmtpHost();
        parent::__construct($smtpHost, $smtpConfig);
        $this->_message = $message;
    }


    /**
     * @throws \Magento\Framework\Exception\MailException
     */
    public function sendMessage()
    {
        try {
            parent::send($this->_message);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\MailException(new \Magento\Framework\Phrase($e->getMessage()), $e);
        }
    }
}
