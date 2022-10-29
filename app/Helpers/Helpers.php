<?php

use App\Models\Theme;
use App\Models\Setting;
use App\Models\Customer;
use App\Models\UserPlan;
use App\Models\ModuleSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\Artisan;
use Modules\Category\Entities\Category;
use Modules\Language\Entities\Language;
use Modules\Wishlist\Entities\Wishlist;
use App\Notifications\LoginNotification;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Modules\Currency\Entities\Currency as CurrencyModel;
use Stichoza\GoogleTranslate\GoogleTranslate;

function setting($fields = null, $append = false)
{
    if ($fields) {
        $type = gettype($fields);

        if ($type == 'string') {
            $data = $append ? Setting::first($fields) : Setting::value($fields);
        } elseif ($type == 'array') {
            $data = Setting::first($fields);
        }
    } else {
        $data = Setting::first();
    }

    if ($append) {
        $data = $data->makeHidden(['logo_image_url', 'logo2_image_url', 'favicon_image_url', 'loader_image_url']);
    }

    return $data;
}

/**
 * Check ad is wishlisted
 *
 * @param integer $adId
 * @return boolean
 */
function isWishlisted($adId)
{
    if (auth()->guard('customer')->check() && session()->has('wishlists') && in_array($adId, session('wishlists'))) {
        return true;
    }

    return false;
}

/**
 * Store customer plan information to session storage
 *
 * @return void
 */
function storePlanInformation()
{
    session()->forget('user_plan');
    session()->put('user_plan', auth()->guard('customer')->user()->userPlan);
}

function socialMediaShareLinks(string $path, string $provider)
{
    switch ($provider) {
        case 'facebook':
            $share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $path;
            break;
        case 'twitter':
            $share_link = 'https://twitter.com/intent/tweet?text=' . $path;
            break;
        case 'linkedin':
            $share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $path;
            break;
        case 'gmail':
            $share_link = 'https://mail.google.com/mail/u/0/?ui=2&fs=1&tf=cm&su=' . $path;
            break;
        case 'whatsapp':
            $share_link = 'https://wa.me/?text=' . $path;
            break;
    }

    return $share_link;
}


/**
 * Get is category menu selected
 *
 * @param Category $category
 *
 * @return boolean
 */
function isActiveCategorySidebar($category)
{
    $found = false;

    $categorySubcatategories = $category->subcategories->pluck('slug')->all();
    $urlSubCategories = request('subcategory', []);
    // dd($urlSubCategories);

    foreach ($categorySubcatategories as $category) {
        if (in_array($category, $urlSubCategories)) {
            $found = true;
            break;
        }
    }

    return $found;
}


function homePageThemes()
{
    return Theme::first()->home_page;
}

function collectionToResource($data)
{
    return json_decode(json_encode($data), false);
}

/**
 * Store customer wishlists information to session storage
 *
 * @return void
 */
function resetSessionWishlist()
{
    session()->forget('wishlists');
    $wishlists = Wishlist::select(['ad_id'])->where('customer_id', auth()->guard('customer')->id())->pluck('ad_id')->all();

    session()->put('wishlists', $wishlists);
}

/**
 * Send logged in notification
 *
 * @return void
 */
function loggedinNotification()
{
    $user = Customer::find(auth('customer')->id());
    $user->notify(new LoginNotification($user));
}

/**
 * customer has mambership badge or not
 *
 * @param int $customer_id
 * @return bool
 */
function hasMemberBadge($customer_id)
{
    return UserPlan::where('customer_id', $customer_id)->first()->badge;
}

/**
 * user permission check
 *
 * @param string $permission
 * @return boolean
 */
function userCan($permission)
{
    if (auth('super_admin')->check()) {
        return auth('super_admin')->user()->can($permission);
    }

    return false;
}

/**
 * user permission check
 *
 * @param string $permission
 * @return boolean
 */
function envReplace($name, $value)
{
    $path = base_path('.env');
    if (file_exists($path)) {
        file_put_contents($path, str_replace(
            $name . '=' . env($name),
            $name . '=' . $value,
            file_get_contents($path)
        ));
    }

    if (file_exists(App::getCachedConfigPath())) {
        Artisan::call("config:cache");
    }
}

/**
 * Check module is enabled or not
 *
 * @param string $module_name
 * @return boolean
 */
function enableModule(string $module_name)
{
    try {
        return ModuleSetting::select($module_name)->first()->$module_name;
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong!');
    }
}

function langDirection()
{
    $lang_code = app()->getLocale();
    $lang_direction = Language::where('code', $lang_code)->value('direction');

    return $lang_direction;
}

function error($name)
{
    $errors = session()->get('errors', app(ViewErrorBag::class));

    return $errors->has($name) ? 'is-invalid' : '';
}

function convertCurrency($amount, $last_digit = 2)
{
    if ($amount) {
        $amount = CurrencyModel::where('code', config('adlisting.currency'))->value('exchange_rate') * $amount;
    }

    return number_format($amount, $last_digit, '.', ',');
}

function convertCurrency2($amount)
{
    return (int)Currency::convert()
        ->from('USD')
        ->to(config('adlisting.currency'))
        ->amount($amount)
        ->round(2)
        ->get();
}

function currentCurrency()
{
    session()->forget('current_currency');
    $currency = CurrencyModel::whereCode(config('adlisting.currency'))->firstOrFail();
    session(['current_currency' => $currency]);
}

function currencyFormating($amount)
{
    $currency = session('current_currency');
    $converted_amount = $amount;

    if ($currency->symbol_position == 'left') {
        return "$currency->symbol$converted_amount";
    } else {
        return "$converted_amount$currency->symbol";
    }
}

function changeCurrency($amount)
{
    $symbol = config('adlisting.currency_symbol');
    $position = config('adlisting.currency_symbol_position');

    if ($position == 'left') {
        return $symbol . ' ' . $amount;
    } else {
        return $amount . ' ' . $symbol;
    }

    return $amount;
}

function currentLanguage()
{
    if (session()->has('lang')) {
        $lang = Language::where('code', session('lang'))->first();
    } else {
        $lang = Language::where('code', env('APP_DEFAULT_LANGUAGE'))->first();
    }

    return $lang;
}

function getFileSize($file)
{
    $file_exists = file_exists($file);

    if ($file_exists) {
        return File::size($file);
    }

    return 0;
}

function autoTransLation($lang, $text)
{
    $tr = new GoogleTranslate($lang);
    $afterTrans = $tr->translate($text);
    return $afterTrans;
}

function generateId()
{
    $serial_no = Customer::count();
    $customer_id = Customer::orderBy('id','desc')->first();

    // $serial_no = $serial_no > 0 ? ++$serial_no : 1;

    // if (strlen($serial_no) < 6) {
    //     $serial_no = str_repeat(0, (6 - strlen($serial_no))) . $serial_no;
    // }
    $bill_no = str_pad(($customer_id?$customer_id->id:0)+1, 5, "0", STR_PAD_LEFT); //"F-".str_pad($dbValue, 5, "0", 
    $id = date("y") . $bill_no;

    return $id;

}
