<?php
namespace Houston\Price\Model\ResourceModel\Collection;

use Houston\Price\Api\Data\PriceRequestsInterface;

/**
 * Class Price
 * @package Houston\Price\Model\ResourceModel\Collection
 */
class Price extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = PriceRequestsInterface::FIELD_NAME_ID;

    /**
     *
     */
    protected function _construct()
    {
        $this->_init(
            \Houston\Price\Model\Price::class,
            \Houston\Price\Model\ResourceModel\Price::class
        );
    }
}