<?php

namespace App\Http\Services;

use App\Models\Categories;
use Illuminate\Support\Facades\Session;

class CategoryService
{

    public function getAll(){
        return Categories::orderbyDesc('id')->paginate(5);
    }

    public function create($request)
    {
        try {
            Categories::create([
                'name' => (string) $request->input('name'),
            ]);
            Session::flash('success', 'Create category success');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $categories) : bool
    {
        try {
            $categories->name = (string) $request->input('name');

            $categories->save();

            Session::flash('success', 'Successfully updated directory');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');

        $category = Categories::where('id', $id)->first();

        if ($category) {
            return Categories::where('id', $id)->delete();
        }
        return false;
    }
}