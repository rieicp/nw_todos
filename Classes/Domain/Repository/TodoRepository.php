<?php
namespace NWInt\NwTodos\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/***
 *
 * This file is part of the "Todos Listing" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Ning Wei <ning.wei@int-trade.de>, NW Int Trading
 *
 ***/

/**
 * The repository for Todos
 */
class TodoRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findCertainTodos($settings)
    {
//        $configurationM = $this->objectManager->get(ConfigurationManagerInterface::class);
//        $settings = $configurationM->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);

        $query = $this->createQuery();

        /* 按 'ordering' 排序 */
        $query->setOrderings(['ordering' => QueryInterface::ORDER_ASCENDING]);

        /* 排除已完成的 */
        $query->matching(
            $query->equals('finished', 0)
        );

        /* 限定最多显示的数量 */
        $limit = intval($settings['todos']['max']);
        if ( $limit >= 1) {
            $query->setLimit($limit);
        }

        if ($this->defaultQuerySettings !== null) {
            $query->setQuerySettings(clone $this->defaultQuerySettings);
        }

        $result = $query->execute();

        return $result;
    }

    /**
     * Returns a query for objects of this repository
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
     * @api
     */
    public function createQuery()
    {
        $query = $this->persistenceManager->createQueryForType($this->objectType);
        if ($this->defaultOrderings !== []) {
            $query->setOrderings($this->defaultOrderings);
        }
        if ($this->defaultQuerySettings !== null) {
            $query->setQuerySettings(clone $this->defaultQuerySettings);
        }
        /* 按 'ordering' 排序 */
        $query->setOrderings(['ordering' => QueryInterface::ORDER_ASCENDING]);
        /* 排除已完成的 */
        $query->matching(
            $query->equals('finished', 0)
        );
        return $query;
    }
}
