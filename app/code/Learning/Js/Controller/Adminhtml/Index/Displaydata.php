<?php
namespace Learning\Js\Controller\Adminhtml\Index;

class Displaydata extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $gridRecord;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Learning\Js\Model\GridFactory $gridFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->gridRecord = $gridFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {   
        // $data = $this->gridRecord->create();
        // $collections =  $data->getCollection();

        // echo"<pre>"; print_r($collections->getData());

        $resultPage =  $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Grid Data')));

		return $resultPage;
    }
}
