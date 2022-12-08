<?php
namespace Weath\Test\Block;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $helperInventory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Weath\Test\Model\PostFactory $postFactory,
        \Weath\Test\Helper\Inventory $helperInventory
    )
    {
        $this->_postFactory = $postFactory;
        $this->helperInventory = $helperInventory;
        parent::__construct($context);
    }
    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }
    public function getTown($mega){
        $town = $this->helperInventory->makeACurlRequest($mega);
        return $town;
    }
}
