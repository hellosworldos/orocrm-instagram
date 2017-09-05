<?php

namespace Widgento\OroCRMInstagramBundle\Provider;

use Oro\Bundle\IntegrationBundle\Provider\ChannelInterface;
use Oro\Bundle\IntegrationBundle\Provider\IconAwareIntegrationInterface;

class ChannelType implements ChannelInterface, IconAwareIntegrationInterface
{
    const TYPE = 'widgento_instagram';

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return 'widgento.orocrm_instagram.channel_type.label';
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon()
    {
        return 'bundles/widgentoorocrminstagram/img/instagram.com.ico';
    }
}
