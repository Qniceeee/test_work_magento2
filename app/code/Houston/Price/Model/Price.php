<?php
namespace Houston\Price\Model;

use Houston\Price\Api\Data\PriceRequestsInterface;

/**
 * Class Price
 * @package Houston\Price\Model
 */
class Price extends \Magento\Framework\Model\AbstractModel implements PriceRequestsInterface
{
    /**
     * ResourceModel settings
     */
    protected function _construct()
    {
        $this->_init(\Houston\Price\Model\ResourceModel\Price::class);
    }

    /**
     * @return array|mixed|null
     */
    public function getUserName()
    {
        return $this->getData(self::FIELD_NAME_USER_NAME);
    }

    /**
     * @param $userName
     * @return Price|mixed
     */
    public function setUserName($userName)
    {
        return $this->setData(self::FIELD_NAME_USER_NAME, $userName);
    }

    /**
     * @return array|mixed|null
     */
    public function getUserEmail()
    {
        return $this->getData(self::FIELD_NAME_USER_EMAIL);
    }

    /**
     * @param $userEmail
     * @return Price|mixed
     */
    public function setUserEmail($userEmail)
    {
        return $this->setData(self::FIELD_NAME_USER_EMAIL, $userEmail);
    }

    /**
     * @return array|mixed|null
     */
    public function getRequestStatus()
    {
        return $this->getData(self::FIELD_NAME_REQUEST_STATUS);
    }

    /**
     * @param $status
     * @return Price|mixed
     */
    public function setRequestStatus($status)
    {
        return $this->setData(self::FIELD_NAME_REQUEST_STATUS, $status);
    }

    /**
     * @return array|mixed|null
     */
    public function getComment()
    {
        return $this->getData(self::FIELD_NAME_USER_COMMENT);
    }

    /**
     * @param $comment
     * @return Price|mixed
     */
    public function setComment($comment)
    {
        return $this->setData(self::FIELD_NAME_USER_COMMENT, $comment);
    }

    /**
     * @return array|mixed|null
     */
    public function getProductSku()
    {
        return $this->getData(self::FIELD_NAME_PRODUCT_SKU);
    }

    /**
     * @param $sku
     * @return Price|mixed
     */
    public function setProductSku($sku)
    {
        return $this->setData(self::FIELD_NAME_PRODUCT_SKU, $sku);
    }

    /**
     * @return array|mixed|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::FIELD_NAME_CREATED_AT);
    }

    /**
     * @return array|mixed|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::FIELD_NAME_UPDATED_AT);
    }
}