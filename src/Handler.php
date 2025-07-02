<?php

declare(strict_types=1);

namespace LeadGenerator;

use Amp\Future;

use LeadGenerator\Enums\CategoryEnum;

use function Amp\async;
use function Amp\delay;

/**
 * Class Handler
 * @package LeadGenerator
 */
class Handler
{
    const LOG_FILE = 'log.txt';

    public function __invoke(Lead $lead): Future
    {
        return async(function () use ($lead) {
            if ($this->isLeadValid($lead)) {
                $this->handleLead($lead);
                $this->writeLog($lead);
            }
        });
    }

    private function isLeadValid(Lead $lead): bool
    {
        return in_array($lead->categoryName, CategoryEnum::values());
    }

    private function handleLead(Lead $lead): void
    {
        delay(2);
    }

    private function writeLog(Lead $lead): void
    {
        $message = sprintf(
            '%s | %s | %s',
            $lead->id,
            $lead->categoryName,
            date('Y-m-d H:i:s')
        );
        file_put_contents(self::LOG_FILE, $message.PHP_EOL, FILE_APPEND);
    }
}
