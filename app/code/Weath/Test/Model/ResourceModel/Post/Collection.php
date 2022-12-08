<?php
namespace Weath\Test\Model\ResourceModel\Post;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'sign_test_input_collection';
	protected $_eventObject = 'post_collection';
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Weath\Test\Model\Post', 'Weath\Test\Model\ResourceModel\Post');
	}
}