<?php
namespace Jc\SuperHero\Controller\Hero;

use Jc\SuperHero\Model\Hero;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory; 

class Delete extends Action
{
    /**
     * @var Hero
     */
     private $hero;

     /**
      * @var \Jc\SuperHero\Model\ResourceModel\Hero
      */

      private $heroResourceModel;

   /**Save Constructor
    * @param Context $context
    */

    public function __construct(
                       Context $context,
                       Hero $hero,
                      \Jc\SuperHero\Model\ResourceModel\Hero $heroResourceModel
                ){
                    $this->hero = $hero;
                    $this->heroResourceModel = $heroResourceModel;
                    parent::__construct($context);
                }
    
    public function execute()
    {
      $params = (int)($this->getRequest()->getParam('id'));
      //echo $params;die;
       $model = $this->hero->load($params);
        try
           {
             
            $mod = $this->heroResourceModel->delete($model);
             $this->messageManager->addSuccessMessage(__("Your Record has been deleted Successfully",$mod));
           }
           catch(Exceptoion $e)
           {
              $this->messageManager->addError(__("Your recode has not been deleted"));
           }

            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl('superhero'));
            return $resultRedirect;

      }
}