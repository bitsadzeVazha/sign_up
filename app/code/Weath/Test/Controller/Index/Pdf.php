<?php
namespace Weath\Test\Controller\Index;
class Pdf extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $helperInventory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Weath\Test\Helper\Inventory $helperInventory)
	{
		$this->_pageFactory = $pageFactory;
		$this->helperInventory = $helperInventory;
		return parent::__construct($context);
	}
	public function getTown($mega){
		$town = $this->helperInventory->makeACurlRequest($mega);
		
		return $town;
	}

    public function toPdf($cit){

    }
	public function execute()
	{
		if ($this->getRequest()->isPost()) {

        }
		
	}
}