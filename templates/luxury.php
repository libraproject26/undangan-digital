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
                        'sparkle': 'sparkle 2s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
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
                        sparkle: {
                            '0%, 100%': { opacity: '0.3', transform: 'scale(1)' },
                            '50%': { opacity: '1', transform: 'scale(1.2)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(212, 175, 55, 0.3)' },
                            '100%': { boxShadow: '0 0 30px rgba(212, 175, 55, 0.6)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #D4AF37 0%, #FFD700 50%, #D4AF37 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .luxury-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23D4AF37' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .gold-border {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(45deg, #D4AF37, #FFD700, #D4AF37) border-box;
        }

        .sparkle {
            position: relative;
        }

        html, body {
            overflow-x: hidden;
            overflow-y: auto;
        }

        .sparkle::before {
            content: '✨';
            position: absolute;
            top: -10px;
            right: -10px;
            animation: sparkle 2s ease-in-out infinite;
        }

        .crown-effect {
            background: linear-gradient(45deg, #D4AF37, #FFD700, #D4AF37);
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-amber-50 to-yellow-100 font-body relative">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 luxury-pattern"></div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-yellow-200 to-amber-300 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-gradient-to-br from-amber-200 to-yellow-300 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-gradient-to-br from-yellow-200 to-orange-300 rounded-full blur-2xl animate-float" style="animation-delay: 4s;"></div>

    <!-- Sparkle Effects -->
    <div class="absolute top-1/4 left-1/4 text-2xl text-yellow-400 animate-sparkle">✨</div>
    <div class="absolute top-1/3 right-1/4 text-xl text-yellow-400 animate-sparkle" style="animation-delay: 1s;">✨</div>
    <div class="absolute bottom-1/3 left-1/3 text-lg text-yellow-400 animate-sparkle" style="animation-delay: 2s;">✨</div>

    <div class="relative z-10 flex flex-col items-center py-12 px-4 min-h-screen">
        
        <!-- Main Card -->
        <div class="max-w-2xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden card-hover animate-slideUp gold-border">
            
            <!-- Header Section -->
            <div class="bg-gradient-to-br from-amber-100 to-yellow-200 p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-200/30 to-amber-200/30"></div>
                <div class="relative z-10">
                    <!-- Crown Icon -->
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 crown-effect rounded-full flex items-center justify-center sparkle">
                            <i class="fas fa-crown text-white text-3xl"></i>
                        </div>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl font-heading font-bold gradient-text mb-4">
                        Wedding Invitation
                    </h1>
                    
                    <div class="flex justify-center items-center mb-4">
                        <div class="w-16 h-px bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full mx-4"></div>
                        <div class="w-16 h-px bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
                    </div>
                </div>
            </div>

            <!-- Couple Names -->
            <div class="p-8 text-center">
                <h2 class="text-5xl md:text-6xl font-heading font-bold gradient-text mb-6 sparkle">
                    <?= $data['nama_pasangan'] ?>
                </h2>
                
                <div class="flex items-center justify-center mb-8">
                    <div class="w-12 h-px bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
                    <i class="fas fa-heart text-yellow-500 mx-4 text-2xl animate-pulse"></i>
                    <div class="w-12 h-px bg-gradient-to-r from-transparent via-yellow-500 to-transparent"></div>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-2xl p-6 border border-yellow-200">
                        <p class="text-2xl font-semibold text-gray-800"><?= $data['nama_pria'] ?></p>
                        <p class="text-sm text-gray-500">Putra dari <?= $data['nama_ortu_pria'] ?></p>
                    </div>
                    
                    <div class="text-4xl text-yellow-500 animate-pulse">💕</div>
                    
                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-2xl p-6 border border-yellow-200">
                        <p class="text-2xl font-semibold text-gray-800"><?= $data['nama_wanita'] ?></p>
                        <p class="text-sm text-gray-500">Putri dari <?= $data['nama_ortu_wanita'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="px-8 py-6 bg-gradient-to-r from-yellow-50 to-amber-50">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 crown-effect rounded-full flex items-center justify-center mr-4 sparkle">
                            <i class="fas fa-calendar-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-heading font-bold text-gray-800">Tanggal & Waktu</h3>
                    </div>
                    
                    <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-yellow-200 animate-glow">
                        <div class="text-5xl font-bold gradient-text mb-2"><?= $tanggal_formatted ?></div>
                        <div class="text-xl text-gray-600"><?= $waktu_formatted ?> WIB</div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="px-8 py-6">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 crown-effect rounded-full flex items-center justify-center mr-4 sparkle">
                            <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-heading font-bold text-gray-800">Lokasi</h3>
                    </div>
                    
                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-3xl p-8 border-2 border-yellow-200">
                        <h4 class="text-2xl font-semibold text-gray-800 mb-2"><?= $data['lokasi'] ?></h4>
                        <p class="text-gray-600"><?= $data['alamat_lengkap'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Special Message -->
            <?php if (!empty($data['ucapan_khusus'])): ?>
            <div class="px-8 py-6 bg-gradient-to-r from-yellow-100 to-amber-100">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-12 h-12 crown-effect rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-quote-left text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-heading font-bold text-gray-800">Ucapan Khusus</h3>
                    </div>
                    <div class="bg-white rounded-2xl p-6 border border-yellow-200">
                        <p class="text-gray-700 italic leading-relaxed text-lg"><?= $data['ucapan_khusus'] ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- RSVP Section -->
            <div class="px-8 py-6 bg-gradient-to-br from-yellow-500 to-amber-600">
                <div class="text-center">
                    <h3 class="text-3xl font-heading font-bold text-white mb-4">Konfirmasi Kehadiran</h3>
                    <p class="text-yellow-100 mb-6">Mohon konfirmasi kehadiran Anda melalui:</p>
                    
                    <div class="space-y-6">
                        <a href="rsvp.php?slug=<?= $data['slug'] ?>" 
                           class="inline-block bg-white text-yellow-600 px-10 py-5 rounded-full font-bold text-xl hover:bg-yellow-50 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 hover:scale-105 sparkle">
                            <i class="fas fa-check-circle mr-3 text-2xl"></i>
                            Form RSVP
                        </a>
                        
                        <div class="text-yellow-100 text-lg">
                            <p>Kehadiran dan doa restu Anda merupakan karunia yang tidak ternilai bagi kami</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 py-6 text-center bg-white">
                <p class="text-gray-600 mb-4 text-lg">Terima Kasih</p>
                <div class="flex justify-center space-x-4 text-3xl">
                    <span class="animate-pulse">👑</span>
                    <span class="animate-pulse" style="animation-delay: 0.5s;">💎</span>
                    <span class="animate-pulse" style="animation-delay: 1s;">👑</span>
                </div>
                <p class="text-gray-500 text-sm mt-4">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>
                
                <!-- Share Button -->
                <div class="mt-6">
                    <button onclick="shareInvitation()" 
                            class="crown-effect text-white px-8 py-4 rounded-full font-bold text-lg hover:scale-105 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:-translate-y-1 sparkle">
                        <i class="fas fa-share-alt mr-3 text-xl"></i>
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
