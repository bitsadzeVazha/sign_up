<?php
namespace Sign\Test\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;
		$installer->startSetup();
		if(version_compare($context->getVersion(), '1.0.1', '<')) {
			if (!$installer->tableExists('sign_test_post')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('sign_test_post')
				)
					->addColumn(
						'post_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'Post ID'
					)
					->addColumn(
						'name',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Name'
					)
					->addColumn(
						'date',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						'64k',
						[],
						'date'
					)
					
					->setComment('Post Table');
				$installer->getConnection()->createTable($table);
				$installer->getConnection()->addIndex(
					$installer->getTable('sign_test_post'),
					$setup->getIdxName(
						$installer->getTable('sign_test_post'),
						['name','date'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['name','date'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}
		$installer->endSetup();
	}
}