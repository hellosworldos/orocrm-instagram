<?php

namespace Widgento\OroCRMInstagramBundle\Provider\Transport;

use Oro\Bundle\IntegrationBundle\Provider\Rest\Exception\RestException;
use Oro\Bundle\IntegrationBundle\Provider\TransportInterface;
use Widgento\OroCRMInstagramBundle\Entity\Comment;
use Widgento\OroCRMInstagramBundle\Entity\Media;

interface InstagramTransportInterface extends TransportInterface
{
    /**
     * @return \Iterator
     * @throws RestException
     */
    public function getSelfRecentMedia();

    /**
     * @param $userId
     * @return \Iterator
     * @throws RestException
     */
    public function getUserRelationship($userId);

    /**
     * @param $mediaId
     * @return Media
     */
    public function getMedia($mediaId);

    /**
     * @param string $mediaId
     * @return \Iterator
     * @throws RestException
     */
    public function getMediaComments($mediaId);

    /**
     * @param string $mediaId
     * @param string $text
     * @return Comment
     * @throws RestException
     */
    public function addMediaComment($mediaId, $text);

    /**
     * @return \Iterator
     * @throws RestException
     */
    public function getMediaLikes($mediaId);
}