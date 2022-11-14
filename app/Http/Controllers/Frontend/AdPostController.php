<?php

namespace App\Http\Controllers\Frontend;

use \File;
use Session;
use App\Models\UserPlan;
use Illuminate\Support\Str;
use Modules\Ad\Entities\Ad;
use Illuminate\Http\Request;
use Modules\Brand\Entities\Brand;
use App\Http\Traits\AdCreateTrait;
use Illuminate\Support\Facades\DB;
use Modules\Ad\Entities\AdGallery;
use Modules\Location\Entities\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Modules\Category\Entities\Category;
use Modules\Category\Entities\SubCategory;

class AdPostController extends Controller
{
    use AdCreateTrait;

    /**
     * Ad Create step 1.
     * @return void
     */
    public function postStep1()
    {


        $categories = Category::active()->latest('id')->get();
        $brands = Brand::latest('id')->get();
        $ad = session('ad');

        $citis = City::orderBy('name', 'asc')->get();
        $authUser = auth('customer')->user();
        return view('frontend.postad.step1', compact('categories', 'brands', 'ad', 'authUser', 'citis'));
    }

    public function getSubcategory($id)
    {
        echo json_encode(SubCategory::active()->where('category_id', $id)->get());
    }

    /**
     * Ad Create step 2.
     *
     * @return void
     */
    public function postStep2()
    {
        if (session('step2')) {
            $ad = session('ad');
            $citis = City::latest('id')->get();
            $authUser = auth('customer')->user();

            return view('frontend.postad.step2', compact('ad', 'citis', 'authUser'));
        } else {
            return redirect()->route('frontend.post');
        }
    }

    /**
     * Ad Create step 3.
     *
     * @return void
     */
    public function postStep3()
    {
        if (session('step3')) {
            return view('frontend.postad.step3');
        } else {
            return redirect()->route('frontend.post');
        }
    }

    /**
     * Store Ad Create step 1.ul Islam <devboyarif@gmail.com>
     *  @param  Request $request
     * @return void
     */
    public function storePostStep1(Request $request)
    {

        $request->validate([
            'title' => 'required|min:30|unique:ads,title',
            'price' => 'required|numeric',
            'condition' => 'required',
            'negotiable' => 'required',
            'featured' => 'sometimes',
            'brand_id' => 'sometimes',
            'authenticity' => 'sometimes',
            'model' => 'sometimes',
            'web' => 'sometimes',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'country' => 'required',
            'town_id'  => 'required',
            'description' => 'required|min:150',
            'images.*' => 'required|max:2048',

            // 'estimate_calling_time' => 'required',
        ], [
            'country.required' => 'The Country is required',
            'town_id.required' => 'The Region is required',
        ]);


        DB::beginTransaction();
        try {

            $ad = new Ad();
            $ad->title = $request->title;
            $ad->slug = Str::slug($request->title);
            $ad->price = $request->price;
            $ad->condition = $request->condition;
            $ad->negotiable = $request->negotiable;
            $ad->featured = $request->featured ?? 0;
            $ad->brand_id = $request->brand_id;
            $ad->authenticity = $request->authenticity;
            $ad->model = $request->model;
            $ad->customer_id = Auth::id();
            $ad->web = $request->web;
            $ad->category_id = $request->category_id;
            $ad->subcategory_id = $request->subcategory_id;
            $ad->city_id = $request->country;
            $ad->town_id = $request->town_id;
            $ad->area_id = $request->area_id;
            $ad->description = $request->description;
            $ad->status = setting('ads_admin_approval') ? 'pending' : 'active';
            $ad->save();

            $images = $request->images;

            $files = [];
            if ($images) {


                foreach ($images as $key => $image) {
                    if ($image) {
                        if ($key == 0 && $image) {
                            $name = uploadImage($image, 'thumbnail');

                            $ad->update(['thumbnail' => $name]);
                        }
                        if ($image && $key > 0) {
                            $name = uploadImage($image, 'thumbnail');
                            $ad->galleries()->create(['image' => $name]);
                        }
                    }
                }
            }


            // feature inserting
            if ($request->features) {
                foreach ($request->features as $feature) {
                    if ($feature) {
                        $ad->adFeatures()->create(['name' => $feature]);
                    }
                }
            }
            $this->adNotification($ad);
            !setting('ads_admin_approval') ? $this->userPlanInfoUpdate($ad->featured) : '';

            DB::commit();
            return view('frontend.postad.postsuccess', [
                'ad_slug' => $ad->slug,
                'mode' => 'create'
            ]);
        } catch (\Exception $th) {
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store Ad Create step 2.
     *  @param  Request $request
     * @return void
     */
    public function storePostStep2(Request $request)
    {
        $validatedData = $request->validate([
            'estimate_calling_time' => 'required',
            'city_id' => 'required',
            'town_id'  => 'required',
        ], [
            'city_id.required' => 'The Country is required',
            'town_id.required' => 'The Region is required',
        ]);
        try {
            $ad = session('ad');
            $ad->fill($validatedData);
            if ($request->phone_number_showing_permission == 1) {
                $ad->phone_number_showing_permission = $request->phone_number_showing_permission;
                $ad->phone = $request->phone;
            } else {
                $ad->phone_number_showing_permission = 0;
                $ad->phone = null;
            }

            $ad->web = $request->web;
            $ad->town_id = $request->town_id;
            $request->session()->put('ad', $ad);
            $this->step1Success2();
            return redirect()->route('frontend.post.step3');
        } catch (\Throwable $th) {
            $this->forgetStepSession();
            return redirect()->route('frontend.post')->with('error', 'Something went wrong while saving your ad.Please try again.');
        }
    }

    /**
     * Store Ad Create step 3.
     *  @param  Request $request
     * @return void
     */
    public function storePostStep3(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|min:150',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $ad = session('ad');
        $ad['description'] = $validatedData['description'];
        $ad['customer_id'] = auth('customer')->id();
        $request->session()->put('ad', $ad);
        $ad['status'] = setting('ads_admin_approval') ? 'pending' : 'active';
        $ad->save();

        $user_plan = UserPlan::where('customer_id', $ad['customer_id'])->first();
        //$multiple_image = $user_plan->multiple_image;

        // image uploading
        $images = $request->file('images');
        // if($multiple_image == false && count($images) > 1){
        //     return
        //      redirect()->back()->with('error', 'Your package not support multiple image');
        // }

        $files = [];
        foreach ($images as $key => $image) {
            if ($image) {
                if ($key == 0 && $image) {
                    $name = $image->GetClientOriginalName();
                    $thumbnail = 'uploads/addds_images/' . $name;
                    Image::make($image->path())->resize(850, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbnail);
                    $ad->update(['thumbnail' => $thumbnail]);
                }
                if ($image && $key > 0) {
                    $gallery_image_name = $image->GetClientOriginalName();
                    $image_path = 'uploads/adds_multiple/' . $gallery_image_name;
                    Image::make($image->path())->resize(850, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($image_path);
                    $ad->galleries()->create(['image' => $image_path]);
                }
            }
        }


        $features = $request->features;
        foreach ($features as $feature) {
            if ($feature) {
                $ad->adFeatures()->create(['name' => $feature]);
            }
        }


        $this->forgetStepSession();
        $this->adNotification($ad);
        !setting('ads_admin_approval') ? $this->userPlanInfoUpdate($ad->featured) : '';

        return view('frontend.postad.postsuccess', [
            'ad_slug' => $ad->slug,
            'mode' => 'create'
        ]);
    }

    /**
     * Ad Edit step 1.
     * @return void
     */
    public function editPostStep1(Ad $ad)
    {
        if (auth('customer')->id() == $ad->customer_id) {
            $this->stepCheck();
            session(['edit_mode' => true]);

            if (session('step1') && session('edit_mode')) {
                $ad = collectionToResource($this->setAdEditStep1Data($ad));
                $categories = Category::latest('id')->get();
                $brands = Brand::latest('id')->get();
                $citis = City::orderBy('name', 'asc')->get();

                $countfeatured = Ad::where('customer_id', auth()->id())->where('featured', true)->where('status', true)->count();

                return view('frontend.postad_edit.step1', compact('ad', 'categories', 'brands', 'citis', 'countfeatured'));
            } else {
                return redirect()->route('frontend.dashboard');
            }
        }

        abort(404);
    }

    /**
     * Ad Edit step 2.
     *
     * @return void
     */
    public function editPostStep2(Ad $ad)
    {
        if (auth('customer')->id() == $ad->customer_id) {
            $ad = collectionToResource($this->setAdEditStep2Data($ad));
            $authUser = auth('customer')->user();
            if (session('step2') && session('edit_mode')) {
                $citis = City::orderBy('name')->get();

                return view('frontend.postad_edit.step2', compact('ad', 'citis', 'authUser'));
            } else {
                return redirect()->route('frontend.dashboard');
            }
        }

        abort(404);
    }


    /**
     * Edit Ad step 3.
     *
     * @return void
     */
    public function editPostStep3(Ad $ad)
    {
        $ad->load('adFeatures', 'galleries');

        if (auth('customer')->id() == $ad->customer_id) {
            $ad = collectionToResource($this->setAdEditStep3Data($ad));

            if (session('step3') && session('edit_mode')) {
                return view('frontend.postad_edit.step3', compact('ad'));
            } else {
                return redirect()->route('frontend.dashboard');
            }
        }

        abort(404);
    }

    /**
     * Update Ad step 1.ul Islam <devboyarif@gmail.com>
     *  @param  Request $request
     * @return void
     */
    public function UpdatePostStep1(Request $request, Ad $ad)
    {

        // dd($request->all());

        $request->validate([
            'title' => "required|unique:ads,title,$ad->id",
            'price' => 'required|numeric',
            'condition' => 'required',
            'negotiable' => 'sometimes',
            'category_id' => 'required',
            // 'subcategory_id' => 'required',
            'description' => 'required',

        ]);

        $ad->update([
            'title' => $request->title,
            'price' => $request->price,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'condition' => $request->condition,
            'authenticity' => $request->authenticity,
            'negotiable' => $request->negotiable,
            'featured' => $request->featured ?? 0,
            'web' => $request->web,
            'city_id' => $request->city_id,
            'town_id' => $request->town_id,
            'area_id' => $request->area_id,
            'description' => $request->description
        ]);


        // feature inserting
        $ad->adFeatures()->delete();

        if ($request->features) {
            foreach ($request->features as $feature) {
                if ($feature) {
                    $ad->adFeatures()->create(['name' => $feature]);
                }
            }
        }



        // image uploading
        $image = $request->file('thumbnail');
        $old_thumb = $request->old_thumbnail;
        if ($image && $image->isValid()) {
            $name = $image->hashName();
            $thumbnail = 'uploads/addds_images/' . $name;
            $ad->update(['thumbnail' => $thumbnail]);
            Image::make($image->path())
                ->resize(850, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($thumbnail);
            if ($old_thumb) {
                @unlink($old_thumb);
            }
        }


        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                if ($image && $image->isValid()) {
                    $name = $image->hashName();
                    $image_path = 'uploads/adds_multiple/' . $name;
                    Image::make($image->path())
                        ->resize(850, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($image_path);
                    $ad->galleries()->create(['image' => $image_path]);
                }
            }
        }



        $this->adNotification($ad, 'update');

        return view('frontend.postad.postsuccess', [
            'ad_slug' => $ad->slug,
            'mode' => 'update',
        ]);
    }

    /**
     * Update Ad step 2.
     *  @param  Request $request
     * @return void
     */
    public function updatePostStep2(Request $request, Ad $ad)
    {
        $request->validate([]);

        if ($request->phone_number_showing_permission == 1) {
            $phone_number_showing_permission = $request->phone_number_showing_permission;
            $phone = $request->phone;
        } else {
            $phone_number_showing_permission = 0;
            $phone = null;
        }

        $ad->update([
            'web' => $request->web,
            'phone' => $phone,
            'phone_number_showing_permission' => $phone_number_showing_permission,
            'phone_2' => $request->phone_2,
            'city_id' => $request->city_id,
            'town_id' => $request->town_id,
        ]);

        if ($request->cancel_edit) {
            $this->forgetStepSession();
            return redirect()->route('frontend.dashboard');
        } else {
            $this->step1Success2();
            return redirect()->route('frontend.post.edit.step3', $ad->slug);
        }
    }

    /**
     * Update Ad step 3.
     *  @param  Request $request
     * @return void
     */
    public function updatePostStep3(Request $request, Ad $ad)
    {
        $request->validate([]);

        $ad->update(['description' => $request->description]);

        // feature inserting
        $ad->adFeatures()->delete();
        foreach ($request->features as $feature) {
            if ($feature) {
                $ad->adFeatures()->create(['name' => $feature]);
            }
        }

        // image uploading
        $image = $request->file('thumbnail');
        $old_thumb = $request->old_thumbnail;
        if ($image && $image->isValid()) {
            $name = $image->hashName();
            $thumbnail = 'uploads/addds_images/' . $name;
            $ad->update(['thumbnail' => $thumbnail]);
            Image::make($image->path())
                ->resize(850, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($thumbnail);
            if ($old_thumb) {
                @unlink($old_thumb);
            }
        }
        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                if ($image && $image->isValid()) {
                    $name = $image->hashName();
                    $image_path = 'uploads/adds_multiple/' . $name;
                    Image::make($image->path())
                        ->resize(850, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($image_path);
                    $ad->galleries()->create(['image' => $image_path]);
                }
            }
        }

        $this->forgetStepSession();
        $this->adNotification($ad, 'update');

        return view('frontend.postad.postsuccess', [
            'ad_slug' => $ad->slug,
            'mode' => 'update',
        ]);
    }

    /**
     * Cancel Ad Edit.
     * @return void
     */
    public function cancelAdPostEdit()
    {
        $this->forgetStepSession();
        return redirect()->route('frontend.dashboard');
    }

    public function adGalleryDelete($id)
    {
        $data = AdGallery::find($id);
        $res = $data->delete();
        $res = true;
        if ($res) {
            @unlink($data->image);
            $result['status'] = 'success';
            $result['message'] = 'Image deleted successfully';
        } else {
            $result['status'] = 'failed';
            $result['message'] = 'Image not deleted successfully';
        }
        return response()->json($result);
    }
}
