<?php

namespace Ao\ProductsFilter\Setup;

use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\GroupFactory;

class InstallData implements InstallDataInterface
{
    protected $groupFactory;

    public function __construct(GroupFactory $groupFactory) {
        $this->groupFactory = $groupFactory;
    }

    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        // Create the new group
        /** @var \Magento\Customer\Model\Group $group */
        $group = $this->groupFactory->create();
        $group->setCode('B2B')
        ->setTaxClassId(3) // magic numbers OK, core installers do it?!
        ->save();

        $setup->endSetup();
    }
}

?>