<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload dan Preview PDF</title>
</head>
<body>
    <h1>Upload dan Preview PDF</h1>

    <!-- Form untuk mengunggah file PDF pertama -->
    <form id="uploadForm1" enctype="multipart/form-data">
        <input type="file" name="pdf_file1" accept=".pdf">
        <input type="submit" value="Upload PDF 1">
    </form>

    <!-- Container untuk menampilkan file PDF pertama yang diunggah -->
    <div id="pdfContainer1"></div>

    <!-- Form untuk mengunggah file PDF kedua -->
    <form id="uploadForm2" enctype="multipart/form-data">
        <input type="file" name="pdf_file2" accept=".pdf">
        <input type="submit" value="Upload PDF 2">
    </form>

    <!-- Container untuk menampilkan file PDF kedua yang diunggah -->
    <div id="pdfContainer2"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menggunakan jQuery untuk mengirim file ke server saat tombol submit ditekan
        $("#uploadForm1").on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#pdfContainer1").html('<iframe src="data:application/pdf;base64,' + data + '" width="100%" height="500"></iframe>');
                }
            });
        });

        // Menggunakan jQuery untuk mengirim file ke server saat tombol submit ditekan
        $("#uploadForm2").on("submit", function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "upload.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    $("#pdfContainer2").html('<iframe src="data:application/pdf;base64,' + data + '" width="100%" height="500"></iframe>');
                }
            });
        });
    </script>
</body>
</html>
