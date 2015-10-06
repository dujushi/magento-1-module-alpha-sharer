<?php
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('sharer/message'))
    ->addColumn('message_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Share Id')
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'nullable'  => false,
    ), 'Product Id')
    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
    ), 'Customer Id')
    ->addColumn('app_type', Varien_Db_Ddl_Table::TYPE_VARCHAR, 10, array(
    ), 'App Type')
    ->addColumn('app_user_id', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
    ), 'App User Id')
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    ), 'Content')
    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        "default" => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
    ), 'Creation Time');
$installer->getConnection()->createTable($table);

$installer->endSetup();
