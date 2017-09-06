<?php

namespace Widgento\OroCRMInstagramBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\ParameterBag;

use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\IntegrationBundle\Entity\Transport;

/**
 * Class InstagramRestTransport
 *
 * @ORM\Entity
 * @Config()
 */
class InstagramRestTransport extends Transport
{
    /**
     * @var string
     *
     * @ORM\Column(name="widgento_instagram_client_id", type="string", length=255, nullable=false)
     */
    protected $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="widgento_instagram_client_secret", type="string", length=255, nullable=false)
     */
    protected $clientSecret;

    /**
     * @var string
     *
     * @ORM\Column(name="widgento_instagram_access_token", type="string", length=255, nullable=false)
     */
    protected $accessToken;

    /**
     * @var ParameterBag
     */
    protected $settings;

    /**
     * {@inheritdoc}
     */
    public function getSettingsBag()
    {
        if (is_null($this->settings)) {
            $this->settings = new ParameterBag([
                'clientId'     => $this->getClientId(),
                'clientSecret' => $this->getUrl(),
                'accessToken'  => $this->getToken(),
            ]);
        }

        return $this->settings;
    }
}