<?php


namespace Learning\Js\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'Learning\Js\Model\Grid',
            'Learning\Js\Model\ResourceModel\Grid'
        );
    }

}
