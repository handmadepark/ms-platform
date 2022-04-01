<?php
namespace App\Traits;
use App\Models\Role;
use App\Models\Permission;

trait HasPermissionsTrait{

    //get permission
    public function getAllPermissions($permission)
    {
        return Permission::whereIn('slug', $permission)->get();
    }

    public function hasPermission($permission)
    {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role)
        {
            if($this->roles->contains('slug', $slug))
            {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role)
        {
            if($this->roles->contains($role))
            {
                return true;
            }
        }
        return false;
    }

    public function givePermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions == null)
        {
            return $this;
        }
        $this->permissions->saveMany($permissions);
        return $this;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'admins_permissions');
    }

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'admins_roles');
    }
}
