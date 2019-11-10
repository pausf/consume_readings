<?php

namespace Pau\Reports\Application\Report\Query\FindSuspicious;

use Pau\Reports\Domain\Model\Report\ReportParser;
use Pau\Shared\Application\QueryBusHandlerInterface;


class FindSuspicious implements QueryBusHandlerInterface
{
    /** @var ReportParser */
    private $reporParser;

    public function __construct(ReportParser $reportParser)
    {
        $this->reporParser = $reportParser;
    }

    public function __invoke(FindSuspiciousQuery $query)
    {
        return $this->reporParser->parse($query->getFile());

    }

}