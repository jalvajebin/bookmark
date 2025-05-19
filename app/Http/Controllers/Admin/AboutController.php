<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\ContactEnquiry;
use App\Models\Counter;
use App\Models\LearnAboutUs;
use App\Models\MisionVision;
use App\Models\Seo;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use Exception;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    public function index()
    {
        $banner = Banner::where('page', 'about')->first();
        $learnAboutUs = LearnAboutUs::first();
        $counter = Counter::first();
        $aboutUs = AboutUs::first();
        // $seo = Seo::where('page', 'about')->first();
        return view('admin.about.index', compact('banner', 'aboutUs', 'learnAboutUs', 'counter'));
    }

    public function getTestimonial()
    {
        $quote = Testimonial::query()->orderBy('id', 'desc');
        // dd($quote);

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function addTestimonial(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'heading' => 'required',
            'description' => 'required',
            'image' => $request->testimonial_id ? 'image|max:2048' : 'required|image|max:2048',

        ]);

        DB::beginTransaction();
        try {
            $testimonial = Testimonial::updateOrCreate([
                'id' => $request->testimonial_id
            ], [

                'date' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d'),
                'heading' => $request->heading,
                'description' => $request->description,
                'alt' => $request->alt,
            ]);
            if ($request->hasFile('image')) {
                $testimonial->clearMediaCollection('images');
                $testimonial->addMediaFromRequest('image')->toMediaCollection('images');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->testimonial_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addAboutUs(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image1' => $request->about_us_id ? 'image|max:2048' : 'required|image|max:2048',
            'online_support_no' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $aboutUs = AboutUs::updateOrCreate([
                'id' => $request->about_us_id
            ], [

                'title' => $request->title,
                'description' => $request->description,
                'image1_alt' => $request->image1_alt,
                'online_support_number' => $request->online_support_no,

            ]);
            if ($request->hasFile('image1')) {
                $aboutUs->clearMediaCollection('employee_image');
                $aboutUs->addMediaFromRequest('image1')->toMediaCollection('image1_name');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->about_us_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addLearnAboutUs(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'button_title' => 'nullable',
            'button_link' => 'nullable|url',
            'employee_description' => 'required',
            'employee_content_1' => 'required',
            'employee_content_2' => 'required',
            'employee_content_3' => 'required',
            'employer_description' => 'required',
            'employer_content_1' => 'required',
            'employer_content_2' => 'required',
            'employer_content_3' => 'required',
            'employee_image' => $request->learn_about_us_id ? 'image|max:2048' : 'required|image|max:2048',
            'employer_image' => $request->learn_about_us_id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $learnAboutUs = LearnAboutUs::updateOrCreate([
                'id' => $request->learn_about_us_id
            ], [
                'title' => $request->title,
                'heading' => $request->heading,
                'button_title' => $request->button_title,
                'button_link' => $request->button_link,
                'employee_description' => $request->employee_description,
                'employee_content_1' => $request->employee_content_1,
                'employee_content_2' => $request->employee_content_2,
                'employee_content_3' => $request->employee_content_3,
                'employer_description' => $request->employer_description,
                'employer_content_1' => $request->employer_content_1,
                'employer_content_2' => $request->employer_content_2,
                'employer_content_3' => $request->employer_content_3,
                'employee_alt' => $request->employee_alt,
                'employer_alt' => $request->employer_alt,
            ]);

            if ($request->hasFile('employee_image')) {
                $learnAboutUs->clearMediaCollection('employee_image_name');
                $learnAboutUs->addMediaFromRequest('employee_image')->toMediaCollection('employee_image_name');
            }
            if ($request->hasFile('employer_image')) {
                $learnAboutUs->clearMediaCollection('employer_image_name');
                $learnAboutUs->addMediaFromRequest('employer_image')->toMediaCollection('employer_image_name');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->learn_about_us_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function addCounterData(Request $request)
    {
        $request->validate([
            'counter_1_name' => 'required|string|max:255',
            'count1' => 'required|numeric',
            'counter1_image_name' => $request->counter_id ? 'image|max:2048' : 'required|image|max:2048',
            'counter_2_name' => 'required|string|max:255',
            'count2' => 'required|numeric',
            'counter2_image_name' => $request->counter_id ? 'image|max:2048' : 'required|image|max:2048',
            'counter_3_name' => 'required|string|max:255',
            'count3' => 'required|numeric',
            'counter3_image_name' => $request->counter_id ? 'image|max:2048' : 'required|image|max:2048',
            'counter_4_name' => 'required|string|max:255',
            'count4' => 'required|numeric',
            'counter4_image_name' => $request->counter_id ? 'image|max:2048' : 'required|image|max:2048',
            'counter_5_name' => 'required|string|max:255',
            'count5' => 'required|numeric',
            'counter_6_name' => 'required|string|max:255',
            'count6' => 'required|numeric',
            'counter_7_name' => 'required|string|max:255',
            'count7' => 'required|numeric',
            'counter_8_name' => 'required|string|max:255',
            'count8' => 'required|numeric',

        ]);

        DB::beginTransaction();
        try {
            $counter = Counter::updateOrCreate([
                'id' => $request->counter_id
            ], [
                'counter_1_name' => $request->counter_1_name,
                'count1' => $request->count1,
                'counter_1_alt' => $request->counter_1_alt,
                'counter_2_name' => $request->counter_2_name,
                'count2' => $request->count2,
                'counter_2_alt' => $request->counter_2_alt,
                'counter_3_name' => $request->counter_3_name,
                'count3' => $request->count3,
                'counter_3_alt' => $request->counter_3_alt,
                'counter_4_name' => $request->counter_4_name,
                'count4' => $request->count4,
                'counter_4_alt' => $request->counter_4_alt,
                'counter_5_name' => $request->counter_5_name,
                'count5' => $request->count5,
                'counter_6_name' => $request->counter_6_name,
                'count6' => $request->count6,
                'counter_7_name' => $request->counter_7_name,
                'count7' => $request->count7,
                'counter_8_name' => $request->counter_8_name,
                'count8' => $request->count8,
            ]);

            if ($request->hasFile('counter1_image_name')) {
                $counter->clearMediaCollection('count1Image');
                $counter->addMediaFromRequest('counter1_image_name')->toMediaCollection('count1Image');
            }

            if ($request->hasFile('counter2_image_name')) {
                $counter->clearMediaCollection('count2Image');
                $counter->addMediaFromRequest('counter2_image_name')->toMediaCollection('count2Image');
            }


            if ($request->hasFile('counter3_image_name')) {
                $counter->clearMediaCollection('count3Image');
                $counter->addMediaFromRequest('counter3_image_name')->toMediaCollection('count3Image');
            }

            if ($request->hasFile('counter4_image_name')) {
                $counter->clearMediaCollection('count4Image');
                $counter->addMediaFromRequest('counter4_image_name')->toMediaCollection('count4Image');
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => $request->counter_id ? 'Successfully Updated' : 'Successfully Added']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
 

    public function getTestimonialById($id){
        $testimonial = Testimonial::findOrfail($id);
        return $testimonial;
    }


    public function deleteTestimonial($id){
        $testimonial = Testimonial::findOrfail($id);
        $testimonial->delete();

         return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully!'
        ]);
    }
}
