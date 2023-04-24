<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class MemberFilter extends QueryFilter
{
    protected $filterable = [
        'id', 'user_id', 'name', 'birthday', 'gender'
    ];

    public function filterId($ids): Builder|Collection
    {
        if(is_array($ids))
            return $this->builder->whereIn('id', $ids)->pluck('name', 'id');
        else
            return $this->builder->where('id', $ids);
    }

    public function filterName($name): Builder
    {
        return $this->builder->where('name', 'LIKE', '%' . $name . '%');
    }

    public function filterBirthday($birthday): Builder
    {
        return $this->builder->where('birthday', $birthday);
    }
}