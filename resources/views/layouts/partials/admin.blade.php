<ul class="flex flex-row justify-center" data-te-navbar-nav-ref>
    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('dashboard')" :active="request()->routeIs('dashboard')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>&nbsp;
            Accueil
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('user.index')" :active="request()->routeIs('user.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg> &nbsp;
            Utilisateurs
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('cashin.index')" :active="request()->routeIs('cashin.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>
            &nbsp;
            Dépot
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('interac.depot')" :active="request()->routeIs('cashin.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
            </svg>
            &nbsp;
            Dépot Interac
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('transfert.index')" :active="request()->routeIs('transfert.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
            </svg>
            &nbsp;
            Transfert
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('cashout.index')" :active="request()->routeIs('cashout.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>
            &nbsp;
            Retrait
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('interac.retrait')" :active="request()->routeIs('interac.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
            </svg>
            &nbsp;
            Retrait Interac
        </x-nav-link>
    </li>

    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="dark:text-white text-black flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-black focus:text-black dark:hover:text-white dark:focus:text-white"
            :href="route('chat.index')" :active="request()->routeIs('chat.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
            </svg>
            &nbsp;
            Chat
        </x-nav-link>
    </li>

</ul>
