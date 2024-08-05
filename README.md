# cake-toastr

This package was created primarily for personal use. It allows you to easily integrate Toastr messages into your CakePHP application

## Installing Using [Composer][composer]

`cd` to the root of your app folder (where the `composer.json` file is) and run the following command:

```
composer require zunnu/cake-toastr
```
Then load the plugin by using CakePHP's console:

```
./bin/cake plugin load CakeToastr
```

Note the flash component does not need to be loaded but you need to have flash render in your layout.
```php
<?= $this->Flash->render() ?>
```

## Usage

### Loading the Component
Load the component you will need to modify your `src/Controller/AppController.php` and load the toastr component in the `initialize()` function
```php
$this->Flash = $this->loadComponent('CakeToastr.Toastr', ['alias' => 'Flash']);
```

### Loading the Helper
Sure, you could load the view helper anywhere you like—like in a random controller or buried deep inside a view. But if you actually want things to work smoothly, and, you know, avoid a headache, just load it in the layout where it belongs. Because who doesn't love clean, maintainable code, right?
```php
$this->loadHelper('CakeToastr.Toastr', ['progressBar' => true]);
```
See? Super simple. And if you're feeling extra fancy and want to tweak the options, go ahead and generate them from [this magical place](https://codeseven.github.io/toastr/demo.html).

### Using Flash Messages

From a controller, you can call it like a normal flash message:

```php
$this->Flash->warning('This is a custom success message');
```

This simple setup allows you to start using Toastr notifications with default settings. If you'd like to customize the behavior, you can pass additional options.

### Customizing Toastr Notifications

#### Using Callbacks

You can customize the behavior of Toastr notifications using JavaScript callbacks such as `onShown`, `onShow`, `onHide`, and `onHidden`. For example, if you want to execute custom JavaScript when a toast is fully displayed, you can use the `onShown` callback.

Here's how to use the `onShown` callback:

```php
$this->loadHelper('CakeToastr.Toastr', [
    'positionClass' => 'toast-bottom-center',
    'callbacks' => [
        'onShown' => 'function() {
            console.log("Toastr notification displayed");
        }'
    ]
]);
```

This setup logs a message to the console when the toast is shown.

#### Injecting Custom CSS

You can also inject custom CSS to style your Toastr notifications. For instance, if you want to adjust the minimum width and position of your toast messages, you can pass custom CSS as follows:

```php
$this->loadHelper('CakeToastr.Toastr', [
    'positionClass' => 'toast-bottom-center',
    'customCss' => '
        .toast-bottom-center {
            bottom: 8%;
        }
        .toast-bottom-center .toast {
            min-width: 600px;
        }
    ',
    'callbacks' => [
        'onShown' => 'function() {
            console.log("Custom styles applied and Toastr notification shown");
        }'
    ]
]);
```

This will ensure that the toast messages have a minimum width of 600px and are positioned 8% from the bottom of the screen.

### Putting It All Together

Combine callbacks and custom CSS for a fully customized experience:

```php
$this->loadHelper('CakeToastr.Toastr', [
    'positionClass' => 'toast-bottom-center',
    'customCss' => '
        .toast-bottom-center {
            bottom: 8%;
        }
        .toast-bottom-center .toast {
            min-width: 600px;
        }
    ',
    'callbacks' => [
        'onShown' => 'function() {
            $(".toast-bottom-center .toast").css("background-color", "#333");
            console.log("Custom background color applied and Toastr notification shown");
        }'
    ]
]);
```

In this example, the toast background color is dynamically changed to a custom color when the toast is shown.

## License

Licensed under [The MIT License][mit].

[cakephp]:http://cakephp.org
[composer]:http://getcomposer.org
[mit]:http://www.opensource.org/licenses/mit-license.php
