<?php
namespace Learning\Js\Controller\Adminhtml\Grid;

use Magento\Framework\Controller\ResultFactory;

class Add extends \Magento\Backend\App\Action
{
  
    public function execute()
    {   
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Record'));
        return $resultPage;
    }

}
