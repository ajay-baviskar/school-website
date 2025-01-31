@extends('layouts.theme')
@section('content')
    <!--/navbar ends-->
    <div class="blog jumbotron" style="background: url({{url('public')}}/theme/img/payment.png) no-repeat;    background-size: cover;background-position: top center;">
        <div class="container">
            <div class="col-lg-6 col-centered text-center">
                <h1 class="text-light">Fees Payment</h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fees Payment</li>
                    </ol>
                </nav>
                <!-- /breadcrumb -->
            </div>
        </div>
        <!-- /.container -->
    </div>
    <br>
    <br>
    <div class="section-heading">
       <h2>SCHOOL FEES</h2>
    </div>
    <div class="row"  style="padding: 30px;">
         <div class="col-md-6 container">
            <center >
                <h3 class="mb-4">Fee Structure & Payment Details</h3>
                <p class="text-muted">"An investment in education always pays the highest returns."</p>
                <!-- Section heading -->
                <table class="table table-bordered table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Standard (STD)</th>
                            <th>Monthly Fee</th>
                            <th>Term Fee (Pay in August)</th>
                            <th>Yearly Fee (YLY)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jr KG, Sr KG</td>
                            <td>Rs. 1200/-</td>
                            <td>Rs. 3000/-</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>I, II, III, IV</td>
                            <td>Rs. 1000/-</td>
                            <td>Rs. 3000/-</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>V, VI, VII, VIII, IX, X</td>
                            <td>Rs. 1200/-</td>
                            <td>Rs. 3000/-</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>XI & XII - Science</td>
                            <td></td>
                            <td></td>
                            <td>Rs. 17000/-</td>
                        </tr>
                        <tr>
                            <td>XI & XII - Commerce</td>
                            <td></td>
                            <td></td>
                            <td>Rs. 15000/-</td>
                        </tr>
                    </tbody>
                </table>

                <p class="text-muted"><b>Pay via Demad Draft or click here for <a href="{{url('bank-details')}}">online Fee Payament</a></b></p>

            </center>
                <!-- Map -->
        </div>
        <div class="col-md-6">

                        <!-- Forms -->
                        <h5>Enter Your Detail and Pay Fees</h5>
                        <form method="post" id="placeorderform" action="#">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="fullname" placeholder="text" name="fullname" required>
                                <label for="fullname">Full Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="standard" placeholder="text" name="standard" required>
                                <label for="standard">Standard</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="rollno" placeholder="text" name="roll_no" required>
                                <label for="rollno">Roll no</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="text" name="amount" min=10 required>
                                <label for="floatingInput">Amount</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="remark" placeholder="text" name="remark" required>
                                <label for="floatingInput">Remark</label>
                            </div>

                            <div class="form-floating mt-2 text-center">
                                <input type="submit" class="btn btn-primary" value="paynow" id="paynow" name="paynow" id="mc-embedded-subscribe">
                            </div>
                        </form>
                        <!-- Forms -->

        </div>
</div>
    <!-- <center style="padding-bottom: 24px;">
        <h3>SCHOOL FEES</h3>
        <h4>TOGETHER WE ACHIEVE THE EXTRAORDINARY</h4>
        <h4>"An investment in education always pays the highest returns."</h4>
        <h5>For JRKG, SRKG, Ist TO Xth     2024-25</h5>
            <p>Tuition Fee:  Rs.1200 / per month.</p>
            <p>Term Fee:     Rs.3000/- per annum.</p>
        <h5>For Grade- XI & XII     2024-25</h5>
            <p>Fee Full Year - Rs. 12000 /pa.</p>
            <h4>The mode of payment will be ONLY via Demand Draft or <a href="/payment.php">online .</a></h4>
        <h5>SCHOOL TIMINGS:    Monday to Saturday</h5>
            <p>The school works in ONE shift:</p>
            <p>Primary & Secondary Section 8.00 am. to 2.00 pm.</p>
            <p>Junior College Section : Std.XI & XII Commerce & Science     02.p.m. to 5.30p.m.</p>
            <p> <ul>Visiting Hours  : </ul>  CLERK OFFICE:  9am to  11am</p>
    </center> -->

    <!-- /jumbotron -->
    <!-- Clouds SVG Divider -->
    <svg id="deco-clouds2" class="head d-none d-md-block" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M-5 100 Q 0 20 5 100 Z
            M0 100 Q 5 0 10 100
            M5 100 Q 10 30 15 100
            M10 100 Q 15 10 20 100
            M15 100 Q 20 30 25 100
            M20 100 Q 25 -10 30 100
            M25 100 Q 30 10 35 100
            M30 100 Q 35 30 40 100
            M35 100 Q 40 10 45 100
            M40 100 Q 45 50 50 100
            M45 100 Q 50 20 55 100
            M50 100 Q 55 40 60 100
            M55 100 Q 60 60 65 100
            M60 100 Q 65 50 70 100
            M65 100 Q 70 20 75 100
            M70 100 Q 75 45 80 100
            M75 100 Q 80 30 85 100
            M80 100 Q 85 20 90 100
            M85 100 Q 90 50 95 100
            M90 100 Q 95 25 100 100
            M95 100 Q 100 15 105 100 Z">
        </path>
    </svg>


    <!-- /page -->
    <!-- Footer -->
    @endsection
    @section('js')
    <!-- <script src="switcher/js/dmss.js"></script> -->
    <!-- <script src="switcher/js/fixes.js"></script> -->


    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $('#paynow').on('click', function(e) {
            e.preventDefault();

            let amount = parseInt($('#floatingInput').val());
            let fullname = $('#fullname').val();
            let remark = $('#remark').val();
            let standard = $('#standard').val();
            let rollno = $('#rollno').val();
            if (amount > 0 && !isNaN(amount)) {
                var formData = $('#placeorderform :input').serialize();
                var options = {
                    "key": "rzp_test_DjiG7TrSKd6AQU",
                    "amount": amount * 100,
                    "currency": "INR",
                    "name": fullname,
                    "description": "guest@gmail.com",
                    "image": "profile.png",
                    "order_id": "",
                    "handler": function(response) {
                        $.ajax({
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': "{{csrf_token()}}"
                            },
                            url: "{{ url('handle-payment') }}",
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                amount: amount,
                                response: response,
                                form_data: formData
                            },
                            success: function(data) {
                                if (data.success) {
                                    var encryptedPaymentId = data.message;
                                    var successUrl = "payment_success?payment_id=" + encodeURIComponent(encryptedPaymentId);
                                    window.location.href = successUrl;

                                } else {
                                    alert('Something went wrong! Try again: ' + responseData.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error: ' + status + error);
                                alert('Failed to process payment.');
                            }
                        });
                    },
                    "prefill": {
                        "name": fullname,
                        "email": "guest@gmail.com",
                        "contact": "75679887745"
                    },
                    "notes": {
                        "address": "-"
                    },
                    "theme": {
                        "color": "#F37254"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            } else {
                console.error('Invalid amount detected.');
            }
        });
    </script>
 @endsection
