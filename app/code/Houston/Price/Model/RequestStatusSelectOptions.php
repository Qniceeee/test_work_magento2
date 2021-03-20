<?php

namespace Houston\Price\Model;

/**
 * Class RequestStatusSelectOptions
 * @package Houston\Price\Model
 */
class RequestStatusSelectOptions implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];

        $options[] = [
            'label' => __('In Progress'),
            'value' => 'In Progress',
        ];
        $options[] = [
            'label' => __('New'),
            'value' => 'New',
        ];
        $options[] = [
            'label' => __('Closed'),
            'value' => 'Closed',
        ];
        return $options;
    }
}
