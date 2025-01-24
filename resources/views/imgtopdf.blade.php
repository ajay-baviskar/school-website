<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image to PDF Conversion</title>
    <title>Image to PDF Conversion</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <div>
        <h2>Image to PDF Conversion</h2>
        <img id="myImage" src="https://analytics.northernaccountants.co.uk/uploads/numbersapp/report/key_number_report_1722504341.png" alt="Image to convert">
        <br>
        <button id="convertBtn">Convert to PDF</button>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#convertBtn').click(function() {
                var imgSrc = $('#myImage').attr('src');
                var doc = new jsPDF();
                doc.addImage(imgSrc, 'JPEG', 10, 10, 180, 120);
                doc.save('converted.pdf');
            });
        });
    </script>

</body>
</html>
