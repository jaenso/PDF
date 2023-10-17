<?php
include "config.php"; // Sambungkan ke database

if ($_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
    $pdf_file = $_FILES['pdf_file']['tmp_name'];
    $pdf_file_name = $_FILES['pdf_file']['name'];

    // Simpan file PDF
    $pdf_upload_path = 'uploads/' . $pdf_file_name;
    if (move_uploaded_file($pdf_file, $pdf_upload_path)) {
        // Simpan nama file ke dalam database
        $query = "INSERT INTO biaya (materi_kegiatan) VALUES ('$pdf_file_name')";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo base64_encode(file_get_contents($pdf_upload_path));
        } else {
            echo "Gagal menyimpan nama file ke database.";
        }
    } else {
        echo "Gagal mengunggah file PDF.";
    }
} else {
    echo "Terjadi kesalahan saat mengunggah file.";
}
?>
