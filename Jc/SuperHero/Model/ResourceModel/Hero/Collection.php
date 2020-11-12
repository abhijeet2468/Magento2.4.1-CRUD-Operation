<?php
namespace Jc\SuperHero\Model\ResourceModel\Hero;

use Jc\SuperHero\Model\Hero;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

	 /**
     * @var string
     */
	protected $_idFieldName = 'id';
	
	protected function _construct()
	{
		// $this->_init(model: Hero::class, resourceModel: \Jc\SuperHero\Model\ResourceModel\Hero::class);
		$this->_init('Jc\SuperHero\Model\Hero', 'Jc\SuperHero\Model\ResourceModel\Hero');
	}
}