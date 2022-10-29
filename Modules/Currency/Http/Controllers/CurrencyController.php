<?php

namespace Modules\Currency\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Currency\Entities\Currency;
use Modules\Currency\Http\Requests\CurrencyCreateFormRequest;
use Modules\Currency\Http\Requests\CurrencyUpdateFormRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $currencies = Currency::paginate(15);

        return view('currency::index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('currency::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CurrencyCreateFormRequest $request
     * @return Renderable
     */
    public function store(CurrencyCreateFormRequest $request)
    {
        Currency::create($request->validated());

        flashSuccess('Currency Created Successfully');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('currency::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Currency $currency
     * @return Renderable
     */
    public function edit(Currency $currency)
    {
        if ($currency->code == 'USD') {
            abort(404);
        }

        return view('currency::edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     * @param CurrencyUpdateFormRequest $request
     * @param Currency $currency
     * @return Renderable
     */
    public function update(CurrencyUpdateFormRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

        if (($currency->code == $request->code) && $currency->code == config('adlisting.currency')) {
            if ($currency->symbol != config('adlisting.currency_symbol')) {
                envReplace('APP_CURRENCY_SYMBOL', $currency->symbol);
            }

            if ($currency->symbol_position != config('adlisting.currency_symbol_position')) {
                envReplace('APP_CURRENCY_SYMBOL_POSITION', $currency->symbol_position);
            }
        }

        flashSuccess('Currency Updated Successfully');
        return redirect()->route('module.currency.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        flashSuccess('Currency Deleted Successfully');
        return back();
    }

    public function defaultCurrency(Request $request)
    {
        $currency = Currency::findOrFail($request->currency_id);

        if ($currency && $currency->code != env('APP_CURRENCY')) {
            envReplace('APP_CURRENCY', $currency->code);
            envReplace('APP_CURRENCY_SYMBOL', $currency->symbol);
            envReplace('APP_CURRENCY_SYMBOL_POSITION', $currency->symbol_position);
        }

        flashSuccess('Default Currency Set Successfully');
        return back();
    }
}
