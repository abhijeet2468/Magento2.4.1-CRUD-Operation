<?php
namespace Jc\SuperHero\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
class Data extends AbstractHelper
{
    public function getStoreConfig()  // This function will be called anywhere in Magento2 by using Dependenct Injection
    {
        echo 'We are Creating the best ecommerce Website';
    }
}