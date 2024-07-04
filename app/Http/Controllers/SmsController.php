<?php

namespace App\Http\Controllers;
use App\Services\MSG91Service;
// use Craftsys\Msg91\Facade\Msg91;
use Illuminate\Http\Request;

class SmsController extends Controller
{
     protected $msg91Service;
    /**
     * Display the SMS view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('front.sms.index');
    }
    public function index1()
    {
        return view('front.sms.otp');
    }
    /**
     * Send SMS.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sms(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'mssg' => 'required|string',
                'phone' => 'required|string',
            ]);

            // Prepare the payload
            $payload = [
                'template_id' => '664457cfd6fc0506c709a262',
                'short_url' => 1, // Change to 1 for On or 0 for Off
                'recipients' => [
                    [
                        'mobiles' => $validatedData['phone'],
                        'var1' => $validatedData['mssg'],
                    ]
                ]
            ];

            // Initialize Curl
            $curl = curl_init();

            // Set Curl options
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://control.msg91.com/api/v5/flow/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payload), // Encode payload as JSON
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authkey: 421880AyodLrDFVC9K6641206dP1",
                    "content-type: application/json"
                ],
            ]);
            // Execute Curl request
            $response = curl_exec($curl);
            $err = curl_error($curl);

            // Close Curl
            curl_close($curl);

            // Check for Curl errors
            if ($err) {
                // Handle Curl errors
                return response()->json(['error' => "cURL Error: $err"], 500);
            } else {
                // Handle successful response
                return response()->json(['response' => $response], 200);
            }
        } catch (\Exception $e) {
            // Handle any other exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
     /**
     * Generate and send OTP.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateOtp(Request $request)
    {
        try {
            // Generate OTP
            $otp = mt_rand(100000, 999999); // Generate a random 6-digit number

            // You can save the OTP in the session or database for verification later
            // For now, let's just return it in the response
            return response()->json(['otp' => $otp], 200);
        } catch (\Exception $e) {
            // Handle any exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
   
     public function showForm()
    {
        return view('front.sms.otp');
    }
    
    public function __construct(MSG91Service $msg91Service)
    {
        $this->msg91Service = $msg91Service;
    }

   public function sendOTP()
{
    $curl = curl_init();

        $authKey = "421880AyodLrDFVC9K6641206dP1";
        $templateId = "664457cfd6fc0506c709a262";
        $mobile = "919163567970";

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://control.msg91.com/api/v5/otp?template_id=$templateId&mobile=$mobile&authkey=$authKey",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\n  \"Param1\": \"value1\",\n  \"Param2\": \"value2\",\n  \"Param3\": \"value3\"\n}",
          CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
}
   public function sendmessage()
{

//Your authentication key
$authKey = "421880AyodLrDFVC9K6641206dP1";

//Multiple mobiles numbers separated by comma
$mobileNumber = "919163567970";

//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "DAN457QETB366";

//Your message to send, Add URL encoding here.
$message = urlencode("this message is for testing purpose");

//Define route 
//$route = "default";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    //'route' => $route
);

//API URL
$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init($url);
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;

}
    
}

