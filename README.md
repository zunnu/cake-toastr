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

Load the component you will need to modify your `src/Controller/AppController.php` and load the toastr component in the `initialize()` function
```php
$this->Flash = $this->loadComponent('CakeToastr.Toastr', ['alias' => 'Flash']);
```

Sure, you could load the view helper anywhere you like—like in a random controller or buried deep inside a view. But if you actually want things to work smoothly, and, you know, avoid a headache, just load it in the layout where it belongs. Because who doesn't love clean, maintainable code, right?
```php
$this->loadHelper('CakeToastr.Toastr', ['progressBar' => true]);
```
See? Super simple. And if you're feeling extra fancy and want to tweak the options, go ahead and generate them from [this magical place](https://codeseven.github.io/toastr/demo.html).

## License

Licensed under [The MIT License][mit].

[cakephp]:http://cakephp.org
[composer]:http://getcomposer.org
[mit]:http://www.opensource.org/licenses/mit-license.php
