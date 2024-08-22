# crud_module
## Description
This module adds a Product model, controller and policy with associated views for viewing, adding, and updating.
## Setup
### Migrations
Run the following commands for the database migrations necessary for this module
```
php artisan vendor:publish --tag=my-package-migrations
php artisan migrate
```
### User model
Update the user model like this so that you can do CRUD operations:
1. Add this to the list of imports:
```
use Illuminate\Database\Eloquent\Relations\HasMany;

```
2. Add this function:
```
public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
```
