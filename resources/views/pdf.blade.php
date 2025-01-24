<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload PDF</title>
</head>
<body>
    <form action="{{ url('/pdf/extract') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept="application/pdf" required>
        <button type="submit">Extract Text</button>
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF to Text</title>
</head>
<body>
    <input type="file" id="pdf-file" accept=".pdf">
    <div id="output"></div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.3.122/pdf.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#pdf-file').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const typedarray = new Uint8Array(this.result);
                        pdfjsLib.getDocument(typedarray).promise.then(function(pdf) {
                            let text = '';
                            const numPages = pdf.numPages;

                            // Function to get text from a specific page
                            const getPageText = function(pageNum) {
                                return pdf.getPage(pageNum).then(function(page) {
                                    return page.getTextContent().then(function(textContent) {
                                        const pageText = textContent.items.map(item => item.str).join(' ');
                                        text += pageText + '\n\n';
                                        if (pageNum < numPages) {
                                            return getPageText(pageNum + 1);
                                        } else {
                                            return text;
                                        }
                                    });
                                });
                            };

                            // Start extraction from the first page
                            getPageText(1).then(function(text) {
                                $('#output').text(text);
                            });
                        });
                    };
                    reader.readAsArrayBuffer(file);
                }
            });
        });
    </script>
</body>
</html>

