<?php
declare(strict_types=1);

namespace CakeToastr\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Toastr helper
 */
class ToastrHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [
        'closeButton' => true,
        'debug' => false,
        'newestOnTop' => false,
        'progressBar' => true,
        'positionClass' => 'toast-bottom-center',
        'preventDuplicates' => false,
        'showDuration' => '300',
        'hideDuration' => '1000',
        'timeOut' => '5000',
        'extendedTimeOut' => '1000',
        'showEasing' => 'swing',
        'hideEasing' => 'linear',
        'showMethod' => 'fadeIn',
        'hideMethod' => 'fadeOut',
    ];

    public array $helpers = ['Html'];


    /**
     * Initializes the ToastrHelper by loading the required CSS and JavaScript assets.
     * 
     * This method loads the necessary CSS and JS files for Toastr notifications. 
     * The assets are queued in the appropriate blocks (`css` for styles and `script` for scripts) 
     * to ensure they are included in the correct order when the layout is rendered.
     *
     * @param array $config Configuration settings for the helper.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->Html->css('CakeToastr.toastr.min.css', ['block' => true]);
        $this->Html->script('CakeToastr.jquery.min.js', ['block' => true]);
        $this->Html->script('CakeToastr.toastr.min.js', ['block' => true]);

        // Merge default config with any custom config
        $config = array_merge($this->_defaultConfig, $config);
        $jsonConfig = json_encode($config);
        $script = "toastr.options = $jsonConfig;";

        // Add this script to the script block
        $this->Html->scriptBlock($script, ['block' => true]);
    }
}
