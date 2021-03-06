<?php

namespace eLife\Search\Api\Response\Common;

use JMS\Serializer\Annotation\Since;
use JMS\Serializer\Annotation\Type;

trait Subjects
{
    /**
     * @Type("array<eLife\Search\Api\Response\Common\SubjectResponse>")
     * @Since(version="1")
     */
    public $subjects;
}
