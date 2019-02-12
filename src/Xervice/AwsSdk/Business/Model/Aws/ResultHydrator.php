<?php
declare(strict_types=1);

namespace Xervice\AwsSdk\Business\Model\Aws;


use Aws\Result;
use Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface;

class ResultHydrator implements ResultHydratorInterface
{
    /**
     * @param string $dataProviderClass
     * @param \Aws\Result $result
     *
     * @return \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
     */
    public function hydrate(string $dataProviderClass, Result $result): DataProviderInterface
    {
        $dataProvider = new $dataProviderClass();

        $dataProvider->fromArray(
            $result->toArray()
        );

        return $dataProvider;
    }
}