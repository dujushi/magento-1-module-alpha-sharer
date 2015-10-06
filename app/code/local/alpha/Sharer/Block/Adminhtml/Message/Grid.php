<?php
class Alpha_Sharer_Block_Adminhtml_Message_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('message_grid');
        $this->setDefaultSort('message_id');
        $this->setDefaultDir('DESC');
    }

    protected function _prepareCollection()
    {
        $collection =  Mage::getModel("sharer/message")->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('message_id', array(
            'index'     => 'message_id',
            'header'    => Mage::helper('sharer')->__('ID'),
            'type' => 'number',
            'sortable' => true,
            'width'    => '100px',
        ));

        $this->addColumn('product_id', array(
            'index'     =>'product_id',
            'header'    => Mage::helper('sharer')->__('Product Name'),
            'sortable' => true,
            'frame_callback' => array($this, 'prepareProductNameLayout'),
            'width'    => '150px',
        ));

        $this->addColumn('app_type', array(
            'index'     =>'app_type',
            'header'    => Mage::helper('sharer')->__('App Type'),
            'sortable' => true,
            'frame_callback' => array($this, 'prepareAppTypeLayout'),
            'width'    => '150px',
        ));

        $this->addColumn('content', array(
            'index'     =>'content',
            'header'    => Mage::helper('sharer')->__('Content'),
            'sortable' => false,
        ));

        $this->addColumn('created_at', array(
            'index'     =>'created_at',
            'header'    => Mage::helper('sharer')->__('Created At'),
            'type' => 'datetime',
            'sortable' => true,
            'width'    => '150px',
        ));

        return parent::_prepareColumns();
    }

    public function prepareAppTypeLayout($value) {
        $class = '';
        switch ($value) {
            case 'Facebook':
                $class = 'grid-severity-notice';
                break;
            default:
                $class = 'grid-severity-major';
                break;
        }
        return '<span class="' . $class . '"><span>' . $value . '</span></span>';
    }

    public function prepareProductNameLayout($value) {
        $name = Mage::getModel('catalog/product')->load($value)->getName();
        return '<span>' . $name . '</span>';
    }
}