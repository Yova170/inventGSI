<?php

?>
<script>
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenuButton.querySelector('svg:first-child').classList.toggle('hidden');
        mobileMenuButton.querySelector('svg:last-child').classList.toggle('hidden');
    });

    // Dropdown menu (basic hover)
    const dropdownButton = document.getElementById('user-menu-button');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownButton.addEventListener('mouseenter', () => {
        dropdownMenu.classList.add('block');
    });

    dropdownButton.addEventListener('mouseleave', () => {
        dropdownMenu.classList.remove('block');
    });




    document.getElementById('user-menu-button').addEventListener('click', function () {
        var userMenu = document.getElementById('user-menu');
        userMenu.classList.toggle('hidden'); // Alterna la visibilidad de la ventana flotante
    });

    // Cerrar la ventana flotante si se hace clic fuera de ella
    window.addEventListener('click', function(e) {
        var button = document.getElementById('user-menu-button');
        var menu = document.getElementById('user-menu');
        if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    const dropdownButton = document.getElementById('user-menu-button');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Desktop behavior (hover)
    dropdownButton.addEventListener('mouseenter', () => {
    dropdownMenu.classList.add('block');
    });

    dropdownButton.addEventListener('mouseleave', () => {
    dropdownMenu.classList.remove('block');
    });

    // Mobile behavior (click)
    let isDropdownOpen = false;
    dropdownButton.addEventListener('click', () => {
    if (window.innerWidth <= 768) {  // Change breakpoint as needed
        isDropdownOpen = !isDropdownOpen;
        dropdownMenu.classList.toggle('block', isDropdownOpen);
    }
    });
    

</script>

<nav class=" bg-cyan-800 fixed top-0 w-full z-50 ">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                <!-- Mobile menu -->
                <button type="button" id="mobile-menu-button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    
                
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center md:items-stretch md:justify-start">
                <div class="flex flex-shrink-0 items-center">
                <img class="h-8 w-auto" src="../../resource/logos/logo.png" alt="Your Company">
                </div>
                <div class="hidden md:ml-6 md:block">
                <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="../home/index.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Inicio</a>
                    <a href="../inventario/index.php" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-yellow-500 hover:text-white">Inventario</a>
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-yellow-500 hover:text-white">Movimiento de Equipo</a>
                    <a href="../entrada/entrada.php" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-yellow-500 hover:text-white">Entrada</a>
                    <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-yellow-500 hover:text-white">Salida</a>
                </div>
                </div>
            </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-6 md:pr-0">
                    <!-- Profile dropdown -->
                    <div class="relative ml-3 ">
                        <div class="flex">
                        <button type="button" class="relative rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 mr-4" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <img class="h-10 w-10 rounded-full" src="../../resource/logos/user.png" alt="User">
                        </button>

                <!-- Ventana flotante -->
                <div id="user-menu" class="hidden absolute right-0 mt-0 mr-16 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button ">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Perfil</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Configuración</a>
                    <a href="../../destroy.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Cerrar sesión</a>
                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
              
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
           
            <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Inicio</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-yellow-500 hover:text-white">Inventario</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-yellow-500 hover:text-white">Movimientos de Equipo	</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-yellow-500 hover:text-white">Entrada</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-yellow-500 hover:text-white">Salida</a>
            </div>
        </div>
        <script>
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>

        
    </nav>