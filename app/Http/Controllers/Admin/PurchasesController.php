<?php

namespace App\Http\Controllers\Admin;

use App\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePurchasesRequest;
use App\Http\Requests\Admin\UpdatePurchasesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class PurchasesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Purchase.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('purchase_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('purchase_delete')) {
                return abort(401);
            }
            $purchases = Purchase::onlyTrashed()->get();
        } else {
            $purchases = Purchase::all();
        }

        return view('admin.purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating new Purchase.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('purchase_create')) {
            return abort(401);
        }
        return view('admin.purchases.create');
    }

    /**
     * Store a newly created Purchase in storage.
     *
     * @param  \App\Http\Requests\StorePurchasesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchasesRequest $request)
    {
        if (! Gate::allows('purchase_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $purchase = Purchase::create($request->all());



        return redirect()->route('admin.purchases.index');
    }


    /**
     * Show the form for editing Purchase.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('purchase_edit')) {
            return abort(401);
        }
        $purchase = Purchase::findOrFail($id);

        return view('admin.purchases.edit', compact('purchase'));
    }

    /**
     * Update Purchase in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchasesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchasesRequest $request, $id)
    {
        if (! Gate::allows('purchase_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());



        return redirect()->route('admin.purchases.index');
    }


    /**
     * Display Purchase.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('purchase_view')) {
            return abort(401);
        }
        $purchase = Purchase::findOrFail($id);

        return view('admin.purchases.show', compact('purchase'));
    }


    /**
     * Remove Purchase from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('purchase_delete')) {
            return abort(401);
        }
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('admin.purchases.index');
    }

    /**
     * Delete all selected Purchase at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('purchase_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Purchase::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Purchase from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('purchase_delete')) {
            return abort(401);
        }
        $purchase = Purchase::onlyTrashed()->findOrFail($id);
        $purchase->restore();

        return redirect()->route('admin.purchases.index');
    }

    /**
     * Permanently delete Purchase from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('purchase_delete')) {
            return abort(401);
        }
        $purchase = Purchase::onlyTrashed()->findOrFail($id);
        $purchase->forceDelete();

        return redirect()->route('admin.purchases.index');
    }
}
