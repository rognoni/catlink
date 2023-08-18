<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Services\LinkService;

/*
    php artisan make:test LinkServiceTest --unit
*/
class LinkServiceTest extends TestCase
{
    /*
        ./vendor/bin/phpunit --filter test_normalize_category tests/Unit/LinkServiceTest.php
        php artisan test --filter test_normalize_category tests/Unit/LinkServiceTest.php
    */
    public function test_normalize_category(): void
    {
        $normalized = LinkService::normalize_category(' / category    name    / sub    category/ sub2 / sub 3/   ');

        $this->assertEquals('/category name/sub category/sub2/sub 3', $normalized );
    }
}
