<?php
declare(strict_types=1);

namespace CakeToastr\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use CakeToastr\Controller\Component\ToastrComponent;

/**
 * CakeToastr\Controller\Component\ToastrComponent Test Case
 */
class ToastrComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakeToastr\Controller\Component\ToastrComponent
     */
    protected $Toastr;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Toastr = new ToastrComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Toastr);

        parent::tearDown();
    }
}
