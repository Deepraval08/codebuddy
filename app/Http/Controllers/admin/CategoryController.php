<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get(['id', 'name']);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $input = $request->all();
            $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

            Category::create($input);

            return redirect()->route('admin.categories.index')->with('success', 'New Category added successfully.');
        } catch (Exception $e) {
            Log::info('Error in storing category data');
            Log::info($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all(['id', 'name']);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $input = $request->all();
            $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

            $category->update($input);

            return redirect()->route('admin.categories.index')->with('success', 'Category data updated successfully.');
        } catch (Exception $e) {
            Log::info('Error in updating category data');
            Log::info($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = category::find($id);
            $category->delete();

            $this->delete_child_records($category);

            return redirect()->route('admin.categories.index')->with('success', 'category deleted successfully.');
        } catch (Exception $e) {
            Log::info('Error in deleteing category data');
            Log::info($e->getMessage());
        }
    }

    public function delete_child_records($category)
    {
        try {
            if (count($category->childs)) {
                foreach ($category->childs as $child) {
                    $child->delete();
                    if (count($child->childs)) {
                        $this->delete_child_records($child);
                    }
                }
            }
        } catch (Exception $e) {
            Log::info('Error in deleteing child category data');
            Log::info($e->getMessage());
        }
      
    }
}
