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


  

                $permission = Permission::create(['name' => 'edit articles']);

                $roleCreate = Role::create(['name' => $roleName]);
                $roleCreate->givePermissionTo($permissions);

                // Create user and Assign role
                $userCreate = User::create($user);
                $userCreate->assignRole($roleName);
            

```
  $user = User::firstOrCreate(
      ['email' => 'user@example.com'], // Attributes to check
      ['name' => 'John Doe'] // Attributes to set if creating
  );

  $user->assignRole('admin');

```



## Assigning Roles and Permissions to User Model



```
  $role = Role::create(['name' => 'admin']);
  $role->givePermissionTo('edit articles');
```


### General Code & RoleSeeder PermissionSeeder

```
  PermissionSeeder.php
```

```
    $permissions = [
            ['name' => 'customer_view', 'guard_name' => 'web'],
            ['name' => 'customer_edit', 'guard_name' => 'web'],
            ['name' => 'customer_delete', 'guard_name' => 'web'],
            ['name' => 'customer_create', 'guard_name' => 'web'],
            ['name' => 'vendor_view', 'guard_name' => 'web'],
            ['name' => 'vendor_edit', 'guard_name' => 'web'],
            ['name' => 'vendor_delete', 'guard_name' => 'web'],
            ['name' => 'vendor_create', 'guard_name' => 'web'],
        ];

        Permission::insert( $permissions);
```
---

```
  RoleSeeder.php
```

```
    $allPermissionsNames = Permission::pluck('name');
        $roles = [
              "admin"=>[
                    "permissions" => $allPermissionsNames,
                    "users"=>  [
                        'name' => 'admin',
                        'email' => 'admin@gmail001.com',
                        'password' => bcrypt('password123'), // Hash the password
                    ]
                ],
                ...... , .....  
        ];

        // admin : role name
        // permissions : Assign Permissions to role
        // users : dummy data for role 


        foreach ($roles as $role => $roleData) {
           $permissions = $roleData['permissions'];
           $user = $roleData['users'];
           $roleName = $role;

            DB::transaction(function () use ($roleName, $permissions, $user) {
                // Create Role and Give permission
                $roleCreate = Role::create(['name' => $roleName]);
                $roleCreate->givePermissionTo($permissions);

                // Create user and Assign role
                $userCreate = User::create($user);
                $userCreate->assignRole($roleName);
            });

        }
```


```
   php artisan db:seed --class=PermissionSeeder 
   
   php artisan db:seed --class=RoleSeeder

```

---



# Snap Code File

This code snippet demonstrates the essential steps for managing permissions, roles, and user assignments in a Laravel application.

## Key Concepts

1. **Permission Creation**: Establishing specific access rights (`edit articles`) using the `Permission` model.
   
2. **Role Creation**: Defining user roles (`$roleName`) using the `Role` model.
   
3. **Assigning Permissions to Roles**: Linking permissions to roles using `givePermissionTo`.
   
4. **User Creation**: Creating a new user using the `User` model.
   
5. **Assigning Roles to Users**: Granting roles to users using `assignRole`, which indirectly assigns associated permissions.

## Snap Code File

```php
// Permission Creation
$permission = Permission::create(['name' => 'edit articles']);

// Role Creation
$roleCreate = Role::create(['name' => $roleName]);

// Assigning Permissions to Roles
$roleCreate->givePermissionTo($permissions);

// User Creation and Role Assignment
$userCreate = User::create($user);
$userCreate->assignRole($roleName);
