<?php

namespace Houston\Price\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\SchemaPatchInterface;

/**
 * Class SchemingPriceRequests
 * @package Houston\Price\Setup\Patch\Schema
 */
class SchemingPriceRequests implements SchemaPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * SchemingPriceRequests constructor.
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }


    /**
     * @return SchemingPriceRequests|void
     * @throws \Zend_Db_Exception
     */
    public function apply()
    {
        $table = $this->moduleDataSetup->getConnection()

            ->newTable($this->moduleDataSetup->getTable('houston_user_price_request'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Request id'
            )
            ->addColumn(
                'user_name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                40,
                ['nullable' => false, 'unsigned' => true,],
                'User name'
            )
            ->addColumn(
                'user_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                40,
                ['nullable' => false, 'unsigned' => true,],
                'User email'
            )
            ->addColumn(
                'product_sku',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                15,
                ['nullable' => false, 'unsigned' => true,],
                'Product sku'
            )
            ->addColumn(
                'request_status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                ['nullable' => false, 'default'=> 'New'],
                'Request status'
            )
            ->addColumn(
                'comment',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => true],
                'Comment'
            )->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                30,
                ['nullable' => true, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created at'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                30,
                ['nullable' => true, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Updated at'
            )

            ->setOption('type', 'InnoDB')
            ->setOption('charset', 'utf8')
            ->setComment('User request price Table');



        $this->moduleDataSetup->getConnection()->createTable($table);
    }
    /**
     * {@inheritdoc}
     */
    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $this->moduleDataSetup->getConnection()->endSetup();
    }
    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @return array
     */
    public static function getDependencies()
    {
        return [];
    }
}



