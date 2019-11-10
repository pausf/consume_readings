<?php

namespace Pau\Reports\Application\Report\Query\FindSuspicious;

use Pau\Shared\Domain\Bus\Query\Query;

class FindSuspiciousQuery implements Query
{
    /** @var string */
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }


    public function getFile(): string
    {
        return $this->file;
    }

}