<?php
declare(strict_types=1);

namespace CakeToastr\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Component\FlashComponent;

/**
 * Toastr component
 */
class ToastrComponent extends FlashComponent
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    /**
     * Override the success method to use a custom template.
     *
     * @param string $message The message to display.
     * @param array $options Array of options for customizing the flash message.
     * @return void
     */
    public function success(string $message, array $options = []): void
    {
        if (empty($options['plugin'])) {
            $options += [
                'plugin' => 'CakeToastr', 
            ];
        }

        parent::success($message, $options);
    }

    // You can do the same for error, warning, and info
    public function error(string $message, array $options = []): void
    {
        if (empty($options['plugin'])) {
            $options += [
                'plugin' => 'CakeToastr', 
            ];
        }

        parent::error($message, $options);
    }

    public function warning(string $message, array $options = []): void
    {
        if (empty($options['plugin'])) {
            $options += [
                'plugin' => 'CakeToastr', 
            ];
        }

        parent::warning($message, $options);
    }

    public function info(string $message, array $options = []): void
    {
        if (empty($options['plugin'])) {
            $options += [
                'plugin' => 'CakeToastr', 
            ];
        }

        parent::info($message, $options);
    }
}
