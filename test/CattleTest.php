<?php
declare(strict_types=1);
require 'Cattle.php';

use PHPUnit\Framework\TestCase;

/**
 * @covers Cattle
 */

final class CattleTest extends TestCase
{
    private $cattle;

    protected function setUp()
    {
        $this->cattle = new Cattle();
    }

    protected function tearDown()
    {
        $this->cattle = NULL;
    }

    public function testGender()
    {
        $result = $this->cattle->gender();
        $this->assertEquals('male', $result);
    }
}
?>
