<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicAIController extends Controller
{
    public function chat(Request $request)
    {
        $message = strtolower(trim($request->message));

        // PAYMENT
        if (
            str_contains($message, 'kulipa') ||
            str_contains($message, 'payment') ||
            str_contains($message, 'nataka kulipia') ||
            str_contains($message, 'lipa')
        ) {

            return response()->json([
                'reply' =>
"💳 PAYMENT INFORMATION

📱 HALOTEL

Number:
0613885633

Name:
SALUMU M. MLANZI


📱 M-PESA

Business Number:
35884969

Name:
MWAJUMA MUHIDINI MLANZI

Baada ya kulipa tuma uthibitisho kwa admin."
            ]);
        }

        // COURSE

        if (
            str_contains($message,'course') ||
            str_contains($message,'kozi')
        ){

            return response()->json([
                'reply'=>
"Kozi zinazopatikana ni pamoja na:

• Bachelor of Computer Science

• Bachelor in Cyber Security

• Bachelor of Information Technology

• Bachelor of Accounting

• Bachelor of Banking and Finance

na nyingine nyingi."
            ]);
        }

        // REGISTER

        if(
            str_contains($message,'register')||
            str_contains($message,'jisajili')||
            str_contains($message,'registration')
        ){

            return response()->json([
                'reply'=>
"Unaweza kujisajili kupitia ukurasa wa Register.

Baada ya kujisajili Admin atakuidhinisha ndipo utaweza kuingia kwenye mfumo."
            ]);
        }

        return response()->json([
            'reply'=>
"Karibu kwenye E-Learning System.

Naweza kukusaidia kuhusu:

✅ Malipo

✅ Kozi

✅ Usajili

Uliza swali lako."
        ]);

    }
}
