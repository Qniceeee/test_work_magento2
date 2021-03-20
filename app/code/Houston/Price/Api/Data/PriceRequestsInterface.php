<?php

namespace Houston\Price\Api\Data;

/**
 * Interface PriceRequestsInterface
 * @package Houston\Price\Api\Data
 */
interface PriceRequestsInterface
{
    const TABLE_NAME = 'houston_user_price_request';

    const FIELD_NAME_ID = 'id';

    const FIELD_NAME_USER_NAME = 'user_name';

    const FIELD_NAME_USER_EMAIL = 'user_email';

    const FIELD_NAME_PRODUCT_SKU = 'product_sku';

    const FIELD_NAME_REQUEST_STATUS = 'request_status';

    const FIELD_NAME_USER_COMMENT = 'comment';

    const FIELD_NAME_CREATED_AT = 'created_at';

    const FIELD_NAME_UPDATED_AT = 'updated_at';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getUserName();

    /**
     * @param $userName
     * @return mixed
     */
    public function setUserName($userName);

    /**
     * @return mixed
     */
    public function getUserEmail();

    /**
     * @param $userEmail
     * @return mixed
     */
    public function setUserEmail($userEmail);

    /**
     * @return mixed
     */
    public function getRequestStatus();

    /**
     * @param $status
     * @return mixed
     */
    public function setRequestStatus($status);

    /**
     * @return mixed
     */
    public function getComment();

    /**
     * @param $comment
     * @return mixed
     */
    public function setComment($comment);

    /**
     * @return mixed
     */
    public function getProductSku();

    /**
     * @param $sku
     * @return mixed
     */
    public function setProductSku($sku);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getUpdatedAt();
}

