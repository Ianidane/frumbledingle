<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function Report(int $price)
    {
        // return $price;
        $report = DB::table('items as item');
        $report->selectRaw('
            location.name as location_name,
            parent.name as parent_name,
            category.name as category_name,
            count(location.id) as count')
                ->join('locations as location',
                'item.location_id',
                '=',
                'location.id')
                ->join('categories as category',
                'item.category_id',
                '=',
                'category.id')
                ->leftjoin('categories as parent',
                'category.parent_id',
                '=',
                'parent.id')
                ->groupBy(DB::raw('location_name, parent_name, category_name'))->where('item.price', '>=', $price);

        return $report->get();
    }

    // public function generateReport(int $price)
    // {
    //     $report = DB::table('items as item');
    //     $report->selectRaw('
    //      location.name as locationName,
    //      parent.name as parentName,
    //      category.name as categoryName,
    //      count(location.id) as count')
    //         ->join('locations as location',
    //         'item.location_id',
    //         '=',
    //         'location.id')
    //         ->join('categories as category',
    //         'item.category_id',
    //         '=',
    //         'category.id')
    //         ->leftjoin('categories as parent',
    //         'category.parent_id',
    //         '=',
    //         'parent.id')
    //         ->groupBy(DB::raw('locationName, parentName, categoryName'))->where('item.price', '>=', $price);

    //     return $report->get();
    // }
}