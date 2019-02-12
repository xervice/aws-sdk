<?php
declare(strict_types=1);

namespace Xervice\AwsSdk;


use Xervice\Core\Business\Model\Config\AbstractConfig;

class AwsSdkConfig extends AbstractConfig
{
    public const CLIENT_CONFIG = 'aws.sdk.client.config';

    /**
     * @return array
     */
    public function getClientConfig(): array
    {
        return $this->get(self::CLIENT_CONFIG, []);
    }
}