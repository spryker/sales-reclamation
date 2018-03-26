<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SalesReclamation\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;
use Spryker\Zed\SalesReclamation\Persistence\Propel\SpySalesReclamationItemQuery;
use Spryker\Zed\SalesReclamation\Persistence\Propel\SpySalesReclamationQuery;

/**
 * @method \Spryker\Zed\SalesReclamation\Persistence\SalesReclamationPersistenceFactory getFactory()
 */
class SalesReclamationQueryContainer extends AbstractQueryContainer implements SalesReclamationQueryContainerInterface
{
    /**
     * @api
     *
     * @return \Orm\Zed\SalesReclamation\Persistence\SpySalesReclamationQuery
     */
    public function queryReclamations(): SpySalesReclamationQuery
    {
        return $this->getFactory()->createSalesReclamationQuery();
    }

    /**
     * @api
     *
     * @return \Orm\Zed\SalesReclamation\Persistence\SpySalesReclamationItemQuery
     */
    public function queryReclamationItems(): SpySalesReclamationItemQuery
    {
        return $this->getFactory()->createSalesReclamationItemQuery();
    }
}
