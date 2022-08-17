<?php

namespace Learning\Js\Model;

use Learning\Js\Model\ResourceModel\Grid\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Learning\Js\Model\ImageUploader;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;
    protected $storeManager;
    protected $ImageUploader;

    // @codingStandardsIgnoreStart
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $JobCollectionFactory,
        StoreManagerInterface $storeManager,
        ImageUploader $ImageUploader,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $JobCollectionFactory->create();
        $this->storeManager = $storeManager;
        $this->ImageUploader = $ImageUploader;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    // @codingStandardsIgnoreEnd

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $Job) {
            $this->loadedData[$Job->getId()] = $Job->getData();

            if($Job->getImage()) {
                $m['image'][0]['name'] = $Job->getImage();
                $m['image'][0]['url'] = $this->getMediaUrl().$Job->getImage();
                $fullData = $this->loadedData;
                $this->loadedData[$Job->getId()] = array_merge($fullData[$Job->getId()], $m);
            }
			

        }
        return $this->loadedData;
    }

    public function getMediaUrl()
    {
	
        $mediaUrl = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'griddata/tmp/feature/';
        
		return $mediaUrl;
    }
}
