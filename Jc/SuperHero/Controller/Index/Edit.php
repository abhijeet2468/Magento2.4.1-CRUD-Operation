<?php
namespace Jc\SuperHero\Controller\Index;

use Jc\SuperHero\Model\Hero;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory; 

class Edit extends Action
{
    /**
     * @var Hero
     */

     private $hero;

     /**
      * @var \Jc\SuperHero\Model\ResourceModel\Hero
      */

   /**Save Constructor
    * @param Context $context
    */

    protected $_pageFactory;

    protected $_coreRegistry;

    public function __construct(
                       Context $context,
                       Hero $hero,
                      \Jc\SuperHero\Model\ResourceModel\Hero $heroResourceModel,
                      \Magento\Framework\View\Result\PageFactory $pageFactory,
                      \Magento\Framework\Registry $coreRegistry
                ){
                    $this->hero = $hero;
                    $this->heroResourceModel = $heroResourceModel;
                    $this->_pageFactory = $pageFactory;
                    $this->_coreRegistry = $coreRegistry;
                    parent::__construct($context);
                }
    
    public function execute()
     {
      // echo $_SERVER['REQUEST_METHOD'];exit;
      if($_SERVER["REQUEST_METHOD"]=='GET')
      {
         $params = $this->getRequest()->getParams('id');   
        
         // echo var_dump( $paramName = $this->getRequest()->getParams('description')); 
         // exit;
          // $this->_coreRegistry->register('id', $params);
          // $this->_coreRegistry->register('id', $params);
   
              $model = $this->hero->load($params);
              $model->getData('id');
              $model->getData('name');
              $model->getData('description');
   

      }
      else{

         try{
           $params = $this->_request->getParams('id');
          
           $model = $this->hero->setData($params);
            $input = $this->heroResourceModel->save($model);
            $this->messageManager->addSuccessMessage(__("Your record have been updated successfully"));
         }
         catch(Exception $e)
         {
            $this->messageManager->addErrorMessage(__("Somehting ent wrong! please try Again"));
         }
         $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
         $resultRedirect->setUrl($this->_redirect->getRefererUrl('superhero'));
         return $resultRedirect;
          
      }
       return $this->_pageFactory->create();
      
    }
}

