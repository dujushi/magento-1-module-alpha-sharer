<?php
class Alpha_Sharer_Block_Adminhtml_Message extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_headerText = Mage::helper('sharer')->__('Alpha Sharer Messages');
        $this->_blockGroup = 'sharer';
        $this->_controller = 'adminhtml_message';

        parent::__construct();
    }

    protected function _prepareLayout()
    {
        $this->_removeButton('add');

        return parent::_prepareLayout();
    }
}