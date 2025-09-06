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
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
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
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .geometric-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23667eea' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        html, body {
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 font-body relative">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 geometric-bg"></div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-blue-200 to-purple-300 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-gradient-to-br from-purple-200 to-pink-300 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-gradient-to-br from-indigo-200 to-blue-300 rounded-full blur-2xl animate-float" style="animation-delay: 4s;"></div>

    <div class="relative z-10 flex flex-col items-center py-12 px-4 min-h-screen">
        
        <!-- Main Card -->
        <div class="max-w-2xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden card-hover animate-slideUp">
            
            <!-- Header Section -->
            <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20"></div>
                <div class="relative z-10">
                    <!-- Geometric Pattern -->
                    <div class="flex justify-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-heart text-white text-2xl"></i>
                        </div>
                    </div>
                    
                    <h1 class="text-3xl md:text-4xl font-heading font-bold text-white mb-4">
                        Wedding Invitation
                    </h1>
                    
                    <div class="w-24 h-px bg-white/50 mx-auto"></div>
                </div>
            </div>

            <!-- Couple Names -->
            <div class="p-8 text-center">
                <h2 class="text-5xl md:text-6xl font-heading font-bold gradient-text mb-6">
                    <?= $data['nama_pasangan'] ?>
                </h2>
                
                <div class="flex items-center justify-center mb-8">
                    <div class="w-8 h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent"></div>
                    <div class="w-3 h-3 bg-blue-400 rounded-full mx-4"></div>
                    <div class="w-8 h-px bg-gradient-to-r from-transparent via-blue-400 to-transparent"></div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-xl font-semibold text-gray-800"><?= $data['nama_pria'] ?></p>
                        <p class="text-sm text-gray-500">Putra dari <?= $data['nama_ortu_pria'] ?></p>
                    </div>
                    
                    <div class="text-3xl text-blue-500">×</div>
                    
                    <div>
                        <p class="text-xl font-semibold text-gray-800"><?= $data['nama_wanita'] ?></p>
                        <p class="text-sm text-gray-500">Putri dari <?= $data['nama_ortu_wanita'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="px-8 py-6 bg-gradient-to-r from-blue-50 to-purple-50">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-gray-800">Tanggal & Waktu</h3>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100">
                        <div class="text-4xl font-bold gradient-text mb-2"><?= $tanggal_formatted ?></div>
                        <div class="text-lg text-gray-600"><?= $waktu_formatted ?> WIB</div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="px-8 py-6">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-gray-800">Lokasi</h3>
                    </div>
                    
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-purple-100">
                        <h4 class="text-xl font-semibold text-gray-800 mb-2"><?= $data['lokasi'] ?></h4>
                        <p class="text-gray-600"><?= $data['alamat_lengkap'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Special Message -->
            <?php if (!empty($data['ucapan_khusus'])): ?>
            <div class="px-8 py-6 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-quote-left text-white"></i>
                        </div>
                        <h3 class="text-xl font-heading font-bold text-gray-800">Ucapan Khusus</h3>
                    </div>
                    <p class="text-gray-700 italic leading-relaxed"><?= $data['ucapan_khusus'] ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- RSVP Section -->
            <div class="px-8 py-6 bg-gradient-to-br from-blue-500 to-purple-600">
                <div class="text-center">
                    <h3 class="text-2xl font-heading font-bold text-white mb-4">Konfirmasi Kehadiran</h3>
                    <p class="text-blue-100 mb-6">Mohon konfirmasi kehadiran Anda melalui:</p>
                    
                    <div class="space-y-4">
                        <a href="rsvp.php?slug=<?= $data['slug'] ?>" 
                           class="inline-block bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-check-circle mr-2"></i>
                            Form RSVP
                        </a>
                        
                        <div class="text-blue-100 text-sm">
                            <p>Kehadiran dan doa restu Anda merupakan karunia yang tidak ternilai bagi kami</p>
                        </div>
                    </div>
    </div>
  </div>

            <!-- Footer -->
            <div class="px-8 py-6 text-center bg-white">
                <p class="text-gray-600 mb-4">Terima Kasih</p>
                <div class="flex justify-center space-x-3 text-2xl">
                    <span class="animate-pulse-slow">💙</span>
                    <span class="animate-pulse-slow" style="animation-delay: 0.5s;">💜</span>
                    <span class="animate-pulse-slow" style="animation-delay: 1s;">💙</span>
                </div>
                <p class="text-gray-500 text-sm mt-4">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>
                
                <!-- Share Button -->
                <div class="mt-6">
                    <button onclick="shareInvitation()" 
                            class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-full font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-share-alt mr-2"></i>
                        Bagikan Undangan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function shareInvitation() {
            if (navigator.share) {
                navigator.share({
                    title: 'Undangan Pernikahan - <?= $data['nama_pasangan'] ?>',
                    text: 'Undangan pernikahan <?= $data['nama_pasangan'] ?>',
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

        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
