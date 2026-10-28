<?php

declare(strict_types=1);

namespace Merxkit\UblTr\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
final class SmokeTest extends TestCase
{
    public function testRequiredExtensionsAreLoaded(): void
    {
        foreach (['dom', 'libxml', 'xsl'] as $extension) {
            self::assertTrue(\extension_loaded($extension), "ext-{$extension} is not loaded");
        }
    }
}
