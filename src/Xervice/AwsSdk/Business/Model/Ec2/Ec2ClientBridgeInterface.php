<?php
declare(strict_types=1);

namespace Xervice\AwsSdk\Business\Model\Ec2;

use DataProvider\Ec2DescribeInstancesDataProvider;
use DataProvider\Ec2DescribeInstancesResultDataProvider;
use DataProvider\Ec2InstancesDataProvider;
use DataProvider\Ec2InstancesResultDataProvider;
use DataProvider\Ec2KeyPairDataProvider;
use DataProvider\Ec2KeyPairResultDataProvider;
use DataProvider\Ec2SecurityGroupDataProvider;
use DataProvider\Ec2SecurityGroupResultDataProvider;

interface Ec2ClientBridgeInterface
{
    /**
     * @param \DataProvider\Ec2KeyPairDataProvider $keyPairDataProvider
     *
     * @return \DataProvider\Ec2KeyPairResultDataProvider
     */
    public function createKeyPair(Ec2KeyPairDataProvider $keyPairDataProvider): Ec2KeyPairResultDataProvider;

    /**
     * @param \DataProvider\Ec2KeyPairDataProvider $keyPairDataProvider
     */
    public function deleteKeyPair(Ec2KeyPairDataProvider $keyPairDataProvider): void;

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     *
     * @return \DataProvider\Ec2SecurityGroupResultDataProvider
     */
    public function createSecurityGroup(Ec2SecurityGroupDataProvider $securityGroupDataProvider
    ): Ec2SecurityGroupResultDataProvider;

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     */
    public function authorizeSecurityGroupIngress(Ec2SecurityGroupDataProvider $securityGroupDataProvider): void;

    /**
     * @param \DataProvider\Ec2InstancesDataProvider $instancesDataProvider
     *
     * @return \DataProvider\Ec2InstancesResultDataProvider
     */
    public function runInstance(Ec2InstancesDataProvider $instancesDataProvider): Ec2InstancesResultDataProvider;

    /**
     * @param \DataProvider\Ec2DescribeInstancesDataProvider $describeInstancesDataProvider
     *
     * @return \DataProvider\Ec2DescribeInstancesResultDataProvider
     */
    public function describeInstances(Ec2DescribeInstancesDataProvider $describeInstancesDataProvider
    ): Ec2DescribeInstancesResultDataProvider;

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     */
    public function deleteSecurityGroup(Ec2SecurityGroupDataProvider $securityGroupDataProvider): void;
}