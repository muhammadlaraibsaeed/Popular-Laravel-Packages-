# Empower Your Laravel Application with Spatie Role-Based Permissions!

```
    composer require spatie/laravel-permission
```
## Configuration

```
  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
```
- The main point is that executing the command will publish the config/permission.php file, which includes configuration options for the Spatie Laravel Permission package.

```
    php artisan migrate
```

## User Roles and Permissions System

This project implements a user roles and permissions system, enabling flexible access control in applications. It consists of three main components:

### Roles

- **Table Name:** `roles`
- **Description:** Stores different user roles with unique IDs and names.
- **Fields:**
  - `id`: Unique identifier for the role.
  - `name`: Name of the role (e.g., Admin, Editor).

### Permissions

- **Table Name:** `permissions`
- **Description:** Contains specific actions that can be granted to roles, each with unique IDs and names.
- **Fields:**
  - `id`: Unique identifier for the permission.
  - `name`: Name of the permission (e.g., create, edit, delete).

### Model Has Permissions

- **Table Name:** `model_has_permissions`
- **Description:** Links roles to their associated permissions, enabling many-to-many relationships for access control.
- **Fields:**
  - `model_id`: The ID of the role.
  - `permission_id`: The ID of the permission.

## Installation

1. Clone the repository.
2. Run database migrations to create the necessary tables.
3. Seed the database with sample roles and permissions (if applicable).

## Usage

- Assign permissions to roles as needed.
- Implement access control checks in your application based on user roles and permissions.

## Role & Permission models provided by the Spatie Laravel Permission package.

```
  use Spatie\Permission\Models\Role;
  $role = Role::create(['name' => 'admin']);
```

```
  use Spatie\Permission\Models\Permission;
  $permission = Permission::create(['name' => 'edit articles']);
```


## Assigning Roles and Permissions to User Model

```
  $user = User::firstOrCreate(
      ['email' => 'user@example.com'], // Attributes to check
      ['name' => 'John Doe'] // Attributes to set if creating
  );

  $user->assignRole('admin');

```

```
  $role = Role::create(['name' => 'admin']);
  $role->givePermissionTo('edit articles');
```


### General Code

```
    // Define permissions
        $permissions = [
            'manage users',
            'manage vendors',
            'product management',
            'order management',
            'view reports',
            'settings management',
            'browse products',
            'place orders',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $roles = [
            'admin' => $permissions, // Admin has all permissions
            'vendor' => [
                'product management',
                'order management',
            ],
            'customer' => [
                'browse products',
                'place orders',
            ],
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName]);
            $role->givePermissionTo($rolePermissions);
        }
```


