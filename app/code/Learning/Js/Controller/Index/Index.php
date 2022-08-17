<?php
namespace Learning\Js\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $default;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \Learning\Js\Model\Cars $default
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->default = $default;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        //return $this->_pageFactory->create();

        var_dump($this->default->cars);

        //echo $this->default->get_values();
    }
}
