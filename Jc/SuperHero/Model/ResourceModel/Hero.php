<?php
namespace Jc\SuperHero\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Hero extends AbstractDb
{
	/**
     * @var string
     */
	protected $_idFieldName = 'id';
	
	protected function _construct()
	{
		//$this->_init(mainTable:'jc_superhero', idFieldName:'id');
		$this->_init('jc_superhero', 'id');
	}
}