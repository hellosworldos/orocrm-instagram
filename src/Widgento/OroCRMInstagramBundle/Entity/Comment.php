<?php

namespace Widgento\OroCRMInstagramBundle\Entity;

class Comment
{
    private $createdTime;

    private $text;

    /**
     * @var User
     */
    private $from;

    private $id;
}