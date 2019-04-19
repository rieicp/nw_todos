<?php
namespace NWInt\NwTodos\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

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
    public function createQuery()
    {
        $query = $this->persistenceManager->createQueryForType($this->objectType);

        $query->setOrderings(['ordering' => QueryInterface::ORDER_ASCENDING]);

        if ($this->defaultQuerySettings !== null) {
            $query->setQuerySettings(clone $this->defaultQuerySettings);
        }
        return $query;
    }
}
