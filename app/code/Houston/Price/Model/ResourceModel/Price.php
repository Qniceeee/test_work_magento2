<?php
namespace Houston\Price\Model\ResourceModel;

use Houston\Price\Api\Data\PriceRequestsInterface;

/**
 * Class Price
 * @package Houston\Price\Model\ResourceModel
 */
class Price extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     *it is DB settings for use in model
     */
    protected function _construct()
    {
        $this->_init(PriceRequestsInterface::TABLE_NAME, PriceRequestsInterface::FIELD_NAME_ID);
    }
}
