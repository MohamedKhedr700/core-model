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
    public function __invoke(Post $post)
    {
        Post::gates('show', $post);

        // or using the authorize method.
        Post::gates()->authorize('show', $post);
        
        return response()->json([
            'post' => $post,
        ]);
    }
}
```

# How to work this

Let's start with our gateable class ex:`Post` model.

``` php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Raid\Core\Gate\Traits\Gate\Gateable;

class Post extends Model
{
    use Gateable;
}
```

The gateable class must use `Gateable` trait.

To define the gates, we can use two ways.

But remember if `getGates` method is defined, the `config/gate.php` gates will be ignored.

1.Define `getGates` method.

``` php
<?php

namespace App\Models;

use App\Http\Gates\PostGate;
use Illuminate\Database\Eloquent\Model;
use Raid\Core\Gate\Traits\Gate\Gateable;

class User extends Model
{
    use Gateable;
    
    /**
     * Get gateable gates.
     */
    public static function getGates(): array
    {
        return [
            // here we define our gate classes.
            PostGate::class,
        ];
    }
}
```

2. Define `config/gate.php` events.

``` php
'gates' => [
    // here we define our gateable class.
    Post::class => [
        // here we define our gate classes.
        PostGate::class,
    ],
], 
```

Now, let's create our gate class `PostGate`.

you can use this command to create the gate class.

``` bash
php artisan core:make-gate PostGate
```
Here is the gate class.

``` php
<?php

namespace App\Http\Gates;

use Raid\Core\Gate\Gates\Contracts\GateInterface;
use Raid\Core\Gate\Gates\Gate;

class PostGate extends Gate implements GateInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONS = [];
}
```

The gate class must implement `GateInterface` interface.

The gate class must extend `Gate` class.

The gate class must define `ACTIONS` constant, which is the gate methods that will be defined with the `Illuminate\Support\Facades\Gate` class.

Let's define our gate first method.

``` php
<?php

namespace App\Http\Gates;

use App\Models\Post;
use App\Models\User;
use Raid\Core\Gate\Gates\Contracts\GateInterface;
use Raid\Core\Gate\Gates\Gate;

class PostGate extends Gate implements GateInterface
{
    /**
     * {@inheritdoc}
     */
    public const ACTIONS = [
        'show',
    ];

    /**
     * Determine if the user can show the post.
     */
    public function show(User $user, Post $post): bool
    {
        return $post->isPublic() || $user->isAdmin() || $user->isAuthor($post);
    }
}
```

Great, now we can use the `show` method/action in the `PostController`.

``` php
<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Invoke the controller method.
     */
    public function __invoke(Post $post)
    {
        Post::gates()->authorize('show', $post);

        return response()->json([
            'post' => $post,
        ]);
    }
}
```

The `gates` method is a static method that will be called from the `gateable` trait.

The `authorize` method is a method that will lead to call `Illuminate\Support\Facades\Gate` class authorize method.

The `authorize` method will throw `Illuminate\Auth\Access\AuthorizationException` exception if the gate method returns `false`.

The `authorize` method will return based on defined actions in the related gate class.

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

