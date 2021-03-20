<?php

namespace Houston\Price\Ui\Model;

use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class PriceRequestsDataProvider
 * @package Houston\Price\Ui\Model
 */
class PriceRequestsDataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    /**
     * @var \Houston\Price\Model\ResourceModel\Collection\Price
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var \Houston\Price\Model\PriceRepository
     */
    private $priceRepository;

    /**
     * @var
     */
    protected $loadedData;

    /**
     * PriceRequestsDataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param DataPersistorInterface $dataPersistor
     * @param \Houston\Price\Model\PriceRepository $priceRepository
     * @param array $meta
     * @param array $data
     * @param \Magento\Ui\DataProvider\Modifier\PoolInterface|null $pool
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        DataPersistorInterface $dataPersistor,
        \Houston\Price\Model\PriceRepository $priceRepository,
        array $meta = [],
        array $data = [],
        \Magento\Ui\DataProvider\Modifier\PoolInterface $pool = null
    )
    {
        $this->priceRepository = $priceRepository;

        $this->collection = $priceRepository->getPriceCollection();
        $this->dataPersistor = $dataPersistor;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data,
            $pool
        );
    }

    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $item) {
            $this->loadedData[$item->getId()] = $item->getData();
        }

        $data = $this->dataPersistor->get('houston_price');

        if (!empty($data)) {
            $item = $this->collection->getNewEmptyItem();
            $item->setData($data);
            $this->loadedData[$item->getId()] = $item->getData();


            $this->dataPersistor->clear('houston_price');
        }
        return $this->loadedData;
    }
}