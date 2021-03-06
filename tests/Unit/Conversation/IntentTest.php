<?php

declare(strict_types=1);

namespace FondBot\Tests\Unit\Conversation;

use FondBot\Tests\TestCase;
use FondBot\Conversation\Intent;
use FondBot\Events\MessageReceived;

class IntentTest extends TestCase
{
    public function testHandle()
    {
        /** @var Intent $intent */
        $intent = $this->mock(Intent::class)->shouldIgnoreMissing();

        $intent->handle($this->mock(MessageReceived::class));
    }
}
