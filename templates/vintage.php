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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Crimson+Text:wght@400;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/png">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Playfair Display', 'serif'],
                        body: ['Crimson Text', 'serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fadeIn': 'fadeIn 1s ease-in-out',
                        'slideUp': 'slideUp 0.8s ease-out',
                        'vintage-glow': 'vintageGlow 3s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        vintageGlow: {
                            '0%': { boxShadow: '0 0 20px rgba(139, 69, 19, 0.3)' },
                            '100%': { boxShadow: '0 0 40px rgba(139, 69, 19, 0.6)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .vintage-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23D2B48C' fill-opacity='0.1'%3E%3Cpath d='M40 40c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm20 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .vintage-card {
            background: linear-gradient(135deg, #F5F5DC 0%, #FAEBD7 100%);
            border: 4px solid #8B4513;
            border-radius: 0;
            position: relative;
            box-shadow: 0 25px 50px rgba(139, 69, 19, 0.3);
        }

        .vintage-card::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px solid #D2B48C;
            z-index: 1;
        }

        .vintage-text {
            color: #8B4513;
        }

        .vintage-accent {
            color: #A0522D;
        }

        .vintage-ornament {
            position: relative;
            display: inline-block;
        }

        .vintage-ornament::before,
        .vintage-ornament::after {
            content: '❦';
            position: absolute;
            color: #8B4513;
            font-size: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .vintage-ornament::before {
            left: -30px;
        }

        .vintage-ornament::after {
            right: -30px;
        }

        .vintage-border {
            border: 2px solid #8B4513;
            border-radius: 0;
            position: relative;
        }

        .vintage-border::before {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 1px solid #D2B48C;
            z-index: -1;
        }

        .vintage-section {
            border-left: 4px solid #8B4513;
            padding-left: 1.5rem;
            position: relative;
        }

        .vintage-section::before {
            content: '❦';
            position: absolute;
            left: -8px;
            top: 0;
            color: #8B4513;
            font-size: 1.2rem;
        }

        .vintage-button {
            background: #8B4513;
            color: #F5F5DC;
            border: 2px solid #8B4513;
            transition: all 0.3s ease;
        }

        .vintage-button:hover {
            background: #A0522D;
            border-color: #A0522D;
            transform: translateY(-2px);
        }

        html, body {
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body class="vintage-pattern min-h-screen py-8">
    
    <!-- Background Elements -->
    <div class="absolute top-10 left-10 text-5xl text-amber-300 animate-float">📜</div>
    <div class="absolute top-20 right-20 text-4xl text-amber-400 animate-float" style="animation-delay: 2s;">🏛️</div>
    <div class="absolute bottom-20 left-20 text-6xl text-amber-300 animate-float" style="animation-delay: 4s;">📚</div>
    <div class="absolute bottom-10 right-10 text-3xl text-amber-400 animate-float" style="animation-delay: 1s;">🕊️</div>

    <div class="relative z-10 flex flex-col items-center py-12 px-4 min-h-screen">
        
        <!-- Main Card -->
        <div class="max-w-2xl w-full vintage-card overflow-hidden animate-slideUp">
            
            <!-- Header Section -->
            <div class="p-8 text-center relative z-10">
                <div class="vintage-ornament mb-6">
                    <h1 class="text-3xl md:text-4xl font-heading font-bold vintage-text">
                        Wedding Invitation
                    </h1>
                </div>
                
                <div class="flex justify-center items-center mb-6">
                    <div class="w-16 h-px bg-vintage-text"></div>
                    <div class="w-3 h-3 bg-vintage-text mx-4"></div>
                    <div class="w-16 h-px bg-vintage-text"></div>
                </div>
            </div>

            <!-- Couple Names -->
            <div class="px-8 pb-6 text-center relative z-10">
                <h2 class="text-4xl md:text-5xl font-heading font-bold vintage-text mb-8">
                    <?= $data['nama_pasangan'] ?>
                </h2>
                
                <div class="space-y-6">
                    <div class="vintage-section">
                        <p class="text-xl font-semibold vintage-text"><?= $data['nama_pria'] ?></p>
                        <p class="text-sm vintage-accent">Putra dari <?= $data['nama_ortu_pria'] ?></p>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <div class="w-8 h-px bg-vintage-text"></div>
                        <i class="fas fa-heart text-vintage-text mx-4 text-2xl"></i>
                        <div class="w-8 h-px bg-vintage-text"></div>
                    </div>
                    
                    <div class="vintage-section">
                        <p class="text-xl font-semibold vintage-text"><?= $data['nama_wanita'] ?></p>
                        <p class="text-sm vintage-accent">Putri dari <?= $data['nama_ortu_wanita'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="px-8 py-6 bg-gradient-to-r from-amber-100 to-yellow-100 relative z-10">
                <div class="text-center">
                    <div class="vintage-ornament mb-4">
                        <h3 class="text-2xl font-heading font-bold vintage-text">Tanggal & Waktu</h3>
                    </div>
                    
                    <div class="vintage-border bg-white p-6 animate-vintage-glow">
                        <div class="text-3xl font-bold vintage-text mb-2"><?= $tanggal_formatted ?></div>
                        <div class="text-lg vintage-accent"><?= $waktu_formatted ?> WIB</div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="px-8 py-6 relative z-10">
                <div class="vintage-section">
                    <h3 class="text-xl font-heading font-bold vintage-text mb-4">Lokasi</h3>
                    <p class="text-lg font-semibold vintage-text mb-2"><?= $data['lokasi'] ?></p>
                    <p class="vintage-accent"><?= $data['alamat_lengkap'] ?></p>
                </div>
            </div>

            <!-- Special Message -->
            <?php if (!empty($data['ucapan_khusus'])): ?>
            <div class="px-8 py-6 bg-gradient-to-r from-amber-50 to-yellow-50 relative z-10">
                <div class="vintage-section">
                    <h3 class="text-lg font-heading font-bold vintage-text mb-4">Ucapan Khusus</h3>
                    <p class="vintage-accent leading-relaxed italic"><?= $data['ucapan_khusus'] ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- RSVP Section -->
            <div class="px-8 py-6 bg-gradient-to-br from-amber-100 to-yellow-100 relative z-10">
                <div class="text-center">
                    <div class="vintage-ornament mb-4">
                        <h3 class="text-xl font-heading font-bold vintage-text">Konfirmasi Kehadiran</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <a href="rsvp.php?slug=<?= $data['slug'] ?>" class="inline-block vintage-button px-8 py-3 font-semibold text-sm">
                            <i class="fas fa-check-circle mr-2"></i>Form RSVP
                        </a>
                        
                        <div class="flex justify-center space-x-4">
                            <a href="https://wa.me/<?= $data['kontak_wa'] ?>?text=Halo, saya akan hadir di acara pernikahan <?= $data['nama_pasangan'] ?>" target="_blank" class="vintage-button px-4 py-2 text-sm">
                                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                            </a>
                            <a href="mailto:<?= $data['email'] ?>?subject=Konfirmasi Kehadiran - <?= $data['nama_pasangan'] ?>" class="vintage-button px-4 py-2 text-sm">
                                <i class="fas fa-envelope mr-2"></i>Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-8 py-4 text-center bg-gradient-to-r from-amber-200 to-yellow-300 relative z-10">
                <div class="vintage-ornament mb-2">
                    <p class="vintage-text font-medium">Kehadiran dan doa restu Anda merupakan karunia yang tidak ternilai bagi kami</p>
                </div>
                <p class="vintage-accent text-sm">Terima Kasih</p>
                <p class="vintage-accent text-xs mt-1">Wassalamu'alaikum Warahmatullahi Wabarakatuh</p>
            </div>
        </div>

        <!-- Share Button -->
        <div class="mt-8">
            <button onclick="shareInvitation()" class="vintage-button px-6 py-3 font-semibold text-sm">
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
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link undangan telah disalin ke clipboard!');
                });
            }
        }
    </script>
</body>
</html>