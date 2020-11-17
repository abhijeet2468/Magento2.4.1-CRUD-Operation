<?php

namespace Jc\SuperHero\Controller\Index;
 
class Index extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;

     public $helper;
 
     public function __construct(\Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
                   \Jc\SuperHero\Helper\Data $helper
                                 )
     {
          
          $this->_pageFactory = $pageFactory;
          $this->helper = $helper;

          return parent::__construct($context);

     }
 
     public function execute()
     {
          
         $this->helper->getStoreConfig();
         $page = $this->_pageFactory->create();
        
          return $page;
     }
}