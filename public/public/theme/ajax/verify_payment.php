<?php
$con = mysqli_connect('localhost', 'accunaze_sapaliga', 'Sapaliga@2024', 'accunaze_sharadaenglishschool');
function encryptPaymentId($paymentId) {
    $key = 'your-secret-key'; // Use a secure key
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($paymentId, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

require_once('../vendor/autoload.php');

use Razorpay\Api\Api;

// Get request data
$requestData = $_REQUEST;
$razorpayPaymentId = $requestData['razorpay_payment_id'];
$amount = $requestData['amount'];
$response = $requestData['response'];
$formData = $requestData['form_data'];
parse_str($formData, $formDataArray);

// Set Razorpay API credentials
$razorpayIdLive = "rzp_test_DjiG7TrSKd6AQU";
$razorpayIdTest = "rzp_test_DjiG7TrSKd6AQU";

$razorpayKeyLive = "awbY7pIwMH28kCKvGPUhGJ11";
$razorpayKeyTest = "awbY7pIwMH28kCKvGPUhGJ11";

$isLive = 0;
$razorpayId = $isLive ? $razorpayIdLive : $razorpayIdTest;
$razorpayKey = $isLive ? $razorpayKeyLive : $razorpayKeyTest;

// Initialize Razorpay API
$api = new Api($razorpayId, $razorpayKey);

// Fetch payment details
$payment = $api->payment->fetch($razorpayPaymentId);

// Check if payment ID is valid
if (!empty($razorpayPaymentId)) {
    try {
        // Capture payment
        $payment->capture(['amount' => $payment['amount']]);
        $isPaymentVerified = true;
    } catch (\Exception $e) {
        $isPaymentVerified = false;
        $errorMessage = $e->getMessage();
    }

    // Process payment response
    if ($isPaymentVerified) {
        $paymentId = $razorpayPaymentId;
        $paymentResponse = json_encode($response);
        $paymentAmount = $amount;

        $student_name = $formDataArray['fullname'];
        $roll_no = $formDataArray['roll_no'];
        $standard = $formDataArray['standard'];
        $transaction_date = date('Y-m-d', strtotime('now'));
        $created_date =  date('Y-m-d H:i:s', strtotime('now'));

        // Insert query
        $sql = "INSERT INTO fees_payment (student_name, roll_no, standard, payment_id, amount, transaction_date, response, created_date) 
        VALUES ('$student_name', '$roll_no', '$standard', '$paymentId', '$paymentAmount', '$transaction_date', '$paymentResponse', '$created_date')";

        // Execute query
        if (mysqli_query($con, $sql)) {
            $responseData = [
                'success' => true,
                'message' =>  encryptPaymentId($razorpayPaymentId)
            ];

            // Close connection
            mysqli_close($con);
        } else {
            $responseData = [
                'success' => false,
                'message' => 'Paid Fail ' . mysqli_error($con)
            ];
        }
    } else {
        $responseData = [
            'success' => false,
            'message' => $errorMessage
        ];
    }
} else {
    $responseData = [
        'success' => false,
        'message' => 'Invalid payment ID'
    ];
}

// Set the content type to JSON
header('Content-Type: application/json');
echo json_encode($responseData);
