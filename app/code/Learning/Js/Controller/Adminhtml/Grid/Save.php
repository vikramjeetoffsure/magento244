<?php
namespace Learning\Js\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Learning\Js\Model\Grid;
use Magento\Backend\Model\Session;

class Save extends \Magento\Backend\App\Action
{
    protected $Custommodel;
    protected $adminsession;

    public function __construct(
        Action\Context $context,
        Grid $Custommodel,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->Custommodel = $Custommodel;
        $this->adminsession = $adminsession;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
            $data['image'] = $data['image'][0]['name'];
           //$this->imageUploader->moveFileFromTmp($data['image']);
        } elseif (isset($data['image'][0]['name']) && !isset($data['image'][0]['tmp_name'])) {
            $data['image'] = $data['image'][0]['name'];
        } else {
            $data['image'] = '';
        }

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $objDate = $objectManager->create('Magento\Framework\Stdlib\DateTime\DateTime');
        
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $job_id = $this->getRequest()->getParam('entity_id');
            
            if ($job_id) {
                $this->Custommodel->load($job_id);
               // $date = date("m/y/d");
               $date =  $objDate->gmtDate();
                $array_date = array("update_time"=>$date);
                $data = array_merge($array_date,$data);
            }
            
           // echo "<pre>"; print_r($data); die("dd");
            $this->Custommodel->setData($data);
            
            try {
                $this->Custommodel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        echo $this->Custommodel->getEntityId(); die("add part");
                        return $resultRedirect->setPath('*/grid/add');
                    } else {
                        //echo $this->Custommodel->getId(); die("edit part");
                        return $resultRedirect->setPath(
                            '*/grid/edit',
                            [
                                'entity_id' => $this->Custommodel->getId(),
                                '_current' => true
                            ]
                        );
                    }
                }
                return $resultRedirect->setPath('*/Index/displaydata');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/Index/displaydata', ['entity_id' => $this->getRequest()->getParam('entity_id')]);
        }
        return $resultRedirect->setPath('*/grid/');
    }
}
