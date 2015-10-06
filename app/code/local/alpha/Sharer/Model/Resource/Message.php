<?php
class Alpha_Sharer_Model_Resource_Message extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('sharer/message', 'message_id');
    }
}