<?php

namespace Widgento\OroCRMInstagramBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\ConfigField;

use Oro\Bundle\IntegrationBundle\Entity\Channel as Integration;
use Oro\Bundle\ContactBundle\Entity\Contact;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="widgento_instagram_user",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="widgento_instagram_user_oid_cid_unq", columns={"instagram_id", "channel_id"})
 *     }
 * )
 * @ORM\HasLifecycleCallbacks()
 * @Config(
 *  defaultValues={
 *      "entity"={
 *          "icon"="fa-list-alt"
 *      }
 *  }
 * )
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(name="instagram_id", type="bigint")
     */
    protected $instagramId;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="full_name", type="string", length=255, nullable=true)
     */
    protected $fullName;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_picture", type="string", length=255, nullable=true)
     */
    protected $profilePicture;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="string", length=255, nullable=true)
     */
    protected $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    protected $website;

    /**
     * @var int
     *
     * @ORM\Column(name="count_media", type="integer", length=255, default=0)
     */
    protected $countMedia = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="count_follows", type="integer", length=255, default=0)
     */
    protected $countFollows = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="count_followed_by", type="integer", length=255, default=0)
     */
    protected $countFollowedBy = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @ConfigField(
     *      defaultValues={
     *          "entity"={
     *              "label"="oro.ui.created_at"
     *          }
     *      }
     * )
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @ConfigField(
     *      defaultValues={
     *          "entity"={
     *              "label"="oro.ui.updated_at"
     *          }
     *      }
     * )
     */
    protected $updatedAt;

    /**
     * @var Contact
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\ContactBundle\Entity\Contact", cascade={"persist"})
     * @ORM\JoinColumn(name="related_contact_id", referencedColumnName="id", onDelete="SET NULL")
     */
    protected $relatedContact;

    /**
     * @var Integration
     *
     * @ORM\ManyToOne(targetEntity="Oro\Bundle\IntegrationBundle\Entity\Channel")
     * @ORM\JoinColumn(name="channel_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $channel;

    /**
     * @var bool
     */
    private $updatedAtLocked = false;

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = $this->createdAt ? $this->createdAt : new \DateTime('now', new \DateTimeZone('UTC'));
        $this->updatedAt = $this->updatedAt? $this->updatedAt : new \DateTime('now', new \DateTimeZone('UTC'));
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        if (!$this->updatedAtLocked) {
            $this->updatedAt = new \DateTime('now', new \DateTimeZone('UTC'));
        }
    }
}