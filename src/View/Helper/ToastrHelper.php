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

    protected array $customCallbacks = [];
    protected string $customCss = '';

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

        $this->_defaultConfig = array_merge($this->_defaultConfig, $config);

        if (!empty($config['callbacks'])) {
            $this->customCallbacks = $config['callbacks'];
        }

        if (!empty($config['customCss'])) {
            $this->customCss = $config['customCss'];
        }

        $this->finalize();
    }

    /**
     * Set custom CSS to be applied in the view.
     *
     * @param string $css Custom CSS string.
     * @return $this
     */
    public function setCustomCss(string $css): self
    {
        $this->customCss = $css;
        return $this;
    }

    /**
     * Set the onShown callback dynamically after initialization.
     *
     * @param string $function JavaScript function for the onShown event.
     * @return $this
     */
    public function onShown(string $function): self
    {
        $this->customCallbacks['onShown'] = $function;
        return $this;
    }

    /**
     * Finalize and output the toastr configuration.
     *
     * @return void
     */
    public function finalize(): void
    {
        $config = $this->_defaultConfig;

        // Add custom callbacks if they are defined
        foreach ($this->customCallbacks as $event => $function) {
            $config[$event] = 'JS_FUNCTION';  // Placeholder for the JavaScript function
        }

        $jsonConfig = json_encode($config);

        // Replace the placeholder with the actual JavaScript functions
        foreach ($this->customCallbacks as $event => $function) {
            $jsonConfig = str_replace('"JS_FUNCTION"', $function, $jsonConfig);
        }

        $script = "toastr.options = $jsonConfig;";
        $this->Html->scriptBlock($script, ['block' => true]);

        // Inject the custom CSS into the view
        if (!empty($this->customCss)) {
            echo "<style>{$this->customCss}</style>";
        }
    }
}
