<?php

namespace Learning\Js\Model;


class Grid extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface

{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'kp_grid_admin';

    /**
     * @var string
     */
    protected $_cacheTag = 'kp_grid_admin';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'kp_grid_admin';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Learning\Js\Model\ResourceModel\Grid');
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
