<?php
declare(strict_types=1);

namespace Xervice\AwsSdk\Business;


use Aws\Ec2\Ec2Client;
use Xervice\AwsSdk\Business\Model\Aws\ResultHydrator;
use Xervice\AwsSdk\Business\Model\Aws\ResultHydratorInterface;
use Xervice\AwsSdk\Business\Model\Ec2\Ec2ClientBridge;
use Xervice\AwsSdk\Business\Model\Ec2\Ec2ClientBridgeInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

/**
 * @method \Xervice\AwsSdk\AwsSdkConfig getConfig()
 */
class AwsSdkBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Xervice\AwsSdk\Business\Model\Ec2\Ec2ClientBridgeInterface
     */
    public function createEc2ClientBridge(): Ec2ClientBridgeInterface
    {
        return new Ec2ClientBridge(
            $this->createEc2Client(),
            $this->createResultHydrator()
        );
    }

    /**
     * @return \Xervice\AwsSdk\Business\Model\Aws\ResultHydratorInterface
     */
    public function createResultHydrator(): ResultHydratorInterface
    {
        return new ResultHydrator();
    }

    /**
     * @return \Aws\Ec2\Ec2Client
     */
    protected function createEc2Client(): Ec2Client
    {
        return Ec2Client::factory(
            $this->getConfig()->getClientConfig()
        );
    }
}