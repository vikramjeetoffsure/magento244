<?php
namespace Learning\Js\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Learning\Js\Model\ResourceModel\Grid\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;

class Massdelete extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Learning_Js::massdelete';

    const PAGE_TITLE = 'Delete Massaction';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_filter;

    protected $_collectionFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       CollectionFactory $collectionFactory,
       Filter $filter
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {

        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDeleted = 0;
        foreach ($collection->getItems() as $record) {

            $deleteItem = $this->_objectManager->get('Learning\Js\Model\Grid')->load($record->getId());
           $deleteItem->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/Index/displaydata');

    }
    

}
