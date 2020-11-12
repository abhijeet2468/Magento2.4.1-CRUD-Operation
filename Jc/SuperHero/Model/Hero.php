<?php
namespace Jc\SuperHero\Model;

use Magento\Framework\Model\AbstractModel;

class Hero extends AbstractModel
{
	protected function _construct()
	{
		//$this->_init(resourceModel: \Jc\SuperHero\Model\ResourceModel\Hero::class);
		$this->_init('Jc\SuperHero\Model\ResourceModel\Hero');
	}
		
	public function getIdentities()
        {
                return [self::CACHE_TAG . '_' . $this->getId()];
		}
		
	public function getDefaultValues()
        {
                $values = [];
 
                return $values;
        }

	 
}