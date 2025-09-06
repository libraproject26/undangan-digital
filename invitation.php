<?php 
include 'db.php';

$slug = $_GET['slug'];
$sql = "SELECT * FROM undangan WHERE slug='$slug'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die('Undangan tidak ditemukan!');
}

// Format tanggal
$tanggal_formatted = date('d F Y', strtotime($data['tanggal_acara']));
$waktu_formatted = date('H:i', strtotime($data['waktu_acara']));

// Include template berdasarkan pilihan
$template_file = 'templates/' . $data['template'] . '.php';
if (file_exists($template_file)) {
    // Pastikan variabel tersedia untuk template
    $template_data = $data;
    $template_tanggal_formatted = $tanggal_formatted;
    $template_waktu_formatted = $waktu_formatted;
    
    include $template_file;
} else {
    // Fallback template - redirect to template gallery
    header('Location: templates/index.php');
    exit;
}
?>
