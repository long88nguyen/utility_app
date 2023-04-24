<?php

namespace App\Filters;

use App\Helpers\Common\StringHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QueryFilter
{
    /**
     * @var Request
     */
    public $request;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @var array
     */
    protected $search = [];

    /**
     * @var $builder Builder
     */
    protected Builder $builder;

    /**
     * @var string|null
     */
    protected $orderField = null;

    /**
     * @var string
     */
    protected $orderType = 'desc';

    /**
     * @var $filterable
     */
    protected $filterable;

    /**
     * @var array
     */
    private array $orderFields;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->filters = $this->request->all();
        $this->orderField = $this->request->get('sortColumn');
        $this->orderType = $this->request->get('order', 'desc');
    }

    /**
     * @param Builder $builder
     * @param array $filterFields
     * @param array $orderFields
     * @return Builder
     */
    public function apply(Builder $builder, array $filterFields, array $orderFields = []): Builder
    {
        $this->builder = $builder;
        $this->orderFields = $orderFields;

        foreach ($this->filters as $name => $value)
        {        
            $method = 'filter' . Str::studly($name);
            if ($value == '') {
                continue;
            }

            if (method_exists($this, $method)) {
                $this->{$method}($value);
                continue;
            }

            if (empty($this->filterable) || !is_array($this->filterable)) {
                continue;
            }

            if (in_array($name, $this->filterable)) {
                $this->builder->where($name, $value);
                continue;
            }

            if (key_exists($name, $this->filterable)) {
                $this->builder->where($this->filterable[$name], $value);
            }
        }

        $orderMethod = 'orderBy' . Str::studly($this->orderField);
        if (method_exists($this, $orderMethod))
            $this->{$orderMethod}($this->orderType);
        else
            if($this->orderField)
                $this->builder->orderBy($this->orderField, $this->orderType);

        return $this->builder;
    }
}