<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\ContactExport;
use App\Exports\RequestQuoteExport;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\ContactEnquiry;
use App\Models\RequestQuote;
use App\Models\Seo;
use App\Models\Social;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index()
    {
        $logedUserData = auth()->user(); 

        $banner = Banner::where('page', 'contact')->first();
    
        $contact = Contact::first();
       
        // $social = Social::first();
        // $seo = Seo::where('page', 'contact')->first();
        // return view('admin.contact.index', compact('banner', 'contact', 'social', 'seo'));
        return view('admin.contact.index', compact('contact', 'logedUserData', 'banner'));

    }

    public function getContactEnquiry()
    {
        $quote = ContactEnquiry::query()->orderBy('id', 'desc');

        return DataTables::of($quote)
            ->addIndexColumn()
            ->make(true);
    }

    public function getRequestQuote()
    {
        $requestQuote = RequestQuote::query()->orderBy('id', 'desc');

        return DataTables::of($requestQuote)
            ->addIndexColumn()
            ->make(true);
    }

    public function getQuoteById($id)
    {
        $quote = RequestQuote::findOrfail($id);
        return $quote;
    }

    public function updateContact(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'title' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns',
            'description' => 'required',
            'address' => 'required',
            'maplink' => 'required',
            'logo_image' => $request->id ? 'image|max:2048' : 'required|image|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $contact = Contact::updateOrCreate([
                'id' => $request->id
            ], [
                'heading' => $request->heading,
                'title' => $request->title,
                'location' => $request->location,
                'phone' => $request->phone,
                'email' => $request->email,
                'description' => $request->description,
                'address' => $request->address,
                'maplink' => $request->maplink,
                'logoalt' => $request->logoalt,
            ]);
            if ($request->hasFile('logo_image')) {
                $contact->clearMediaCollection('logo');
                $contact->addMediaFromRequest('logo_image')->toMediaCollection('logo');
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function updateSocial(Request $request)
    {
        $request->validate([
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $contact = Social::updateOrCreate([
                'id' => $request->social_id
            ], [
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
            ]);
            DB::commit();
            return response()->json(['status' => true, 'message' => $request->social_id ? "Successfully Updated" : "Successfully Added"]);
        } catch (Exception $e) {
            DB::rollback();
            return  response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function contactExport(Request $request)
    {
        $ids = $request->ids ?? [];
        return Excel::download(new ContactExport($ids), 'contact-enquiries.xlsx');
    }

    public function quoteExport(Request $request)
    {
        $ids = $request->ids ?? [];
        return Excel::download(new RequestQuoteExport($ids), 'request-quote.xlsx');
    }

    public function deleteContactEnquiry(Request $request)
    {
        $contact  = ContactEnquiry::whereIn('id', $request->ids)->first();

        if (!isset($contact)) {
            return response()->json(['success' => false, 'message' => "Not found!"]);
        }
        $contact->delete();
        return response()->json(['success' => true, 'message' => "Deleted"]);
    }

    public function deleteQuoteRequest(Request $request)
    {
        $quote = RequestQuote::whereIn('id', $request->ids)->delete();

        if ($quote === 0) {
            return response()->json(['success' => false, 'message' => "Not found!"]);
        }

        return response()->json(['success' => true, 'message' => "Deleted"]);
    }

    public function getDeliveryDetails($message_id)
    {
        $client = new Client();
        $domain = env('MAILGUN_DOMAIN');
        $apiKey = env('MAILGUN_SECRET');
        $baseUrl = "https://api.mailgun.net/v3/{$domain}/events";

        $response = Http::withBasicAuth('api', $apiKey)
            ->get($baseUrl, [
                'message-id' => "{$message_id}",
                'limit' => 5,
            ]);

        if ($response->successful()) {
            $results = $response->json()['items'] ?? [];
            $view = view('admin.email', ['results' => $results])->render();
            return response()->json(['view' => $view]);
        }

        return ['error' => 'Unable to fetch email status'];
    }
}
