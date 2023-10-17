<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload dan Preview PDF</title>
</head>
<body>
    <h1>Upload dan Preview PDF</h1>

    <!-- Form untuk mengunggah file PDF -->
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" name="pdf_file" accept=".pdf">
        <input type="submit" value="Upload PDF">
    </form>

    <!-- Container untuk menampilkan file PDF yang diunggah -->
    <div id="pdfContainer"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menggunakan jQuery untuk mengirim file ke server saat tombol submit ditekan
        $("#uploadForm").on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#pdfContainer").html('<iframe src="data:application/pdf;base64,' + data + '" width="100%" height="500"></iframe>');
                }
            });
        });
    </script>
</body>
</html>
