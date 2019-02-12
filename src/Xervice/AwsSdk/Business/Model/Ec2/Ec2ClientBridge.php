<?php
declare(strict_types=1);

namespace Xervice\AwsSdk\Business\Model\Ec2;


use Aws\Ec2\Ec2Client;
use DataProvider\Ec2DescribeInstancesDataProvider;
use DataProvider\Ec2DescribeInstancesResultDataProvider;
use DataProvider\Ec2InstancesDataProvider;
use DataProvider\Ec2InstancesResultDataProvider;
use DataProvider\Ec2KeyPairDataProvider;
use DataProvider\Ec2KeyPairResultDataProvider;
use DataProvider\Ec2SecurityGroupDataProvider;
use DataProvider\Ec2SecurityGroupResultDataProvider;
use Xervice\AwsSdk\Business\Model\Aws\ResultHydratorInterface;

class Ec2ClientBridge implements Ec2ClientBridgeInterface
{
    /**
     * @var \Aws\Ec2\Ec2Client
     */
    private $ec2Client;

    /**
     * @var \Xervice\AwsSdk\Business\Model\Aws\ResultHydratorInterface
     */
    private $resultHydrator;

    /**
     * Ec2ClientBridge constructor.
     *
     * @param \Aws\Ec2\Ec2Client $ec2Client
     * @param \Xervice\AwsSdk\Business\Model\Aws\ResultHydratorInterface $resultHydrator
     */
    public function __construct(
        Ec2Client $ec2Client,
        ResultHydratorInterface $resultHydrator
    ) {
        $this->ec2Client = $ec2Client;
        $this->resultHydrator = $resultHydrator;
    }


    /**
     * @param \DataProvider\Ec2KeyPairDataProvider $keyPairDataProvider
     *
     * @return \DataProvider\Ec2KeyPairResultDataProvider
     */
    public function createKeyPair(Ec2KeyPairDataProvider $keyPairDataProvider): Ec2KeyPairResultDataProvider
    {
        return $this->resultHydrator->hydrate(
            Ec2KeyPairResultDataProvider::class,
            $this->ec2Client->createKeyPair(
                [
                    'KeyName' => $keyPairDataProvider->getName(),
                    'DryRun' => $keyPairDataProvider->getDryRun()
                ]
            )
        );
    }

    /**
     * @param \DataProvider\Ec2KeyPairDataProvider $keyPairDataProvider
     */
    public function deleteKeyPair(Ec2KeyPairDataProvider $keyPairDataProvider): void
    {
        $this->ec2Client->deleteKeyPair(
            [
                'KeyName' => $keyPairDataProvider->getName(),
                'DryRun' => $keyPairDataProvider->getDryRun()
            ]
        );
    }

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     *
     * @return \DataProvider\Ec2SecurityGroupResultDataProvider
     */
    public function createSecurityGroup(
        Ec2SecurityGroupDataProvider $securityGroupDataProvider
    ): Ec2SecurityGroupResultDataProvider {
        return $this->resultHydrator->hydrate(
            Ec2SecurityGroupResultDataProvider::class,
            $this->ec2Client->createSecurityGroup(
                [
                    'Description' => $securityGroupDataProvider->getDescription(),
                    'DryRun' => $securityGroupDataProvider->getDryRun(),
                    'GroupName' => $securityGroupDataProvider->getName(),
                    'VpcId' => $securityGroupDataProvider->getVpcId()
                ]
            )
        );
    }

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     */
    public function deleteSecurityGroup(Ec2SecurityGroupDataProvider $securityGroupDataProvider): void
    {
        $this->ec2Client->deleteSecurityGroup(
            [
                'DryRun' => $securityGroupDataProvider->getDryRun(),
                'GroupName' => $securityGroupDataProvider->getName(),
            ]
        );
    }

    /**
     * @param \DataProvider\Ec2SecurityGroupDataProvider $securityGroupDataProvider
     */
    public function authorizeSecurityGroupIngress(Ec2SecurityGroupDataProvider $securityGroupDataProvider): void
    {
        $this->ec2Client->authorizeSecurityGroupIngress(
            [
                'DryRun' => $securityGroupDataProvider->getDryRun(),
                'GroupName' => $securityGroupDataProvider->getName(),
                'IpPermissions' => $securityGroupDataProvider->toArray()['IpPermissions']
            ]
        );
    }

    /**
     * @param \DataProvider\Ec2InstancesDataProvider $instancesDataProvider
     *
     * @return \DataProvider\Ec2InstancesResultDataProvider
     */
    public function runInstance(Ec2InstancesDataProvider $instancesDataProvider): Ec2InstancesResultDataProvider
    {
        return $this->resultHydrator->hydrate(
            Ec2InstancesResultDataProvider::class,
            $this->ec2Client->runInstances(
                $instancesDataProvider->toArray()
            )
        );
    }

    /**
     * @param \DataProvider\Ec2DescribeInstancesDataProvider $describeInstancesDataProvider
     *
     * @return \DataProvider\Ec2DescribeInstancesResultDataProvider
     */
    public function describeInstances(Ec2DescribeInstancesDataProvider $describeInstancesDataProvider): Ec2DescribeInstancesResultDataProvider
    {
        return $this->resultHydrator->hydrate(
            Ec2DescribeInstancesResultDataProvider::class,
            $this->ec2Client->describeInstances(
                $describeInstancesDataProvider->toArray()
            )
        );
    }
}