<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Supportify - Témoignages</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .carousel-item:not(.active) {
      display: none;
    }
    .carousel-item.active {
      display: block;
    }
  </style>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'bleuciel': '#052485'
          }
        }
      }
    }
  </script>
   <style>
         @media (max-width: 768px) {
            header {
            flex-direction: column;
            padding: 15px 0;
        }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
 
 @include('partials.navbar') 

  <!-- Hero -->
  <section class="bg-bleuciel text-white text-center py-20">
    <h2 class="text-4xl font-bold mb-4">Ce que nos clients disent</h2>
    <p class="text-lg max-w-2xl mx-auto">Découvrez les témoignages de ceux qui ont transformé leur support client avec Supportify.</p>
  </section>

  <!-- Témoignages Carrousel -->
  <section class="max-w-7xl mx-auto px-6 py-16">
    <div class="relative">
      <div id="carousel">
        <!-- Témoignage 1 -->
        <div class="carousel-item active">
          <div class="bg-white rounded-2xl shadow-lg p-8 mx-4 flex flex-col md:flex-row items-center gap-6">
            <img src="img.jpg" alt="Client 1" class="w-20 h-20 rounded-full shadow-md">
            <div class="text-center md:text-left">
              <p class="text-gray-600 italic mb-4">"Supportify a révolutionné notre gestion des tickets. Le tableau de bord intuitif nous a permis de réduire les temps de réponse de 40% !"</p>
              <p class="text-bleuciel font-semibold">Nada Zirari</p>
              <p class="text-gray-500 text-sm">Responsable Support, TechTrend</p>
              <div class="flex justify-center md:justify-start mt-2">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
              </div>
            </div>
          </div>
        </div>

        <!-- Témoignage 2 -->
        <div class="carousel-item">
          <div class="bg-white rounded-2xl shadow-lg p-8 mx-4 flex flex-col md:flex-row items-center gap-6">
            <img src="photo.jpeg" alt="Client 2" class="w-24 h-24 rounded-full shadow-md">
            <div class="text-center md:text-left">
              <p class="text-gray-600 italic mb-4">"Grâce à Supportify, notre équipe collabore plus efficacement. Les dashboards nous ont aidé à optimiser nos processus et à améliorer la satisfaction client."</p>
              <p class="text-bleuciel font-semibold">Ikram </p>
              <p class="text-gray-500 text-sm">Directeur des Opérations, InnoSoft</p>
              <div class="flex justify-center md:justify-start mt-2">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
              </div>
            </div>
          </div>
        </div>

        <!-- Témoignage 3 -->
        <div class="carousel-item">
          <div class="bg-white rounded-2xl shadow-lg p-8 mx-4 flex flex-col md:flex-row items-center gap-6">
            <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="Client 3" class="w-24 h-24 rounded-full shadow-md">
            <div class="text-center md:text-left">
              <p class="text-gray-600 italic mb-4">"Les rapports personnalisés de Supportify nous ont donné une visibilité incroyable sur nos performances. Un outil indispensable pour notre croissance."</p>
              <p class="text-bleuciel font-semibold">Iness</p>
              <p class="text-gray-500 text-sm">Manager Support Client, GrowEasy</p>
              <div class="flex justify-center md:justify-start mt-2">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c-.784.57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.97z"/></svg>
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.357 2.44a1 1 0 00-.364 1.118l1.287 3.97c.3 .921-.755 1.688-1.54 1.118l-3.357-2.44a1 1 0 00-1.175 0l-3.357 2.44c\n",
              "c-.784 .57-1.838-.197-1.54-1.118l1.287-3.97a1 1 0 00-.364-1.118L2.98 9.397c-.784-.57-.381-1.81 .588-1.81h4.15a1 1 0 00 .95-.69l1.286-3.97z"/></svg>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Boutons de navigation du carrousel -->
      <button id="prev" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-bleuciel text-white p-3 rounded-full hover:bg-opacity-80 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
      </button>
      <button id="next" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-bleuciel text-white p-3 rounded-full hover:bg-opacity-80 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>

    <!-- Indicateurs de carrousel -->
    <div class="flex justify-center mt-6 space-x-2">
      <span class="w-3 h-3 rounded-full bg-bleuciel cursor-pointer carousel-dot active" data-index="0"></span>
      <span class="w-3 h-3 rounded-full bg-gray-300 cursor-pointer carousel-dot" data-index="1"></span>
      <span class="w-3 h-3 rounded-full bg-gray-300 cursor-pointer carousel-dot" data-index="2"></span>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-10 mt-20 border-t">
    <div class="max-w-7xl mx-auto px-6 text-center text-sm text-gray-500">
      © 2025 Supportify. Tous droits réservés.
    </div>
  </footer>

  <script>
    const carousel = document.getElementById('carousel');
    const items = carousel.querySelectorAll('.carousel-item');
    const dots = document.querySelectorAll('.carousel-dot');
    let currentIndex = 0;

    function showItem(index) {
      items.forEach((item, i) => {
        item.classList.toggle('active', i === index);
      });
      dots.forEach((dot, i) => {
        dot.classList.toggle('bg-bleuciel', i === index);
        dot.classList.toggle('bg-gray-300', i !== index);
      });
      currentIndex = index;
    }

    document.getElementById('next').addEventListener('click', () => {
      const nextIndex = (currentIndex + 1) % items.length;
      showItem(nextIndex);
    });

    document.getElementById('prev').addEventListener('click', () => {
      const prevIndex = (currentIndex - 1 + items.length) % items.length;
      showItem(prevIndex);
    });

    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        const index = parseInt(dot.getAttribute('data-index'));
        showItem(index);
      });
    });

    // Auto-rotation du carrousel toutes les 5 secondes
    // setInterval(() => {
    //   const nextIndex = (currentIndex + 1) % items.length;
    //   showItem(nextIndex);
    // }, 5000);
  </script>
</body>
</html>