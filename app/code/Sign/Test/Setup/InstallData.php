<?php
namespace Sign\Test\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{
	protected $_postFactory;
	public function __construct(\Sign\Test\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		$data = [
			'name' => "Magento Modules",
			'date' => "This post is all about Magento modules.",
			
		];
		$post = $this->_postFactory->create();
		$post->addData($data)->save();
	}
}