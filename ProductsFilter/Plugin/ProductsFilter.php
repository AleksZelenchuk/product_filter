<?php
namespace Ao\ProductsFilter\Plugin;

use Magento\Catalog\Model\ResourceModel\Product\Collection as ProductCollection;

class ProductsFilter
{

    protected $groupRepository;
    protected $_customerSession;

    public function __construct(
                        \Magento\Customer\Model\Session $customerSession,
                        \Magento\Customer\Api\GroupRepositoryInterface $groupRepository
    ){
        $this->_customerSession = $customerSession;
        $this->groupRepository = $groupRepository;
    }


    public function getGroupName($groupId){
        $group = $this->groupRepository->getById($groupId);
        return $group->getCode();
    }

   /* public function aroundAddFieldToFilter(ProductCollection $collection, \Closure $proceed, $fields, $condition = null)
    {
        $customerGroupId = $this->_customerSession->getCustomer()->getGroupId();
        $customerGroupName = $this->getGroupName($customerGroupId);
        if($this->_customerSession->isLoggedIn() AND $customerGroupName == 'B2B'){
            $collection->addAttributeToFilter('b2b', '0');
        }

        return $fields ? $proceed($fields, $condition) : $collection;
    }*/
}