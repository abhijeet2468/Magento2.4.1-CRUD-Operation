<?php
namespace Jc\SuperHero\Controller\Hero;

use Jc\SuperHero\Model\Hero;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory; 

class Save extends Action
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

       //echo 'Your form has been submitted successfully';

         $params = $this->_request->getParams();   //Returns an array of non URL-encoded parameters
        //var_dump($params);die;   //var_dump function dumps information about one or more variables.The information holds type and variables.
         $model = $this->hero->setData($params);  //
        //var_dump($model);
            // to save the data we need to use resource model
            //in this some exception occur so we have to surround it by try and catch 
            try{

                    $input= $this->heroResourceModel->save($model);
                    $this->messageManager->addSuccessMessage(__("Your record has been succesully submitted "));

                }
                catch(Exception $e)
                {
                    $this->messageManager->addErrorMessage(__("Something went wrong"));
                }
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl('superhero'));
            return $resultRedirect;
    }
}