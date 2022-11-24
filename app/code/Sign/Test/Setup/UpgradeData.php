<?php
namespace Sign\Test\Setup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;
	public function __construct(\Sign\Test\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.2.6', '<')) {
			$data = [
				'name' => "Magento Modules",
				'date' => "This post is all about Magento modules.",
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
		
	}
}