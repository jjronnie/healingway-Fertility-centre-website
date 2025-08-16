  <header class="bg-white shadow-sm border-b border-gray-200">
      <div class="flex items-center justify-between h-16 px-4">
          <button @click="sidebarOpen = true" class="lg:hidden">
              <i data-lucide="menu" class="w-6 h-6"></i>
          </button>

          <div class="flex items-center space-x-4">
              <div class="relative">
                  <i data-lucide="search"
                      class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                  <input type="text" placeholder="Search..."
                      class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">
              </div>

              <div class="flex items-center space-x-2">
                  <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg relative">
                      <i data-lucide="bell" class="w-5 h-5"></i>
                      <span
                          class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">2</span>
                  </button>
                  <div class="w-8 h-8 bg-hw-green rounded-full flex items-center justify-center">
                      <i data-lucide="user" class="w-4 h-4 text-hw-blue"></i>
                  </div>
              </div>
          </div>
      </div>
  </header>
