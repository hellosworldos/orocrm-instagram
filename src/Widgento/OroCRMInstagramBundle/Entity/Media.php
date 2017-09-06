<?php

namespace Widgento\OroCRMInstagramBundle\Entity;

use Widgento\OroCRMInstagramBundle\Entity\Media\CarouselMedia;
use Widgento\OroCRMInstagramBundle\Entity\Media\Videos;

class Media
{
    const TYPE_IMAGE = 'image';
    const TYPE_VIDEO = 'video';

    private $createdTime;
    private $type;
    private $usersInPhoto;
    private $filter;
    private $tags;
    private $commentsCount;
    private $caption;
    private $likesCount;
    private $link;

    /**
     * @var CarouselMedia[]
     */
    private $carouselMedia;

    /**
     * @var Videos
     */
    private $videos;

    /**
     * @var User
     */
    private $user;

    /**
     * @var MediaFile
     */
    private $imageLowResolution;

    /**
     * @var MediaFile
     */
    private $imageThumbnail;

    /**
     * @var MediaFile
     */
    private $imageStandardResolution;

    private $id;
    private $location;
}