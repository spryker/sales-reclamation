<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\SalesReclamation\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\SalesReclamation\Business\Order\OrderExpander;
use Spryker\Zed\SalesReclamation\Business\Order\OrderExpanderInterface;
use Spryker\Zed\SalesReclamation\Business\Order\ReclamationSaver;
use Spryker\Zed\SalesReclamation\Business\Order\ReclamationSaverInterface;
use Spryker\Zed\SalesReclamation\Business\Reclamation\Hydrator;
use Spryker\Zed\SalesReclamation\Business\Reclamation\HydratorInterface;
use Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationItemWriter;
use Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationItemWriterInterface;
use Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationReader;
use Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationReaderInterface;
use Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationWriter;
use Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationWriterInterface;
use Spryker\Zed\SalesReclamation\Dependency\Facade\SalesReclamationToSalesFacadeInterface;
use Spryker\Zed\SalesReclamation\SalesReclamationDependencyProvider;

/**
 * @method \Spryker\Zed\SalesReclamation\SalesReclamationConfig getConfig()
 * @method \Spryker\Zed\SalesReclamation\Persistence\SalesReclamationEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\SalesReclamation\Persistence\SalesReclamationRepositoryInterface getRepository()
 */
class SalesReclamationBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationWriterInterface
     */
    public function createReclamationWriter(): ReclamationWriterInterface
    {
        return new ReclamationWriter(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationReaderInterface
     */
    public function createReclamationReader(): ReclamationReaderInterface
    {
        return new ReclamationReader(
            $this->getRepository()
        );
    }

    /**
     * @return \Spryker\Zed\SalesReclamation\Business\Reclamation\ReclamationItemWriterInterface
     */
    public function createReclamationItemWriter(): ReclamationItemWriterInterface
    {
        return new ReclamationItemWriter(
            $this->getEntityManager()
        );
    }

    /**
     * @return \Spryker\Zed\SalesReclamation\Business\Reclamation\HydratorInterface
     */
    public function createReclamationHydrator(): HydratorInterface
    {
        return new Hydrator(
            $this->getSalesFacade(),
            $this->getRepository()
        );
    }

    /**
     * @return \Spryker\Zed\SalesReclamation\Business\Order\OrderExpanderInterface
     */
    public function createReclamationOrderExpander(): OrderExpanderInterface
    {
        return new OrderExpander(
            $this->getSalesFacade()
        );
    }

    /**
     * @return \Spryker\Zed\SalesReclamation\Dependency\Facade\SalesReclamationToSalesFacadeInterface
     */
    public function getSalesFacade(): SalesReclamationToSalesFacadeInterface
    {
        return $this->getProvidedDependency(SalesReclamationDependencyProvider::FACADE_SALES);
    }
}
