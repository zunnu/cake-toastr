<?php
declare(strict_types=1);

namespace CakeToastr\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use CakeToastr\View\Helper\ToastrHelper;

/**
 * CakeToastr\View\Helper\ToastrHelper Test Case
 */
class ToastrHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \CakeToastr\View\Helper\ToastrHelper
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
        $view = new View();
        $this->Toastr = new ToastrHelper($view);
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
