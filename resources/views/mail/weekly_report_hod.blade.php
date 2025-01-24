<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT Department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    table, th, td {
      border: 1px solid;
    }
  </style>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
<div>
  
  <h4 style="font-weight: normal !important;">Dear  </h4>
    <p>Brief Stats from Sahyoug Portal!</p>


        <?php 
            $output = '';

            foreach ($plant_data as $plant) {
                $output .= "Plant   : {$plant->name}<br/>";
                $output .= "Total Number of tickets: {$plant->total_ticket}<br/>";
                $output .= "Open    : {$plant->open}<br/>";
                $output .= "Closed  : {$plant->closed}<br/>";
                $output .= "Assigned: {$plant->assigned}<br/>";
                $output .= "<hr/><br/>";
            }

        ?>
       
        <div class="card">
            <div class="card-body">
                {!! $output !!}
            </div>
        </div>
  <p>PFA Excel Data for week 1.</p>
  <p>Thank You, </p>
  <p>Sahyoug Portal</p>
</div>
<small style="font-size:8px;">This email (including all attachments) is intended for the recipient(s) named above. It may contain confidential or privileged information and should not be read, copied or otherwise used by any other person. If you are not the named recipient, please contact the sender and delete the email from your system. LTD accepts no liability for viruses introduced by this email or attachments and it is your responsibility to employ virus checking software to check this email and any attachments.</small>
</body>
</html>