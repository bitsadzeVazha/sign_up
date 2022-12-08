<?php
 
namespace Weath\Test\Block;
 
class Insert extends \Magento\Framework\View\Element\Template
{
     protected $_pageFactory;
     protected $_postLoader;
     protected $helperInventory;
     protected $_postFactory;
 
     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Weath\Test\Helper\Inventory $helperInventory,
          \Weath\Test\Model\PostFactory $postFactory
     ){
          $this->_pageFactory = $pageFactory;
          $this->helperInventory = $helperInventory;
          $this->_postFactory = $postFactory;
          return parent::__construct($context);
     }
     public function getPostCollection(){
          $post = $this->_postFactory->create();
          return $post->getCollection();
      }
     public function getTown($mega){
          $town = $this->helperInventory->makeACurlRequest($mega);
          return $town;
      }
 
     public function execute()
     {
          return $this->_pageFactory->create();
     }
}