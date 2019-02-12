<?php
declare(strict_types=1);

namespace Xervice\AwsSdk\Business;


use DataProvider\Ec2DescribeInstancesDataProvider;
use DataProvider\Ec2DescribeInstancesResultDataProvider;
use DataProvider\Ec2InstancesDataProvider;
use DataProvider\Ec2InstancesResultDataProvider;
use DataProvider\Ec2KeyPairDataProvider;
use DataProvider\Ec2KeyPairResultDataProvider;
use DataProvider\Ec2SecurityGroupDataProvider;
use DataProvider\Ec2SecurityGroupResultDataProvider;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\AwsSdk\Business\AwsSdkBusinessFactory getFactory()
 * @method \Xervice\AwsSdk\AwsSdkConfig getConfig()
 */
class AwsSdkFacade extends AbstractFacade
{
    /**
     * @param \DataProvider\Ec2KeyPairDataProvider $keyPairDataProvider
     *
     * @return \DataProvider\Ec2KeyPairResultDataProvider
     */
    public function createKeyPair(Ec2KeyPairDataProvider $keyPairDataProvider): Ec2KeyPairResultDataProvider
    {
        return $this->getFactory()->createEc2ClientBridge()->createKeyPair($keyPairDataProvider);
    }

    /**
     * @param \DataProvider\Ec2KeyPairDataProvider $keyPairDataProvider
     */
    public function deleteKeyPair(Ec2KeyPairDataProvider $keyPairDataProvider): void
    {
        $this->getFactory()->createEc2ClientBridge()->deleteKeyPair($keyPairDataProvider);
    }

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     *
     * @return \DataProvider\Ec2SecurityGroupResultDataProvider
     */
    public function createSecurityGroup(
        Ec2SecurityGroupDataProvider $securityGroupDataProvider
    ): Ec2SecurityGroupResultDataProvider
    {
        return $this->getFactory()->createEc2ClientBridge()->createSecurityGroup($securityGroupDataProvider);
    }

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     */
    public function deleteSecurityGroup(Ec2SecurityGroupDataProvider $securityGroupDataProvider): void
    {
        $this->getFactory()->createEc2ClientBridge()->deleteSecurityGroup($securityGroupDataProvider);
    }

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     */
    public function authorizeSecurityGroupIngress(Ec2SecurityGroupDataProvider $securityGroupDataProvider): void
    {
        $this->getFactory()->createEc2ClientBridge()->authorizeSecurityGroupIngress($securityGroupDataProvider);
    }

    /**
     * @param \DataProvider\Ec2InstancesDataProvider $instancesDataProvider
     *
     * @return \DataProvider\Ec2InstancesResultDataProvider
     */
    public function runInstance(Ec2InstancesDataProvider $instancesDataProvider): Ec2InstancesResultDataProvider
    {
        return $this->getFactory()->createEc2ClientBridge()->runInstance($instancesDataProvider);
    }

    /**
     * @param \DataProvider\Ec2DescribeInstancesDataProvider $describeInstancesDataProvider
     *
     * @return \DataProvider\Ec2DescribeInstancesResultDataProvider
     */
    public function describeInstances(
        Ec2DescribeInstancesDataProvider $describeInstancesDataProvider
    ): Ec2DescribeInstancesResultDataProvider
    {
        return $this->getFactory()->createEc2ClientBridge()->describeInstances($describeInstancesDataProvider);
    }
}