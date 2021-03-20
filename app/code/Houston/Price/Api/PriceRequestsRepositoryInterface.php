<?php
namespace Houston\Price\Api;

/**
 * Interface PriceRequestsRepositoryInterface
 * @package Houston\Price\Api
 */
interface PriceRequestsRepositoryInterface
{

    /**
     * @param $model
     * @return mixed|void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save($model);

    /**
     * @param $model
     * @return bool
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete($model);

    /**
     * @param $id
     * @return \Houston\Price\Model\Price|mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param $searchCriteria
     * @return \Magento\Framework\Api\SearchResultsInterface|mixed
     */
    public function getList($searchCriteria);
}
