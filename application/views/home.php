<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>FlickToolz</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="icon" href="/img/logo.png" type="image/png">
  <link rel="apple-touch-icon" href="/img/logo.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#1E1A34">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
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

    <header class="p-4 border-b bg-nav-bg border-nav-border sticky top-0 z-40 backdrop-blur-md shadow-header">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2.5">
          <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="w-8 h-8 bg-primary p-1 rounded-lg">
          <h1 class="text-xl font-semibold text-inherit">Intern Finder</h1>
          <span class="text-xs font-medium text-primary bg-primary/10 px-2 py-0.5 rounded-full">v1.0</span>
        </div>
        <div class="flex items-center space-x-3">
          <button class="text-text-muted hover:text-primary transition-colors p-1.5 bg-primary/10 rounded-lg">
            <i data-lucide="settings-2" class="w-5 h-5 text-primary"></i>
          </button>
          <button id="menu-button" class="text-text-muted hover:text-primary transition-colors">
            <i data-lucide="menu" class="w-5 h-5"></i>
          </button>
        </div>
      </div>
    </header>

    <main class="flex-grow overflow-y-auto p-5">
      <div class="content-sections">
        <section id="home-section" class="content-section active">
          <form id="share-boost-form" class="space-y-5 mt-3" method="GET">
            <div>
              <label for="urls" class="text-sm font-medium text-text-muted mb-1.5 block flex items-center gap-1.5">
                <i data-lucide="search" class="w-4 h-4 text-primary"></i> Search
              </label>
              <input type="text" id="search" name="search"
              class="w-full p-3 rounded-lg border bg-input-bg border-input-border text-text-main placeholder-text-muted focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
              placeholder="Type Here..." required>
            </div>
            <button type="submit" id="submit-button"
              class="w-full bg-primary text-white py-3 rounded-lg font-semibold text-base hover:bg-primary-darker transition-all duration-300 flex items-center justify-center gap-2 disabled:opacity-60 disabled:cursor-not-allowed shadow-md hover:shadow-lg shadow-primary/30 active:scale-[0.98] mt-1">
              <span class="button-text">Search</span>
            </button>
          </form>

          <div class="mt-2">
            <?php foreach ($interns as $row) {
              ?>
              <div class="flex flex-col gap-3 p-3.5 bg-info-bg rounded-lg border border-info-border shadow-sm mb-3">
                <div class="card w-full">
                  <div class="component_form_group">
                    <div class="form-group">
                      <div class="flex items-start gap-3 p-2">
                        <i data-lucide="building" class="w-5 h-5 text-primary flex-shrink-0 mt-0.5"></i>
                        <h4 class="text-lg text-info-text">
                          <?php echo $row->company_name; ?>
                        </h4>
                      </div>
                      <p class="text-sm">
                        <?php echo $row->description; ?>
                      </p>
                      <p class="text-xs text-gray-500">
                        📍 <?php echo $row->location; ?>
                      </p>
                    </div>
                  </div>

                  <!-- Full-width Google Map -->
                  <div class="mt-3 w-full">
                    <iframe
                      class="w-full rounded-xl"
                      height="200"
                      style="border:0;"
                      loading="lazy"
                      allowfullscreen
                      referrerpolicy="no-referrer-when-downgrade"
                      src="https://www.google.com/maps?q=<?php echo urlencode($row->location); ?>&output=embed">
                    </iframe>
                  </div>
                </div>
              </div>
              <?php
            } ?>
          </div>
        </section>

        <section id="services-section" class="content-section">
          <h2 class="section-title">Files</h2>
          <div id="services-list" class="space-y-4">
            <div class="mt-1">
              <?php foreach ($result_files as $rows) {
                ?>
                <div class="bg-gradient-to-br from-slate-800/90 to-slate-700/80 rounded-xl border border-green-500/50 shadow-lg p-6 flex flex-col text-center transition-all duration-300 ease-out hover:shadow-green-500/30 hover:scale-[1.03] hover:border-green-400 backdrop-blur-sm mb-2">
                  <!-- PDF Preview -->
                  <iframe
                    src="<?php echo base_url('assets/uploads/' . $rows->file_name) ?>#toolbar=0"
                    class="w-full rounded-lg mb-3"
                    style="height: 300px;"
                    frameborder="0">
                  </iframe>
                  <!-- Title Below PDF -->
                  <h3 class="text-white text-lg font-semibold mb-3">
                    <?php echo $rows->title; ?>
                  </h3>
                  <a href="<?php echo base_url('assets/uploads/' . $rows->file_name) ?>" download
                  class="w-full mt-2 bg-green-600 hover:bg-green-700 border-green-500 flex items-center justify-center gap-2 text-white px-4 py-2 rounded">
                  <i data-lucide="download" class="w-4 h-4"></i> Download PDF
                </a>

                </div>
                <?php
              } ?>

            </div>
          </div>
        </section>

        <section id="notifications-section" class="content-section">
          <h2 class="section-title">Notifications</h2>
          <div id="notifications-list" class="space-y-4">
            <div class="mt-2">
              <?php if ($results->num_rows > 0): ?>
              <?php

              while ($rows = $results->fetch_assoc()): ?>
              <div class="flex items-start gap-3 p-3.5 bg-info-bg rounded-lg border border-info-border shadow-sm mb-3">
                <div class="card">
                  <form action="" method="post">
                    <div class="component_form_group">
                      <div class="form-group">
                        <p class="text-sm text-info-text">
                          <?php echo htmlspecialchars($rows['content']); ?>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php endwhile; ?>
              <?php else : ?>
              <p>
                No notifications available.
              </p>
              <?php endif; ?>
            </div>
          </div>
        </section>
      </div>
    </main>

    <nav class="fixed bottom-0 left-0 right-0 bg-nav-bg border-t border-nav-border max-w-md mx-auto backdrop-blur-md z-50 shadow-nav">
      <div class="relative">
        <div class="flex justify-around items-center px-3 py-2.5">
          <a href="#" data-section="home" class="nav-item flex flex-col items-center text-primary p-2 w-1/3">
            <i data-lucide="home" class="w-5 h-5 mb-0.5"></i><span class="text-xs font-medium">Home</span>
          </a>
          <a href="#" data-section="services" class="nav-item flex flex-col items-center text-text-muted p-2 w-1/3 hover:text-primary transition-colors">
            <i data-lucide="file" class="w-5 h-5 mb-0.5"></i><span class="text-xs font-medium">Files</span>
            <a href="#" data-section="notifications" class="nav-item flex flex-col items-center text-text-muted p-2 w-1/3 hover:text-primary transition-colors">
              <i data-lucide="bell" class="w-5 h-5 mb-0.5"></i><span class="text-xs font-medium">Notifications</span>
            </a>
          </div>
          <div class="nav-indicator absolute bottom-0 left-0 h-1 bg-primary rounded-t-full" style="width: 33.33%"></div>
        </div>
      </nav>

      <div id="responseModal" class="modal">
        <div class="modal-content flex flex-col items-center gap-3">
          <div id="modal-icon"></div>
          <div id="responseMessage" class="text-sm font-medium"></div>
        </div>
      </div>

      <div id="serverModal" class="modal">
        <div class="modal-content text-left">
          <button type="button" class="modal-close-button" aria-label="Close server selection" onclick="document.getElementById('serverModal').style.display='none'">
            <i data-lucide="x" class="w-4 h-4 text-text-muted"></i>
          </button>
          <h3 class="text-lg font-semibold mb-4 text-center">Select Server</h3>
          <div id="server-list" class="space-y-2 max-h-[40vh] overflow-y-auto pr-2">
          </div>
        </div>
      </div>

      <div id="apkDownloadModal" class="modal">
        <div class="modal-content text-center flex flex-col items-center gap-4">
          <button type="button" class="modal-close-button" aria-label="Close APK Download" onclick="handleApkModalClose('later')">
            <i data-lucide="x" class="w-4 h-4 text-text-muted"></i>
          </button>
          <img src="https://i.imgur.com/zi15QL3.png" alt="Share Booster Logo" class="w-16 h-16 mb-2 rounded-lg bg-primary p-2">
          <h3 class="text-lg font-semibold text-text-main">Share Booster</h3>
          <p class="text-sm text-text-muted px-2">
            Do you want more people to see and share your Facebook post? Download this app first. It's an easy to use use tool that helps boost shares on your Facebook posts.
          </p>
          <a href="Share Booster.apk" download="Share Booster.apk" class="w-full bg-primary text-white py-2.5 px-4 rounded-lg font-semibold text-sm hover:bg-primary-darker transition-all duration-300 flex items-center justify-center gap-2 shadow-md hover:shadow-lg shadow-primary/30 active:scale-[0.98]">
            <i data-lucide="download" class="w-4 h-4"></i>
            Download APK
          </a>
          <button type="button" class="text-xs text-text-muted hover:text-text-main underline mt-2" onclick="handleApkModalClose('later')">
            Maybe Later
          </button>
        </div>
      </div>

      <div id="menu-overlay" class="fixed inset-0 bg-black/60 z-[55] hidden opacity-0"></div>
      <div id="side-menu" class="fixed top-0 left-0 bottom-0 w-72 bg-nav-bg shadow-lg z-[60] flex flex-col p-5 border-r border-nav-border">
        <div class="flex items-center justify-between mb-6">
          <div class="flex items-center gap-2.5">
            <img src="https://i.imgur.com/zi15QL3.png" alt="Logo" class="w-8 h-8 bg-primary p-1 rounded-lg">
            <h2 class="text-lg font-semibold text-inherit">Menu</h2>
          </div>
          <button id="close-menu-button" class="text-text-muted hover:text-primary p-1 rounded-full hover:bg-white/10">
            <i data-lucide="x" class="w-5 h-5"></i>
          </button>
        </div>
        <nav class="flex-grow space-y-2">
          <a href="#" data-section="home" class="side-menu-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-main bg-primary/10 font-medium">
            <i data-lucide="home" class="w-5 h-5 text-primary"></i>
            <span>Home</span>
          </a>
          <a href="#" data-section="tutorial" class="side-menu-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-muted hover:text-text-main hover:bg-white/10 transition-colors">
            <i data-lucide="file" class="w-5 h-5"></i>
            <span>Files</span>
          </a>
          <a href="#" data-section="notifications" class="side-menu-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-text-muted hover:text-text-main hover:bg-white/10 transition-colors">
            <i data-lucide="bell" class="w-5 h-5"></i>
            <span>Notify</span>
          </a>
        </nav>
        <div class="mt-auto pt-4 border-t border-nav-border">
          <a href="https://www.facebook.com/share/19MBhHmLQ5/" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center gap-2 w-full bg-primary/10 text-primary py-2.5 px-4 rounded-lg font-semibold text-sm hover:bg-primary/20 transition-all duration-300 shadow-sm active:scale-[0.98]">
            <i data-lucide="code" class="w-4 h-4"></i>
            Facebook Page
          </a>
        </div>
      </div>


    </div>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5625905404408423"
      crossorigin="anonymous"></script>

    <script>
      const html = document.documentElement;
      lucide.createIcons();

      const serverDefinitions = {
        server1: {
          name: "Server 1",
          url: 'https://share-5kpv.onrender.com'
        },
        server2: {
          name: "Server 2",
          url: 'https://server-2-aggj.onrender.com'
        },
        server3: {
          name: "Server 3",
          url: 'https://server-3-p6lg.onrender.com'
        }
      };




      const serverSelectButtonText = document.getElementById('server-select-button-text');
      const selectedServerInput = document.getElementById('selectedServer');
      const serverListContainer = document.getElementById('server-list');
      const serverModal = document.getElementById('serverModal');
      const responseModal = document.getElementById('responseModal');
      const responseMessageElement = document.getElementById('responseMessage');
      const responseModalIconElement = document.getElementById('modal-icon');
      const apkDownloadModal = document.getElementById('apkDownloadModal');
      const form = document.getElementById('share-boost-form');
      const menuButton = document.getElementById('menu-button');
      const sideMenu = document.getElementById('side-menu');
      const menuOverlay = document.getElementById('menu-overlay');
      const closeMenuButton = document.getElementById('close-menu-button');
      const sideMenuItems = document.querySelectorAll('.side-menu-item');
      const navItems = document.querySelectorAll('.nav-item');
      const navIndicator = document.querySelector('.nav-indicator');
      const contentSections = document.querySelectorAll('.content-section');

      let intervalCheck;
      let currentSelectedServer = null;

      function handleApkModalClose(action) {
        const oneHourInMillis = 1 * 60 * 60 * 1000;
        const dismissUntilTimestamp = Date.now() + oneHourInMillis;
        localStorage.setItem('apkPopupDismissedUntil', dismissUntilTimestamp.toString());
        localStorage.removeItem('apkPopupDismissedPermanently');
        console.log(`APK Popup: Dismissed via '${action}' until ${new Date(dismissUntilTimestamp).toLocaleString()}`);

        if (apkDownloadModal) {
          apkDownloadModal.style.display = 'none';
        }
      }






      const navItemCount = navItems.length;
      const indicatorWidthPercent = 100 / navItemCount;
      if (navIndicator) {
        navIndicator.style.width = `${indicatorWidthPercent}%`;
      }


      function setActiveSection(sectionName) {
        const targetSectionId = `${sectionName}-section`;
        const targetSection = document.getElementById(targetSectionId);

        contentSections.forEach(section => section.classList.remove('active'));
        if (targetSection) {
          targetSection.classList.add('active');
        }

        navItems.forEach((navItem, index) => {
          if (navItem.dataset.section === sectionName) {
            navItem.classList.remove('text-text-muted');
            navItem.classList.add('text-primary');
            if (navIndicator) {
              navIndicator.style.transform = `translateX(${index * 100}%)`;
            }
          } else {
            navItem.classList.remove('text-primary');
            navItem.classList.add('text-text-muted');
          }
        });

        sideMenuItems.forEach((sideItem) => {
          const iconElement = sideItem.querySelector('i[data-lucide]') || sideItem.querySelector('svg');

          if (sideItem.dataset.section === sectionName) {
            sideItem.classList.add('text-text-main', 'bg-primary/10', 'font-medium');
            sideItem.classList.remove('text-text-muted');
            if (iconElement) {
              iconElement.classList.add('text-primary');
            }
          } else {
            sideItem.classList.remove('text-text-main', 'bg-primary/10', 'font-medium');
            sideItem.classList.add('text-text-muted');
            if (iconElement) {
              iconElement.classList.remove('text-primary');
            }
          }
        });

        closeSideMenu();
      }

      navItems.forEach((item) => {
        item.addEventListener('click', function(e) {
          e.preventDefault();
          setActiveSection(this.dataset.section);
        });
      });

      sideMenuItems.forEach((item) => {
        item.addEventListener('click', function(e) {
          e.preventDefault();
          setActiveSection(this.dataset.section);
        });
      });

      function openSideMenu() {
        menuOverlay.classList.remove('hidden');
        requestAnimationFrame(() => {
          sideMenu.classList.add('open');
          menuOverlay.classList.remove('opacity-0');
        });
      }

      function closeSideMenu() {
        sideMenu.classList.remove('open');
        menuOverlay.classList.add('opacity-0');
        setTimeout(() => {
          menuOverlay.classList.add('hidden');
        },
          300);
      }

      if (menuButton) menuButton.addEventListener('click', openSideMenu);
      if (closeMenuButton) closeMenuButton.addEventListener('click', closeSideMenu);
      if (menuOverlay) menuOverlay.addEventListener('click', closeSideMenu);

    </script>
  </body>

</html>