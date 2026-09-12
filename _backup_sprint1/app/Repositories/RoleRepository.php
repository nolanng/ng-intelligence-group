<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Contracts\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function find($id)
    {
        return Role::findOrFail($id);
    }

    public function findBySlug($slug)
    {
        return Role::where('slug', $slug)->first();
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function update($id, array $data)
    {
        $role = $this->find($id);
        $role->update($data);
        return $role;
    }

    public function delete($id)
    {
        $role = $this->find($id);
        return $role->delete();
    }
}
