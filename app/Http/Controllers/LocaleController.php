<?php

namespace App\Http\Controllers;

use App\Constants\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class LocaleController extends Controller
{
    /**
     * Switch app locale / language.
     *
     * @param \App\Http\Requests\LocaleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(Request $request)
    {
        try {
            $locales = Locale::values();
            $locale = in_array($request->locale, $locales) ? $request->locale : $locales[0];

            session()->put('locale', $locale);

            return redirect()->back();
        } catch (\Throwable $th) {
            return ResponseController::failed($th->getMessage());
        }
    }
}
