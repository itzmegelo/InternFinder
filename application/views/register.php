<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Share Boost</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="icon" href="https://i.imgur.com/zi15QL3.png" type="image/png">
  <link rel="apple-touch-icon" href="https://i.imgur.com/zi15QL3.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#1E1A34">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins',
              'sans-serif'],
          },
          colors: {
            primary: '#8B5CF6',
            'primary-darker': '#7C3AED',
            'text-main': '#E5E7EB',
            'text-muted': '#9CA3AF',
            'bg-container': '#1E1A34',
            'bg-card': 'rgba(43, 42, 62, 0.7)',
            'border-color': 'rgba(139, 92, 246, 0.15)',
            'input-bg': 'rgba(43, 42, 62, 0.5)',
            'input-border': 'rgba(139, 92, 246, 0.3)',
            'nav-bg': 'rgba(30, 26, 52, 0.95)',
            'nav-border': 'rgba(139, 92, 246, 0.2)',
            'modal-bg': '#2a2744',
            'success-bg': '#166534',
            'success-text': '#dcfce7',
            'error-bg': '#991b1b',
            'error-text': '#fee2e2',
            'info-bg': 'rgba(139, 92, 246, 0.1)',
            'info-text': '#d8b4fe',
            'info-border': 'rgba(139, 92, 246, 0.3)',
            'warning-bg': 'rgba(245, 158, 11, 0.1)',
            'warning-text': '#fde68a',
            'warning-border': 'rgba(217, 119, 6, 0.3)',
            'video-bg': 'rgba(22, 163, 74, 0.1)',
            'video-text': '#bbf7d0',
            'video-border': 'rgba(21, 128, 61, 0.3)',
            'server-item-bg-hover': 'rgba(139, 92, 246, 0.1)',
            'status-active': '#22c55e',
            'status-offline': '#ef4444',
            'status-timeout': '#f59e0b',
          },
          boxShadow: {
            'primary-glow': '0 0 15px rgba(139, 92, 246, 0.3)',
            'card': '0 5px 20px rgba(0, 0, 0, 0.2)',
            'header': '0 2px 10px rgba(30, 26, 52, 0.2)',
            'nav': '0 -2px 10px rgba(30, 26, 52, 0.2)',
          }
        },
      },
    }
  </script>


</head>

<body class="bg-bg-container text-text-main font-poppins">
  <div class="max-w-md mx-auto min-h-screen pb-20 bg-bg-container shadow-lg flex flex-col relative overflow-x-hidden">



    <main class="flex-grow overflow-y-auto place-content-center p-5">
      <div class="content-sections text-center">
        <section id="home-section" class="content-section active">
          <form id="share-boost-form" class="space-y-5 mt-5" method="POST" action="<?php echo site_url('AuthController/register'); ?>">
            <div class="p-3 bg-bg-card rounded-xl border border-border-color shadow-card overflow-hidden">
              <h2 class="section-title">Hello There!</h2>
              <p class="text-center text-sm text-text-muted mt-2 px-2 leading-relaxed">
                Create your account
              </p>


              <div>
                <label for="urls" class="text-sm font-medium text-text-muted mb-1.5 block flex items-center gap-1.5">
                  <i data-lucide="user" class="w-4 h-4 text-primary"></i> Fullname
                </label>
                <input type="text" id="fullname" name="fullname" class="w-full p-3 rounded-lg border bg-input-bg border-input-border text-text-main placeholder-text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm" placeholder="Fullname..." required>
              </div>
              <div class="mt-3">
                <label for="urls" class="text-sm font-medium text-text-muted mb-1.5 block flex items-center gap-1.5">
                  <i data-lucide="user" class="w-4 h-4 text-primary"></i> Username
                </label>
                <input type="text" id="username" name="username" class="w-full p-3 rounded-lg border bg-input-bg border-input-border text-text-main placeholder-text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm" placeholder="Username..." required>
              </div>
              <div class="mt-3">
                <label for="urls" class="text-sm font-medium text-text-muted mb-1.5 block flex items-center gap-1.5">
                  <i data-lucide="mail" class="w-4 h-4 text-primary"></i> Email
                </label>
                <input type="email" id="email" name="email" class="w-full p-3 rounded-lg border bg-input-bg border-input-border text-text-main placeholder-text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm" placeholder="Email..." required>
              </div>
              <div class="mt-3">
                <label for="urls" class="text-sm font-medium text-text-muted mb-1.5 block flex items-center gap-1.5">
                  <i data-lucide="lock" class="w-4 h-4 text-primary"></i> Password
                </label>
                <input type="password" id="password" name="password" class="w-full p-3 rounded-lg border bg-input-bg border-input-border text-text-main placeholder-text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm" placeholder="Password..." required>
              </div>

              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
              value="<?php echo $this->security->get_csrf_hash(); ?>" />
          </div>
          <button type="submit" id="submit-button" class="w-full bg-primary text-white py-3 rounded-lg font-semibold text-base hover:bg-primary-darker transition-all duration-300 flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed shadow-md hover:shadow-lg shadow-primary/30 active:scale-[0.98] mt-3">

            <span class="button-text">Register</span>
          </button>
          <p class="text-center text-sm text-text-muted mt-2 px-2 leading-relaxed">
            <span>Already Have an Account?</span>
            <a class="text-primary" href="<?php echo site_url('AuthController/gotoLogIn'); ?>"><span>Log In</span></a>
          </p>
        </div>

      </form>
    </section>




  </div>
</main>

</div>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5625905404408423"
crossorigin="anonymous"></script>

<script>
const html = document.documentElement;
lucide.createIcons();
</script>
</body>

</html>
4