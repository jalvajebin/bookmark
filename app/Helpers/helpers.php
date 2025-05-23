<?php

use App\Models\Notification;
use App\Models\Contact;
use App\Models\Social;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

// role page 
if (!function_exists('rolePages')) {

    function rolePages()
    {
        $rolePage =  [
            0 => 'country-management',
            1 => 'university-management',
            2 => 'course-management',
            3 => 'course-application',
            4 => 'service-management',
            5 => 'service-application',
            6 => 'App-Customer',
            7 => 'settings',
            8 => 'App-Banner',
            9 => 'referral-earn',
            10 => 'privacy-policy',
            11 => ""
        ];
        return $rolePage;
    }
}

if (!function_exists('createdBy')) {
    function createdBy($user_id)
    {
        return User::where('id', $user_id)->first()->name ?? "";
    }
}

if (!function_exists('updatedBy')) {
    function updatedBy($user_id)
    {
        return User::where('id', $user_id)->first()->name ?? "";
    }
}
if (!function_exists('userImage')) {

    function userImage()
    {
        $user = User::where('id', Auth::id())->first();
        // $imagePath =  asset("admin/images/images.png");
        if (isset($user->image) && !empty($user->image)) {
            $imagePath = env('APP_URL') . Storage::url($user->image);
        }
        return $imagePath;
    }
}

// if (!function_exists('sendPushNotification')) {
//     function sendPushNotification($data)
//     {
//         $token = array();
//         foreach ($data['user_ids'] as $user_id) {
//             $user = User::where('id', $user_id)->first();
//             array_push($token, $user->fcm_token);
//             // Notification::create([
//             //     "title" => $data['title'],
//             //     "description" => $data['body'],
//             //     'user_id' => $user_id,
//             //     'type' => $data['type']
//             // ]);
//         }

//         $factory = (new Factory)->withServiceAccount(config('services.firebase.credentials'));

//         $messaging = $factory->createMessaging();

//         $message = CloudMessage::new()
//             ->withNotification([
//                 'title' => $data['title'],
//                 'body' => $data['body'],
//             ]);

//         $messaging->sendMulticast($message, $token);

//         return ['success' => true];
//         // $headers = [
//         //     'Authorization' => 'Bearer ' . env('FIREBASE_SERVER_KEY'),
//         //     'Content-Type' => 'application/json',
//         // ];

//         // $datas = [
//         //     "registration_ids" => $token,
//         //     "notification" => [
//         //         "title" => $data['title'],
//         //         "body" => $data['body'],
//         //     ]
//         // ];

//         // $result = Http::withHeaders($headers)->post('https://fcm.googleapis.com/fcm/send', $datas);
//     }
// }

// if (!function_exists('seoContent')) {
//     function seoContent($page)
//     {
//         return Seo::where('page', $page)->first();
//     }
// }


if (!function_exists('addTooltip')) {

    function addTooltip($text, $maxLength = 50)
    {

        if (strlen($text) > $maxLength) {
            $shortText = substr(strip_tags($text), 0, $maxLength) . '...';
            return "<span title=\"" . htmlspecialchars(strip_tags($text)) . "\">" . htmlspecialchars($shortText) . "</span>";
        }
        return htmlspecialchars(strip_tags($text));
    }

    if (!function_exists('contactUs')) {

        function contactUs()
        {

            $contactUs = Contact::first();
            $socials = Social::first();
            return  $contactUs;
        }
    }

    if (!function_exists('social')) {

        function social()
        {

            $socials = Social::first();
            return  $socials;
        }
    }
}
