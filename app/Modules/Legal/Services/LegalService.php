<?php

namespace App\Modules\Legal\Services;

use App\Modules\Legal\Models\Legal;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;

class LegalService
{

    public function all(): Collection
    {
        return Legal::all();
    }

    public function main_all(): Collection
    {
        return Legal::where('is_active', true)->get();
    }

    public function paginate(Int $total = 10): LengthAwarePaginator
    {
        $query = Legal::latest();
        return QueryBuilder::for($query)
                ->allowedFilters([
                    AllowedFilter::custom('search', new CommonFilter, null, false),
                ])
                ->paginate($total)
                ->appends(request()->query());
    }

    public function getBySlug(String $slug): Legal|null
    {
        return Legal::where('slug', $slug)->firstOrFail();
    }

    public function getBySlugMain(String $slug): Legal|null
    {
        return Legal::where('slug', $slug)->where('is_active', true)->firstOrFail();
    }

    public function update(array $data, Legal $legal): Legal
    {
        $legal->update($data);
        return $legal;
    }

}

class CommonFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->where(function($q) use($value){
            $q->where('heading', 'LIKE', '%' . $value . '%')
            ->orWhere('page_name', 'LIKE', '%' . $value . '%')
            ->orWhere('slug', 'LIKE', '%' . $value . '%')
            ->orWhere('description_unfiltered', 'LIKE', '%' . $value . '%');
        });
    }
}