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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/png">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Inter', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'fadeIn': 'fadeIn 1s ease-in-out',
                        'slideUp': 'slideUp 0.8s ease-out',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'minimalist-glow': 'minimalistGlow 4s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        minimalistGlow: {
                            '0%': { boxShadow: '0 0 20px rgba(107, 114, 128, 0.1)' },
                            '100%': { boxShadow: '0 0 40px rgba(107, 114, 128, 0.2)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .minimalist-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23f3f4f6' fill-opacity='0.3'%3E%3Cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .minimalist-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .minimalist-text {
            color: #374151;
        }

        .minimalist-accent {
            color: #6b7280;
        }

        .minimalist-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, #d1d5db, transparent);
        }

        .minimalist-dot {
            width: 4px;
            height: 4px;
            background: #6b7280;
            border-radius: 50%;
        }

        .minimalist-section {
            border-left: 3px solid #e5e7eb;
            padding-left: 1rem;
        }

        .minimalist-button {
            background: #374151;
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .minimalist-button:hover {
            background: #1f2937;
            transform: translateY(-2px);
        }

        html, body {
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body class="minimalist-pattern min-h-screen py-8">
    
    <div class="relative z-10 flex flex-col items-center py-12 px-4 min-h-screen">
        
        <!-- Main Card -->
        <div class="max-w-2xl w-full minimalist-card rounded-lg overflow-hidden animate-slideUp">
            
            <!-- Header Section -->
            <div class="p-12 text-center">
                <div class="minimalist-line w-24 mx-auto mb-8"></div>
                
                <h1 class="text-3xl font-heading font-light minimalist-text mb-4 tracking-wider">
                    WEDDING INVITATION
                </h1>
                
                <div class="minimalist-line w-16 mx-auto mb-8"></div>
            </div>

            <!-- Couple Names -->
            <div class="px-12 pb-8 text-center">
                <h2 class="text-4xl font-heading font-light minimalist-text mb-12 tracking-wide">
                    <?= $data['nama_pasangan'] ?>
                </h2>
                
                <div class="space-y-8">
                    <div class="minimalist-section">
                        <p class="text-xl font-light minimalist-text"><?= $data['nama_pria'] ?></p>
                        <p class="text-sm minimalist-accent mt-1">Putra dari <?= $data['nama_ortu_pria'] ?></p>
                    </div>
                    
                    <div class="flex items-center justify-center">
                        <div class="minimalist-dot"></div>
                    </div>
                    
                    <div class="minimalist-section">
                        <p class="text-xl font-light minimalist-text"><?= $data['nama_wanita'] ?></p>
                        <p class="text-sm minimalist-accent mt-1">Putri dari <?= $data['nama_ortu_wanita'] ?></p>
                    </div>
                </div>
            </div>

            <!-- Date & Time -->
            <div class="px-12 py-8 bg-gray-50">
                <div class="text-center">
                    <div class="minimalist-line w-20 mx-auto mb-6"></div>
                    
                    <div class="space-y-4">
                        <div class="text-3xl font-light minimalist-text"><?= $tanggal_formatted ?></div>
                        <div class="text-lg minimalist-accent"><?= $waktu_formatted ?> WIB</div>
                    </div>
                </div>
            </div>

            <!-- Location -->
            <div class="px-12 py-8">
                <div class="minimalist-section">
                    <div class="minimalist-line w-16 mb-4"></div>
                    <p class="text-lg font-light minimalist-text mb-2"><?= $data['lokasi'] ?></p>
                    <p class="text-sm minimalist-accent"><?= $data['alamat_lengkap'] ?></p>
                </div>
            </div>

            <!-- Special Message -->
            <?php if (!empty($data['ucapan_khusus'])): ?>
            <div class="px-12 py-8 bg-gray-50">
                <div class="minimalist-section">
                    <div class="minimalist-line w-12 mb-4"></div>
                    <p class="text-sm minimalist-accent leading-relaxed"><?= $data['ucapan_khusus'] ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- RSVP Section -->
            <div class="px-12 py-8 bg-gray-100">
                <div class="text-center">
                    <div class="minimalist-line w-20 mx-auto mb-6"></div>
                    
                    <h3 class="text-lg font-light minimalist-text mb-6">Konfirmasi Kehadiran</h3>
                    
                    <div class="space-y-4">
                        <a href="rsvp.php?slug=<?= $data['slug'] ?>" class="inline-block minimalist-button px-8 py-3 rounded-sm font-light text-sm tracking-wide">
                            FORM RSVP
                        </a>
                        
                        <div class="flex justify-center space-x-6">
                            <a href="https://wa.me/<?= $data['kontak_wa'] ?>?text=Halo, saya akan hadir di acara pernikahan <?= $data['nama_pasangan'] ?>" target="_blank" class="text-sm minimalist-accent hover:text-gray-800 transition">
                                WhatsApp
                            </a>
                            <a href="mailto:<?= $data['email'] ?>?subject=Konfirmasi Kehadiran - <?= $data['nama_pasangan'] ?>" class="text-sm minimalist-accent hover:text-gray-800 transition">
                                Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="px-12 py-6 text-center">
                <div class="minimalist-line w-16 mx-auto mb-4"></div>
                <p class="text-xs minimalist-accent">Kehadiran dan doa restu Anda merupakan karunia yang tidak ternilai bagi kami</p>
                <p class="text-xs minimalist-accent mt-2">Terima Kasih</p>
            </div>
        </div>

        <!-- Share Button -->
        <div class="mt-8">
            <button onclick="shareInvitation()" class="minimalist-button px-6 py-3 rounded-sm font-light text-sm tracking-wide">
                BAGIKAN UNDANGAN
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