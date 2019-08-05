# Nova File Manager Tool
Adds the ability to manage files inside Laravel Nova.
 
Based on [unisharp/laravel-filemanager](https://github.com/UniSharp/laravel-filemanager) package.

## Installation
Install ```unisharp/laravel-filemanager```: [https://unisharp.github.io/laravel-filemanager/installation](https://unisharp.github.io/laravel-filemanager/installation)

``` php
composer require soluzione-software/nova-file-manager-tool
```

## Usage
See Nova [documentation](https://nova.laravel.com/docs/2.0/customization/tools.html#registering-tools).
``` php
use SoluzioneSoftware\Nova\Tools\FileManager\FileManager;
```
...

``` php
public function tools()
{
    return [
        new FileManager,
    ];
}
```
