<?php

namespace App\Service;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Size;
use App\Models\Unit;
use Yajra\DataTables\Facades\DataTables;

class ProductSettingService extends Service
{
  protected $brand = Brand::class;
  protected $category = Category::class;
  protected $unit = Unit::class;
  protected $size = Size::class;

  public function brandIndex()
  {
    $brand = $this->brand::active();

    return DataTables::of($brand)
      ->addColumn('action', fn ($item) => view('pages.brand.action', compact('item'))->render())
      ->make(true);
  }
  public function brandcreate($data)
  {
    if ($data['brand_id'] != '') {
      $brand = $this->brand::findOrFail($data['brand_id'])->fill([
        'name' => $data['name'],
        'code' => $data['code'],
      ]);
      $brand->save();
    } else {
      $this->brand::create($data);
    }
  }
  function branddelete($id)
  {
    $this->category::findOrFail($id)->delete();
  }
  public function categoryIndex()
  {
    $category = $this->category::active();

    return DataTables::of($category)
      ->addColumn('action', fn ($item) => view('pages.category.action', compact('item'))->render())
      ->make(true);
  }
  public function categorycreate($data)
  {
    if ($data['category_id'] != '') {
      $category = $this->category::findOrFail($data['category_id'])->fill([
        'name' => $data['name'],
        'code' => $data['code'],
      ]);
      $category->save();
    } else {
      $this->category::create($data);
    }
  }
  function categorydelete($id)
  {
    $this->category::findOrFail($id)->delete();
  }
  public function unitIndex()
  {
    $unit = $this->unit::active();

    return DataTables::of($unit)
      ->addColumn('action', fn ($item) => view('pages.unit.action', compact('item'))->render())
      ->make(true);
  }
  public function unitcreate($data)
  {
    if ($data['unit_id'] != '') {
      $unit = $this->unit::findOrFail($data['unit_id'])->fill([
        'name' => $data['name'],
        'code' => $data['code'],
      ]);
      $unit->save();
    } else {
      $this->unit::create($data);
    }
  }
  function unitdelete($id)
  {
    $this->unit::findOrFail($id)->delete();
  }
  public function sizeIndex()
  {
    $size = $this->size::active();

    return DataTables::of($size)
      ->addColumn('action', fn ($item) => view('pages.size.action', compact('item'))->render())
      ->make(true);
  }
  public function sizecreate($data)
  {
    if ($data['size_id'] != '') {
      $size = $this->size::findOrFail($data['size_id'])->fill([
        'name' => $data['name'],
        'code' => $data['code'],
      ]);
      $size->save();
    } else {
      $this->size::create($data);
    }
  }
  function sizedelete($id)
  {
    $this->size::findOrFail($id)->delete();
  }
}
