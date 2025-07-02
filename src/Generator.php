<?php

declare(strict_types=1);

namespace LeadGenerator;

use LeadGenerator\Enums\CategoryEnum;

use function Amp\Future\awaitAll;

/**
 * Class Generator
 * @package LeadGenerator
 */
class Generator
{
    /**
     * @param int $count
     * @param callable $leadHandler
     */
    public function generateLeads(int $count, callable $leadHandler): void
    {
        $awaitingFutures = [];
        for ($i = 1; $i <= $count; $i++) {
            $lead = new Lead();
            $lead->id = $i;
            $lead->categoryName = $this->getRandCategory();
            $awaitingFutures[] = $leadHandler($lead);
        }
        awaitAll($awaitingFutures);
    }

    /**
     * @return string
     */
    private function getRandCategory(): string
    {
        return CategoryEnum::values()[array_rand(CategoryEnum::values())];
    }
}
