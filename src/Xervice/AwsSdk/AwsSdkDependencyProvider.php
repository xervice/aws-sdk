<?php
declare(strict_types=1);

namespace Xervice\AwsSdk;


use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;
use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;

/**
 * @method \Xervice\Core\Locator\Locator getLocator()
 */
class AwsSdkDependencyProvider extends AbstractDependencyProvider
{
    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        return $container;
    }
}
