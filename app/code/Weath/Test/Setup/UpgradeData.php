<?php
namespace Weath\Test\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;
	public function __construct(\Weath\Test\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.3.8', '<')) {
			$data = [
				'city' => "Tbilisi",
				'description' => 'rain'
				
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
		
	}
}