 <aside class="w-64 bg-slate-900 hidden md:flex flex-col">
     <div class="p-4 text-xl font-bold text-green-400">
         <img src="{{ asset('img/complex.png') }}" alt="complex" height="120" width="120">
     </div>
     <nav class="flex-1 px-3 space-y-1">
         <a href="{{ route('home') }}"
             class="block px-3 py-2 rounded 
   {{ request()->routeIs('home') ? 'bg-slate-800 text-orange-500' : 'hover:bg-slate-800' }}">
             🏠 Главная
         </a>

         <a href="{{ route('courses.index') }}"
             class="block px-3 py-2 rounded 
   {{ request()->routeIs('courses.*') ? 'bg-slate-800 text-orange-500' : 'hover:bg-slate-800' }}">
             📚 Курсы
         </a>

         <a href="{{ route('profile.index') }}"
             class="block px-3 py-2 rounded 
   {{ request()->routeIs('profile.*') ? 'bg-slate-800 text-orange-500' : 'hover:bg-slate-800' }}">
             👤 Профиль
         </a>

         <a href="{{ route('videoconf.index') }}"
             class="block px-3 py-2 rounded 
   {{ request()->routeIs('videoconf.*') ? 'bg-slate-800 text-orange-500' : 'hover:bg-slate-800' }}">
             📹 Видеоконференции
         </a>

         @auth
             <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-800">
                 🎓 Мои уроки
             </a>
         @endauth
         @can('admin')
             <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-slate-800 text-orange-500">
                 ⚙️ Админка
             </a>
         @endcan
     </nav>
 </aside>
