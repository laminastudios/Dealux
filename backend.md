# Dealux

This project uses [Laravel](https://laravel.com/) and [Vue.js](https://vuejs.org/). If you are getting stuck, read their documentation.

## Backend Contribution Guide

This Contribution Guide is separated into three sections: `Model`, `Controller`, and `Route` although they are connected with each other.

### Model

The Model is the application's way of processing the tables in a database. If the `migration` is the creation and insertion of tables into the database, the `model` is the processing of these tables in order to integrate with the rest of the application. This is also where you create the relationships between tables.

To start, create a model with `php artisan make:model <model_name>`.

Example: `php artisan make:model SampleModel` - This creates a model file in `/app/Models/` directory.


---
### Controller

The Controller is the main process of the application. It handles the literally anything regarding APIs.

To start, create a controller with `php artisan make:controller <controller_name>`.

Example: `php artisan make:controller Api/SampleController` - This creates a controller file in `/app/Http/Controllers/Api/` directory.

The controller takes in the model that you have created and works upon it. This is where you can create methods that create, fetch, and update data from the database using the model.

An example of a Controller is this:
```php
use App\Models\SampleModel\SampleModel;

class SampleController extends Controller
{
    protected function show()
    {
        // Return Model Data
    }
}
```

---
### Route

The last section is the `Route`. This is where you define routes for API endpoints. There is only one file needed to be edited here, and it is `/routes/api.php`. The API Routes Guide is also included there.

```php
// API Routes Guide
// Laravel automatically prefixes `api` on the routes, don't include it

// Three Methods: GET, POST, PUT

// GET:
// /api/get/<component>
// /api/get/user - returns all users
// /api/get/user/{id} - returns user with id = {id}


// POST:
// /api/post/<component>
// /api/post/user - add new user (form response is in req.body)


// PUT:
// /api/edit/<component>
// /api/edit/user/{id} - edit user with id = {id} (form response is in req.body)
```

An example of a simple route is:

```php
// /api/get/test
Route::get('/get/test', function () {
    return response()->json([
        'body' => "Hello World!",
        'message' => "Success",
        'code' => 200
    ]);
});
```

An example of a route connected to a controller:

```php
use App\Http\Controllers\SampleController;

// /api/get/sample_model
Route::get('/get/sample_model', [SampleController::class, 'test']);
```

Note that you also need to include the `message` and the `status code` in order to follow optimal coding standards. In the second example, you can define them in its controller file.

#### Viewing All API Routes
You can view all the API routes in the application by using the following custom command:
This command will list all the routes related to API endpoints, making it easier to verify that your routes are correctly set up.
```terminal
php artisan route:list-data-routes
```
---
### Questions/Problems

Should there be any problems or questions, notify us through Discord.
