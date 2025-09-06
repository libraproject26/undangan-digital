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
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'shimmer': 'shimmer 3s linear infinite',
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
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(139, 92, 246, 0.3)' },
                            '100%': { boxShadow: '0 0 40px rgba(139, 92, 246, 0.6)' },
                        },
                        shimmer: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(100%)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #F59E0B 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .elegant-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%238B5CF6' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .elegant-border {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(45deg, #8B5CF6, #EC4899, #F59E0B) border-box;
        }

        .shimmer-effect {
            position: relative;
            overflow: hidden;
        }

        .shimmer-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 3s linear infinite;
        }

        html, body {
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-100 font-body relative">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 elegant-pattern"></div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-br from-purple-200 to-pink-300 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-gradient-to-br from-pink-200 to-purple-300 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-gradient-to-br from-indigo-200 to-purple-300 rounded-full blur-2xl animate-float" style="animation-delay: 4s;"></div>

    <!-- Glow Effects -->
    <div class="absolute top-1/4 left-1/4 text-2xl text-purple-400 animate-glow">✨</div>
    <div class="absolute top-1/3 right-1/4 text-xl text-pink-400 animate-glow" style="animation-delay: 1s;">✨</div>
    <div class="absolute bottom-1/3 left-1/3 text-lg text-purple-400 animate-glow" style="animation-delay: 2s;">✨</div>

    <div class="relative z-10 flex flex-col items-center py-12 px-4 min-h-screen">
        
        <!-- Main Card -->
        <div class="max-w-2xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden card-hover animate-slideUp elegant-border">
            
            <!-- Header Section -->
            <div class="bg-gradient-to-br from-purple-500 to-pink-600 p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600/20 to-pink-600/20"></div>
                <div class="relative z-10">
                    <!-- Ornamental Border -->
                    <div class="w-24 h-1 bg-gradient-to-r from-purple-300 to-pink-300 mx-auto mb-6 rounded-full"></div>
                    
                    <h1 class="text-4xl md:text-5xl font-heading font-bold text-white mb-4">
                        Undangan Pernikahan
                    </h1>
                    
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full mx-auto mb-6 flex items-center justify-center shimmer-effect">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Couple Names -->
            <div class="p-8 text-center">
                <h2 class="text-5xl md:text-6xl font-heading font-bold gradient-text mb-4">
                    <?= $data['nama_pasangan'] ?>
                </h2>
                
                <div class="flex items-center justify-center mb-6">
                    <div class="w-12 h-px bg-gradient-to-r from-transparent via-purple-400 to-transparent"></div>
                    <i class="fas fa-heart text-purple-500 mx-4 text-xl"></i>
                    <div class="w-12 h-px bg-gradient-to-r from-transparent via-purple-400 to-transparent"></div>
                </div>
                
                <p class="text-lg text-gray-600 mb-2"><?= $data['nama_pria'] ?></p>
                <p class="text-sm text-gray-500 mb-4">Putra dari <?= $data['nama_ortu_pria'] ?></p>
                
                <div class="text-2xl text-purple-600 mb-4">&</div>
                
                <p class="text-lg text-gray-600 mb-2"><?= $data['nama_wanita'] ?></p>
                <p class="text-sm text-gray-500">Putri dari <?= $data['nama_ortu_wanita'] ?></p>
            </div>

            <!-- Date & Time -->
            <div class="px-8 py-6 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-purple-600 mr-3 text-xl"></i>
                        <h3 class="text-2xl font-heading font-bold text-gray-800">Tanggal & Waktu</h3>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-6 shadow-lg elegant-border">
                        <div class="text-3xl font-bold gradient-text mb-2"><?= $tanggal_formatted ?></div>
                        <div class="text-lg text-gray-600">Pukul <?= $waktu_formatted ?> WIB</div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="px-8 py-6">
                <div class="text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-map-marker-alt text-purple-600 mr-3 text-xl"></i>
                        <h3 class="text-2xl font-heading font-bold text-gray-800">Lokasi</h3>
                    </div>
                    
                    <div class="bg-gradient-to-r from-purple-100 to-pink-100 rounded-2xl p-6">
                        <div class="text-xl font-semibold text-gray-800 mb-2"><?= $data['lokasi'] ?></div>
                        <div class="text-gray-600"><?= $data['alamat_lengkap'] ?></div>
                    </div>
                </div>
            </div>

            <!-- Special Message -->
            <?php if (!empty($data['ucapan_khusus'])): ?>
            <div class="px-8 py-6 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="text-center">
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <h3 class="text-xl font-heading font-bold text-gray-800 mb-4">Pesan Khusus</h3>
                        <p class="text-gray-600 italic">"<?= $data['ucapan_khusus'] ?>"</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- RSVP Section -->
            <div class="px-8 py-6 bg-gradient-to-r from-purple-500 to-pink-600 text-white">
                <div class="text-center">
                    <h3 class="text-2xl font-heading font-bold mb-4">Konfirmasi Kehadiran</h3>
                    <p class="text-purple-100 mb-6">Mohon konfirmasi kehadiran Anda melalui:</p>
                    
                    <div class="space-y-3">
                        <a href="rsvp.php?slug=<?= $data['slug'] ?>" 
                           class="inline-block bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:bg-purple-50 transition duration-300 shadow-lg">
                            <i class="fas fa-check-circle mr-2"></i>
                            Form RSVP
                        </a>
                        
                        <div class="text-sm text-purple-100">
                            <i class="fas fa-phone mr-2"></i>
                            <?= $data['kontak_wa'] ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 py-6 text-center bg-gradient-to-r from-purple-100 to-pink-100">
                <p class="text-gray-600 mb-4">
                    Kehadiran dan doa restu Anda merupakan karunia yang tidak ternilai bagi kami 💕
                </p>
                <p class="text-lg font-semibold gradient-text">Terima Kasih 💕</p>
                <p class="text-sm text-gray-500 mt-2">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>
            </div>
        </div>

        <!-- Share Button -->
        <div class="mt-8 text-center">
            <button onclick="shareInvitation()" 
                    class="bg-gradient-to-r from-purple-500 to-pink-600 text-white px-8 py-3 rounded-full font-semibold hover:from-purple-600 hover:to-pink-700 transition duration-300 shadow-lg">
                <i class="fas fa-share-alt mr-2"></i>
                Bagikan Undangan
            </button>
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
                // Fallback untuk browser yang tidak mendukung Web Share API
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link undangan berhasil disalin!');
                });
            }
        }

        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-slideUp');
            elements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>
</html>
