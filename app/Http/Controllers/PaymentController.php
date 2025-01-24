<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        try {
            // Extract request data
            $razorpayPaymentId = $request->input('razorpay_payment_id');
            $amount = $request->input('amount');
            $response = $request->input('response');
            parse_str($request->input('form_data'), $formData);

            // Define Razorpay credentials
            $isLive = false; // Toggle for live/test
            $razorpayId = $isLive ? env('RAZORPAY_ID_LIVE') : env('RAZORPAY_ID_TEST');
            $razorpayKey = $isLive ? env('RAZORPAY_KEY_LIVE') : env('RAZORPAY_KEY_TEST');

            // Initialize Razorpay API
            $api = new Api($razorpayId, $razorpayKey);

            // Validate payment ID
            if (empty($razorpayPaymentId)) {
                return response()->json(['success' => false, 'message' => 'Invalid payment ID'], 400);
            }

            // Fetch payment details
            $payment = $api->payment->fetch($razorpayPaymentId);

            // Attempt to capture payment
            $payment->capture(['amount' => $payment['amount']]);

            // Insert payment details into the database
            $studentName = $formData['fullname'];
            $rollNo = $formData['roll_no'];
            $standard = $formData['standard'];
            $remark = $formData['remark'];
            $transactionDate = now()->toDateString();
            $createdDate = now();

            DB::table('fees_payments')->insert([
                'student_name' => $studentName,
                'roll_no' => $rollNo,
                'standard' => $standard,
                'remark' => $remark,
                'payment_id' => $razorpayPaymentId,
                'amount' => $amount,
                'transaction_date' => $transactionDate,
                'response' => json_encode($response),
                'created_at' => $createdDate,
            ]);

            // Encrypt payment ID
            $encryptedPaymentId = Crypt::encryptString($razorpayPaymentId);

            return response()->json(['success' => true, 'message' => $encryptedPaymentId], 200);
        } catch (\Exception $e) {
            Log::error('Payment Error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
