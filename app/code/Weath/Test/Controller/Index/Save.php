<?php

namespace Weath\Test\Controller\Index;
class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_contactFactory;
     protected $helperInventory;
     

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Weath\Test\Model\PostFactory $contactFactory,
          \Weath\Test\Helper\Inventory $helperInventory
     ){
          $this->_pageFactory = $pageFactory;
          $this->helperInventory = $helperInventory;
          $this->_contactFactory = $contactFactory;
          return parent::__construct($context);
     }
     public function getTown($mega){
          $town = $this->helperInventory->makeACurlRequest($mega);
          
          return $town;
      }

     
     public function execute()
     {
          if ($this->getRequest()->isPost()) {
               $input = $this->getRequest()->getPostValue();
               $data= $this->helperInventory->makeACurlRequest($input['city']);
               $bi = json_decode("$data");
               $code = $bi->cod;
               if($code === 200){
                    $descript = $bi->weather[0]->description;
                    $country = $bi->sys->country;
                    $temperature = $bi->main->temp;
                    $feels = $bi->main->feels_like;
                    $pressure = $bi->main->pressure;
                    $humidity = $bi->main->humidity;
                    $wind = $bi->wind->speed;
                    $sunrise = $bi->sys->sunrise;
                    $sunr = gmdate("Y-m-d\ H:i:s", $sunrise);
                    $sunset = $bi->sys->sunset;
                    $suns = gmdate("Y-m-d\ H:i:s", $sunset);
                    
                    $postData = $this->_contactFactory->create();
                    $postData->addData($input);
                    $postData->addData([
                         'description' => $descript,
                         'country' => $country,
                         'temperature' => $temperature,
                         'feels like' => $feels,
                         'pressure' => $pressure,
                         'humidity' => $humidity ,
                         'wind speed' => $wind,
                         'sunrise' => $sunr,
                         'sunset' => $suns,
                         'code' => $code
     
                    ]);
     
                    $postData ->save(); 
               }else{
                    $postData = $this->_contactFactory->create();
                    $postData->addData([
                     
                         'code' => 401
     
                    ]);
                    $postData ->save(); 
                    return $this->_redirect('weather/index/insert');    
               }
               

               
               
               // if (isset($input['editId'])) {
               //      $id = $input['editId'];
               // } else {
               //      $id = 0;
               // }
               // if($id != 0){
               //      $postData->load($id);
               //      $postData->addData($input);
               //      $postData->setId($id);
               //      $postData->save();
               // }else{
               //      $postData->setData($input)->save();
               // }
               // $this->messageManager->addSuccessMessage("Data added successfully!");
               // return $this->_redirect('weather/index/index');
          }
          return $this->_redirect('weather/index/insert');
     }

     
}
