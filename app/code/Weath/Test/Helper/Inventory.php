<?php
namespace Weath\Test\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\HTTP\Client\Curl;

class Inventory extends AbstractHelper
{

    /**
    * @var Curl
    */
    protected $curl;
    

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
    Curl $curl
    ) {
    parent::__construct($context);
    $this->curl = $curl;
    }

    
    public function makeACurlRequest($city) {
    
    

    $URL = "api.openweathermap.org/data/2.5/weather?q=$city&appid=af92c847043cbd009a6af56c76ab5d09";
    
   $this->curl->setOption(CURLOPT_HEADER, 0);
   $this->curl->setOption(CURLOPT_TIMEOUT, 60);
   $this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
   $this->curl->setOption(CURLOPT_CUSTOMREQUEST, 'GET');

    $this->curl->addHeader("Content-Type", "application/json");
    
    $this->curl->get($URL);
    
    $response = $this->curl->getBody();
    
    return $response;
    
    
    
    }
}
