<?php
namespace Eden\Training\Controller\Index;
class Test extends \Magento\Framework\App\Action\Action
{
    protected $fastLoading;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Eden\Training\Model\FastLoading $fastLoading
    ){
        parent::__construct($context);
        $this->fastLoading = $fastLoading;
    }

    public function execute()
    {
        echo $this->fastLoading->getFastValue();
    }
}
