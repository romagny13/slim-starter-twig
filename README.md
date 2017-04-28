# Slim 3 Starter project with Twig

* [Slim 3 documentation](https://www.slimframework.com/docs/)
* [Slim 3 Skeleton with php view](https://github.com/slimphp/Slim-Skeleton)

## Install dependencies
```
composer install
```
## Serve
```
composer start
```
or
```
php -S localhost:8080 -t public
```
go http://localhost:8080/

## Add a route (src/routes.php)

```php
// example with a controller
$app->get('/posts', 'PostController:index');
```

Note: name this route for links
```php
$app->get('/posts', 'PostController:index')->setName('posts');
```
Example link (Twig)
```html
<a href="{{ path_for('posts') }}">Blog</a>
```

## Add a Controller

Create the controller. Example
```php
<?php
namespace App\Controllers;

use App\Repository\PostRepository;

class PostController extends Controller
{
    public function index($request,$response){
        return $this->view->render($response,'posts.twig',[
            'title' => 'My title'
        ]);
    }
}
```

Add the controller to the container for dependy injection (src/dependencies.php)

```php
$container['PostController'] = function ($container){
    return new \App\Controllers\PostController($container);
};
```

