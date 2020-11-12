<?php
namespace Jc\SuperHero\Block;

use Jc\SuperHero\Model\Hero;
use Jc\SuperHero\Model\ResourceModel\Hero\Collection;

use Magento\Framework\View\Element\Template;


class Display extends Template
{

	/**
	*  @var Collection
	*/

	private $collection;

	/**
	* Display Constructor
	*  @param Template\Context $context
	*  @param Collection $collection
	*  @param array $data
	*
	*
	*/

	 /**
     * @var Hero
     */

	private $hero;

	protected $_coreRegistry;

	//protected $_postLoader;
	public function __construct(Template\Context $context,
								Collection $collection,
								\Magento\Framework\Registry $coreRegistry,
							//	\Jc\SuperHero\Model\HeroFactory $postLoader,
							Hero $hero,
								array $data=[]
								)
	{
		$this->collection = $collection;
		$this->_coreRegistry = $coreRegistry;
		// $this->_postLoader = $postLoader;
		$this->hero = $hero;
		parent:: __construct($context, $data);
		
	}

	/**
	*   @return Collection
	*/

	public function getAllSuperHeroes()
	{
		return $this->collection;
	}



	/**
	* @return string
	*/

	public function getPostUrl()
	{  
		return $this->getUrl('superhero/hero/save');
	}

	

	

	/**
	*	@return string
	*
	*/
	public function getDeleteUrl()
	{  
		
		return $this->getUrl('superhero/hero/delete');
	}

	public function getCollectionId()
    {
		$collection = $this->getCollection()->getById('id');
		return $collection;
    }
	
	public function getEditRecord()
     {  
		if ($_SERVER["REQUEST_METHOD"] == "GET")
		 {
			$params = $this->getRequest()->getParam('id');

			$model = $this->hero->load($params);
	
			$value = $model->getData();
			return $value;

		 }
		
		

		//return $this->getUrl('superhero/index/edit');
     }
}