<?php
namespace Learning\Js\Controller\Adminhtml\Grid;

use Learning\Js\Model\GridFactory;
use Magento\Backend\App\Action;

class Delete extends \Magento\Backend\App\Action
{
   
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_model;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       GridFactory $gridFactory

    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_model = $gridFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        
       $id =  $this->getRequest()->getParam("entity_id");
       $resultRedirect = $this->resultRedirectFactory->create();
       try{
            $data = $this->_model->create();
            $data->load($id);
            $data->delete();
            $this->messageManager->addSuccess(__('Record deleted'));
            return $resultRedirect->setPath('*/Index/displaydata');

       } catch(\Exception $e){
        $this->messageManager->addError($e->getMessage());
       }
    }


}
