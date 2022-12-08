<?php

namespace Weath\Test\Controller\Index;

class Edit extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_request;
     protected $_coreRegistry;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\App\Request\Http $request,
          \Magento\Framework\Registry $coreRegistry
     ){
          $this->_pageFactory = $pageFactory;
          $this->_request = $request;
          $this->_coreRegistry = $coreRegistry;
          return parent::__construct($context);
     }

     public function execute()
     {
        $id = $this->_request->getParam('id');
        $this->_coreRegistry->register('editId', $id);
          return $this->_pageFactory->create();
     }
}

// if ($this->getRequest()->isPost()) {
//      $input = $this->getRequest()->getPostValue();
//      $postData = $this->_contactFactory->create();
//      if (isset($input['editId'])) {
//           $id = $input['editId'];
//      } else {
//           $id = 0;
//      }
//      if($id != 0){
//           $postData->load($id);
//           $postData->addData($input);
//           $postData->setId($id);
//           $postData->save();
//      }else{
//           $postData->setData($input)->save();
//      }
//      $this->messageManager->addSuccessMessage("Data added successfully!");
//      return $this->_redirect('weather/index/index');
// }
// return $this->_redirect('weather/index/index');
