<?php

namespace App\Http\Controllers;

use App\CustomFunction\CaptchaClass;
use App\Models\CareerApplication;
use App\Models\ContactEnquiry;
use App\Models\LeaveComment;
use App\Models\RequestDemo;
use App\Models\RequestQuote;
use App\Models\Subscriber;
use App\Traits\EmailTrait;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    // use EmailTrait;

    public function __construct()
    {
        // $recaptcha = request()->input('g-recaptcha-response');
        // if (isset($recaptcha)) {
        //     $captchaClass = new CaptchaClass();
        //     $response = $captchaClass->verifyResponse($recaptcha);
        //     if (isset($response['success']) and $response['success'] != true) {
        //         throw new HttpResponseException(response()->json(['success' => false, 'message' => "Recaptcha verificaion failed"]));
        //     }
        // }
    }

    public function requestAQuote(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns,rfc',
            'phone' => 'required|min:8|max:14',
            'message' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->except(['_token', 'g-recaptcha-response']);
            $quote = RequestQuote::create($data);
            $data['email_subject'] = 'Request a quote from ' . $data['name'];
            $data['email_to'] = $this->getAddress('to', 'Request A Quote');
            $data['email_cc'] = $this->getAddress('cc', 'Request A Quote');
            $data['email_bcc'] = $this->getAddress('bcc', 'Request A Quote');
            $data['html'] = view("email.email", ['data' => $data])->render();
            $response = $this->sendEmail($data);
            if (is_string($response)) {
                $response = json_decode($response, true);
            }
            if (isset($response['id'])) {
                $quote->message_id = $response['id'];
            }
            $quote->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Enquiry has been successfully submitted!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Please try again!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function contactEnquiry(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email:dns,rfc',
        //     'phone' => 'required | min:8 | max:14',
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);

         $request->validate([
            'type' => 'required|in:seeker,client',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:2',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        DB::beginTransaction();
        try {

            $contact = ContactEnquiry::latest()->first();
            $data = $request->except(['_token', 'g-recaptcha-response']);
            $contact =  ContactEnquiry::create($data);
            DB::commit();
            $data['email_subject'] = 'Contact Enquiry from' . ' ' . $data['name'];
            $to = $this->getAddress('to', 'Contact');
            $cc =  $this->getAddress('cc', 'Contact');
            $bcc =  $this->getAddress('bcc', 'Contact');
            $data['email_to'] = $to;
            $data['email_cc'] = $cc;
            $data['email_bcc'] = $bcc;

            $data['html'] = view("email.email", [
                'data' => $data
            ])->render();

            $response = $this->sendEmail($data);
            $contact->message_id = $response['id'] ?? null;
            $contact->save();
            return response()->json(['success' => true, 'message' => 'Successfully submitted!']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Please try again!']);
        }
    }

    public function requestADemo(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns,rfc',
            'looking_for' => 'required',
            'phone' => 'required | min:8 | max:14',
            'message' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except([
                "_token",
                "g-recaptcha-response"
            ]);
            $career = RequestDemo::create($data);
            DB::commit();
            $data['email_subject'] = 'Request A Demo from' . ' ' . $request->name;
            $to = $this->getAddress('to', 'Request A Quote');
            $cc =  $this->getAddress('cc', 'Request A Quote');
            $bcc =  $this->getAddress('bcc', 'Request A Quote');
            $data['email_to'] = $to;
            $data['email_cc'] = $cc;
            $data['email_bcc'] = $bcc;
            $data['html'] = view("email.email", [
                'data' => $data
            ])->render();
            $this->sendEmail($data);
            return response()->json(['success' => true, 'message' => 'Application Submitted Successfully!']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function leaveAComment(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns,rfc',
            'message' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // $data = $request->except("_token",  "g-recaptcha-response");
            $data = $request->except("_token");
            LeaveComment::create($data);
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Successfully Added.']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
