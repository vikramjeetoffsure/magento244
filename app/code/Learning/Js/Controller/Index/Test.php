<?php
namespace Learning\Js\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
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
        $data = $this->gridRecord->create();
        $collections =  $data->getCollection();
    
        foreach($collections as $collection){
            echo "<pre>";
            print_r($collection->getData());   
        }
        echo $rowId = (int) $this->getRequest()->getParam('entity_id');
      //  echo "Heloooo"; exit("Ddd");
        //return $this->_pageFactory->create();
    }
}
