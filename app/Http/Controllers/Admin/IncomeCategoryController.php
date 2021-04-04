<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeCategoryRequest;
use App\Http\Requests\UpdateIncomeCategoryRequest;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('income_category_access'), Response::HTTP_FORBIDDEN, '403 Acceso Denegado');

        if (request()->ajax()) {
            $incomeCategory = IncomeCategory::select(['id', 'name']);

            return DataTables::of($incomeCategory)
                ->addColumn('action', 'admin.incomeCategories.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.incomeCategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('income_category_create'), Response::HTTP_FORBIDDEN, '403 Acceso Denegado');

        return view('admin.incomeCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeCategoryRequest $request)
    {
        IncomeCategory::create($request->validated());

        return redirect()->route('incomeCategories.index')->withToastSuccess('Categoria de ingreso agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeCategory $incomeCategory)
    {
        abort_if(Gate::denies('income_category_edit'), Response::HTTP_FORBIDDEN, '403 Acceso Denegado');

        return view('admin.incomeCategories.edit', compact('incomeCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeCategoryRequest $request, IncomeCategory $incomeCategory)
    {
        $incomeCategory->update($request->validated());

        return redirect()->route('incomeCategories.index')->withToastSuccess('Categoria de ingreso editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeCategory $incomeCategory)
    {
        //
    }
}
