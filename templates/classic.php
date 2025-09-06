<?php
if (!isset($template_data)) {
    die('Data undangan tidak ditemukan!');
}
$data = $template_data;
$tanggal_formatted = $template_tanggal_formatted;
$waktu_formatted = $template_waktu_formatted;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan - <?= $data['nama_pasangan'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/png">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Playfair Display', 'serif'],
                        body: ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fadeIn': 'fadeIn 1s ease-in-out',
                        'slideUp': 'slideUp 0.8s ease-out',
                        'classic-glow': 'classicGlow 3s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        classicGlow: {
                            '0%': { boxShadow: '0 0 20px rgba(139, 69, 19, 0.3)' },
                            '100%': { boxShadow: '0 0 40px rgba(139, 69, 19, 0.6)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .classic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D4AF37' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .classic-border {
            border: 3px solid #D4AF37;
            border-radius: 20px;
            position: relative;
        }

        .classic-border::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 2px solid #8B4513;
            border-radius: 25px;
            z-index: -1;
        }

        .classic-text {
            background: linear-gradient(135deg, #8B4513 0%, #D4AF37 50%, #8B4513 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .classic-card {
            background: linear-gradient(135deg, #FFF8DC 0%, #F5F5DC 100%);
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.2);
        }

        .classic-ornament {
            position: relative;
        }

        .classic-ornament::before,
        .classic-ornament::after {
            content: '❦';
            position: absolute;
            color: #D4AF37;
            font-size: 2rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .classic-ornament::before {
            left: -40px;
        }

        .classic-ornament::after {
            right: -40px;
        }

        html, body {
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body class="classic-pattern min-h-screen py-8">
    
    <!-- Background Elements -->
    <div class="absolute top-10 left-10 text-6xl text-amber-200 animate-float">💌</div>
    <div class="absolute top-20 right-20 text-4xl text-amber-300 animate-float" style="animation-delay: 2s;">🌹</div>
    <div class="absolute bottom-20 left-20 text-5xl text-amber-200 animate-float" style="animation-delay: 4s;">💐</div>
    <div class="absolute bottom-10 right-10 text-3xl text-amber-300 animate-float" style="animation-delay: 1s;">✨</div>

    <div class="relative z-10 flex flex-col items-center py-12 px-4 min-h-screen">
        
        <!-- Main Card -->
        <div class="max-w-2xl w-full classic-card classic-border overflow-hidden animate-slideUp">
            
            <!-- Header Section -->
            <div class="bg-gradient-to-br from-amber-100 to-yellow-200 p-8 text-center relative">
                <div class="classic-ornament mb-6">
                    <h1 class="text-4xl md:text-5xl font-heading font-bold classic-text">
                        Wedding Invitation
                    </h1>
                </div>
                
                <div class="flex justify-center items-center mb-6">
                    <div class="w-20 h-px bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                    <div class="w-4 h-4 bg-amber-600 rounded-full mx-6"></div>
                    <div class="w-20 h-px bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                </div>
            </div>

            <!-- Couple Names -->
            <div class="p-8 text-center">
                <h2 class="text-5xl md:text-6xl font-heading font-bold classic-text mb-8">
                    <?= $data['nama_pasangan'] ?>
                </h2>
                
                <div class="flex items-center justify-center mb-8">
                    <div class="w-16 h-px bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                    <i class="fas fa-heart text-amber-600 mx-6 text-3xl animate-pulse"></i>
                    <div class="w-16 h-px bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 rounded-2xl p-6 border-2 border-amber-200">
                        <p class="text-2xl font-semibold classic-text"><?= $data['nama_pria'] ?></p>
                        <p class="text-sm text-amber-700">Putra dari <?= $data['nama_ortu_pria'] ?></p>
                    </div>
                    
                    <div class="text-4xl text-amber-600 animate-pulse">💕</div>
                    
                    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 rounded-2xl p-6 border-2 border-amber-200">
                        <p class="text-2xl font-semibold classic-text"><?= $data['nama_wanita'] ?></p>
                        <p class="text-sm text-amber-700">Putri dari <?= $data['nama_ortu_wanita'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="px-8 py-6 bg-gradient-to-r from-amber-50 to-yellow-50">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-heading font-bold classic-text">Tanggal & Waktu</h3>
                    </div>
                    
                    <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-amber-200 animate-classic-glow">
                        <div class="text-5xl font-bold classic-text mb-2"><?= $tanggal_formatted ?></div>
                        <div class="text-xl text-amber-700"><?= $waktu_formatted ?> WIB</div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="p-8 text-center">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-heading font-bold classic-text">Lokasi</h3>
                </div>
                
                <div class="bg-gradient-to-r from-amber-50 to-yellow-50 rounded-2xl p-6 border-2 border-amber-200">
                    <p class="text-xl font-semibold classic-text mb-2"><?= $data['lokasi'] ?></p>
                    <p class="text-amber-700"><?= $data['alamat_lengkap'] ?></p>
                </div>
            </div>

            <!-- Special Message -->
            <?php if (!empty($data['ucapan_khusus'])): ?>
            <div class="px-8 py-6 bg-gradient-to-r from-amber-100 to-yellow-100">
                <div class="text-center">
                    <div class="classic-ornament mb-4">
                        <h3 class="text-2xl font-heading font-bold classic-text">Ucapan Khusus</h3>
                    </div>
                    <p class="text-amber-800 leading-relaxed italic"><?= $data['ucapan_khusus'] ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- RSVP Section -->
            <div class="p-8 text-center bg-gradient-to-br from-amber-50 to-yellow-100">
                <h3 class="text-2xl font-heading font-bold classic-text mb-4">Konfirmasi Kehadiran</h3>
                <p class="text-amber-700 mb-6">Mohon konfirmasi kehadiran Anda melalui:</p>
                
                <div class="space-y-4">
                    <a href="rsvp.php?slug=<?= $data['slug'] ?>" class="inline-block bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 shadow-lg">
                        <i class="fas fa-check-circle mr-2"></i>Form RSVP
                    </a>
                    
                    <div class="flex justify-center space-x-4">
                        <a href="https://wa.me/<?= $data['kontak_wa'] ?>?text=Halo, saya akan hadir di acara pernikahan <?= $data['nama_pasangan'] ?>" target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:scale-105">
                            <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                        </a>
                        <a href="mailto:<?= $data['email'] ?>?subject=Konfirmasi Kehadiran - <?= $data['nama_pasangan'] ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:scale-105">
                            <i class="fas fa-envelope mr-2"></i>Email
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-6 text-center bg-gradient-to-r from-amber-200 to-yellow-300">
                <p class="text-amber-800 font-medium">Kehadiran dan doa restu Anda merupakan karunia yang tidak ternilai bagi kami 💕</p>
                <p class="text-amber-700 mt-2">Terima Kasih 💕</p>
                <p class="text-amber-600 mt-1">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>
            </div>
        </div>

        <!-- Share Button -->
        <div class="mt-8">
            <button onclick="shareInvitation()" class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 shadow-lg">
                <i class="fas fa-share-alt mr-2"></i>Bagikan Undangan
            </button>
        </div>
    </div>

    <script>
        function shareInvitation() {
            if (navigator.share) {
                navigator.share({
                    title: 'Undangan Pernikahan - <?= $data['nama_pasangan'] ?>',
                    text: 'Undangan pernikahan <?= $data['nama_pasangan'] ?> pada <?= $tanggal_formatted ?>',
                    url: window.location.href
                });
            } else {
                // Fallback untuk browser yang tidak support Web Share API
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link undangan telah disalin ke clipboard!');
                });
            }
        }
    </script>
</body>
</html>