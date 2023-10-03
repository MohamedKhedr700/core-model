# Core Model Package

This package is responsible for handling all models in the system.

## Installation

``` bash
composer require raid/core-model
```

## Configuration

``` bash
php artisan core:publish-model
```


## Usage

``` php
class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $post = new Post();

        // instead of this pattern.
        // $post->title = $request->get('title');
        // $title = $post->title;
        
        // we can use this pattern.
        $post->fillAttribute('title', $request->get('title'));
        
        $title = $post->attribute('title', '');
        
        // this didn't save the model, but we can deal with that later.
        return response()->json([
            'post' => $post,
        ]);
    }
}
```

# How to work this

Let's start with our model class ex:`Post` model.

``` php
<?php

namespace App\Models;

use Raid\Core\Model\Models\Model;

class Post extends Model
{
}
```

The `Model` class `MUST` extends the package `Model` class.


Now, let's create our model class `Post`.

you can use this command to create the gate class.

``` bash
php artisan core:make-model Post
```
Here is the model class.

``` php
<?php

namespace App\Models;

use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Models\Model;

class Post extends Model implements ModelInterface
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [];
}
```

The model class must implement `ModelInterface` interface.

The model class must extend `Model` class.


Great, now we can work with our new model class.

``` php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $post = new Post();

        // work with a single attribute and can pass a default value.
        $post->fillAttribute('title', $request->get('title'));

        // work with a single attribute and can pass a default value.
        $post->forceFillAttribute('title', $request->get('title'));

        // work with multiple attribute.
        $post->fillAttributes([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        // work with multiple attribute.
        $post->forceFillAttributes([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        // get single attribute value and can pass a default value.
        $attribute = $post->attribute('title', '');

        // get multiple attribute values
        $attributes = $post->attributes('title', 'content');

        // determine if the model has an attribute.
        $hasAttribute = $post->hasAttribute('title');
        
        
        return response()->json([
            'resource' => $post,
        ]);
    }
}
```

The `fillAttribute` method will fill the attribute value, but it will not save it to the database.

The `forceFillAttribute` method will fill the attribute value, and it will save it to the database.

The `fillAttributes` method will fill the attributes values, but it will not save it to the database.

The `forceFillAttributes` method will fill the attributes values, and it will save it to the database.

The `attribute` method will return the attribute value.




And that's it.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- **[Mohamed Khedr](https://github.com/MohamedKhedr700)**

## Security

If you discover any security-related issues, please email
instead of using the issue tracker.

## About Raid

Raid is a PHP framework created by **[Mohamed Khedr](https://github.com/MohamedKhedr700)**

and it is maintained by **[Mohamed Khedr](https://github.com/MohamedKhedr700)**.

## Support Raid

Raid is an MIT-licensed open-source project. It's an independent project with its ongoing development made possible.

