<?php  

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters 
{
	protected $request, $builder;
	protected $filters = [];


	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
	public function apply($builder)
	{
		$this->builder = $builder; 

		foreach ($this->filters as $filter) {
			if (! $this->hasFilter($filter)) continue;
		
        $this->$filter($this->request->$filter);
		}

		return $this->builder;
        
	}

	protected function hasFilter($filter):bool {

		return method_exists($this, $filter) && $this->request->has($filter);
	}

}

