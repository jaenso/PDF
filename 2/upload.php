<?php
include "config.php"; // Sambungkan ke database
require('fpdf.php'); // Sertakan file library FPDF

if ($_FILES['pdf_file1']['error'] === UPLOAD_ERR_OK && $_FILES['pdf_file2']['error'] === UPLOAD_ERR_OK) {
    $pdf_file1 = $_FILES['pdf_file1']['tmp_name'];
    $pdf_file_name1 = $_FILES['pdf_file1']['name'];

    $pdf_file2 = $_FILES['pdf_file2']['tmp_name'];
    $pdf_file_name2 = $_FILES['pdf_file2']['name'];

    // Simpan file PDF pertama
    $pdf_upload_path1 = 'uploads/' . $pdf_file_name1;
    move_uploaded_file($pdf_file1, $pdf_upload_path1);

    // Simpan file PDF kedua
    $pdf_upload_path2 = 'uploads/' . $pdf_file_name2;
    move_uploaded_file($pdf_file2, $pdf_upload_path2);

    // Gabungkan kedua file PDF ke dalam satu file
    $merged_pdf = new FPDF();
    $merged_pdf->AddPage();
    $merged_pdf->SetFont('Arial', '', 12);

    // Tambahkan file PDF pertama
    $merged_pdf->Image($pdf_upload_path1, 10, 10, 90);
    $merged_pdf->AddPage();

    // Tambahkan file PDF kedua
    $merged_pdf->Image($pdf_upload_path2, 10, 10, 90);

    $output_path = 'uploads/merged_pdf.pdf';
    $merged_pdf->Output($output_path, 'F');

    // Simpan nama file gabungan ke dalam database
    $query = "INSERT INTO biaya (penginapan) VALUES ('$output_path')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Tampilkan tautan untuk melihat file PDF gabungan
        echo '<iframe src="' . $output_path . '" width="100%" height="500"></iframe>';
    } else {
        echo "Gagal menyimpan data ke database.";
    }
} else {
    echo "Terjadi kesalahan saat mengunggah file.";
}
?>
