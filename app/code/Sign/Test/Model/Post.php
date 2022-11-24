<?php
namespace Sign\Test\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'sign_test_post';
	protected $_cacheTag = 'sign_test_post';
	protected $_eventPrefix = 'sign_test_post';
	protected function _construct()
	{
		$this->_init('Sign\Test\Model\ResourceModel\Post');
	}
	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}
	public function getDefaultValues()
	{
		$values = [];
		return $values;
	}
}