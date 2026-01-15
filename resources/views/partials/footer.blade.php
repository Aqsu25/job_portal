 <!-- Footer -->
 <footer class="bg-gray-900 text-gray-300">
     <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">

         <!-- Brand -->
         <div>
             <div class="flex items-center gap-2 mb-4">
                 <i class="fa-solid fa-briefcase text-blue-500 text-2xl"></i>
                 <span class="text-2xl font-bold text-white">Job<span class="text-blue-500">Connect</span></span>
             </div>
             <p class="text-gray-400 text-sm">
                 Find your dream job or hire the best talent quickly and easily.
                 Connecting employers and job seekers seamlessly.
             </p>
         </div>

         <!-- Quick Links -->
         <div>
             <h3 class="text-white font-semibold mb-4">Quick Links</h3>
             <ul class="space-y-2">
                 <li><a href="{{ route('home') }}"
                         class="hover:text-gray-500 transition text-decoration-none text-gray-400">Home</a></li>
                 <li><a href="{{ route('job_portal.index') }}"
                         class="hover:text-blue-500 transition text-decoration-none text-gray-400">Jobs</a></li>
                 <li><a href="{{ route('companies.index') }}"
                         class="hover:text-blue-500 transition text-decoration-none text-gray-400">Companies</a></li>
                 <li><a href="#"
                         class="hover:text-blue-500 transition text-decoration-none text-gray-400">About</a></li>
                 <li><a href="#"
                         class="hover:text-blue-500 transition text-decoration-none text-gray-400">Contact</a></li>
             </ul>
         </div>

         <!-- Resources / Help -->
         <div>
             <h3 class="text-white font-semibold mb-4">Resources</h3>
             <ul class="space-y-2">
                 <li><a href="#"
                         class="hover:text-blue-500 text-gray-400 transition text-decoration-none">Blog</a></li>
                 <li><a href="#" class="hover:text-blue-500 text-gray-400 transition text-decoration-none">FAQ</a>
                 </li>
                 <li><a href="#" class="hover:text-blue-500 text-gray-400 transition text-decoration-none">Terms
                         of
                         Service</a></li>
                 <li><a href="#" class="hover:text-blue-500 transition text-decoration-none text-gray-400">Privacy
                         Policy</a>
                 </li>
             </ul>
         </div>

         <!-- Newsletter & Social -->
         <div>
             <h3 class="text-white font-semibold mb-4">Subscribe</h3>
             <p class="text-gray-400 text-sm mb-4">Get the latest jobs and updates in your inbox</p>
             <form class="flex mb-4">
                 <input type="email" placeholder="Your email"
                     class="w-full px-3 py-2 rounded-l-md border-none outline-none text-gray-800">
                 <button type="submit"
                     class="bg-blue-500 px-4 py-2 rounded-r-md text-white font-medium hover:bg-blue-700 transition">
                     Subscribe
                 </button>
             </form>

             <div class="flex space-x-4 mt-2">
                 <a href="#" class="hover:text-blue-500 text-white transition"><i
                         class="fab fa-facebook-f"></i></a>
                 <a href="#" class="hover:text-blue-500 text-white transition"><i class="fab fa-twitter"></i></a>
                 <a href="#" class="hover:text-pink-500 text-white transition"><i
                         class="fab fa-instagram"></i></a>
                 <a href="#" class="hover:text-blue-500 text-white transition"><i
                         class="fab fa-linkedin-in"></i></a>
             </div>
         </div>

     </div>

     <div class="border-t border-gray-800 mt-8 pt-6 text-center text-white mb-5 text-sm py-3">
         &copy; {{ date('Y') }} <span class="font-semibold text-white">JobConnect</span>. All rights reserved.
     </div>

 </footer>
