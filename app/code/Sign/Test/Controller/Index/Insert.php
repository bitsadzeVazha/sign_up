<?php

namespace Sign\Test\Controller\Index;

class Insert extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $helperData;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Sign\Test\Helper\Data $helperData
        
    ){
        $this->_pageFactory = $pageFactory;
        $this->helperData = $helperData;
        return parent::__construct($context);
    }

    public function execute()
    {   
        
        if($this->helperData->getGeneralConfig('enabled') == "1"){
            return $this->_pageFactory->create();
        }else{
            return $this->_redirect('signup/index/form');
        }
        
       
        
    }
}
