<div>
    {{-- Bagian ini akan beralih antara form Register dan Login --}}
    @if ($isRegisterMode)
    {{-- ================== FORM REGISTER ================== --}}
    <div class="modal-body p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-gray-800">Sign Up</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form wire:submit.prevent="register">
            <div class="mb-3">
                <label for="name" class="mb-2 block text-sm font-medium">Name</label>
                <input type="text" id="name" wire:model.defer="name"
                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Enter Your Name" required />
                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="mb-2 block text-sm font-medium">Email address</label>
                <input type="email" id="email" wire:model.defer="email"
                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Enter Email address" required />
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="mb-2 block text-sm font-medium">Password</label>
                <input type="password" id="password" wire:model.defer="password"
                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Enter Password" required />
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block text-sm font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Confirm Password" required />
            </div>
            <button type="submit" class="btn bg-green-600 text-white w-full">Sign Up</button>
        </form>
        <div class="text-center mt-3">
            Already have an account?
            <a href="#" wire:click.prevent="switchToLogin" class="text-green-600 ml-1">Sign in</a>
        </div>
    </div>

    @else
    {{-- ================== FORM LOGIN ================== --}}
    <div class="modal-body p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-gray-800">Sign In</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x text-gray-700" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form wire:submit.prevent="login">
            <div class="mb-3">
                <label for="login_email" class="mb-2 block text-sm font-medium">Email address</label>
                <input type="email" id="login_email" wire:model.defer="email"
                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Enter Email address" required />
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="login_password" class="mb-2 block text-sm font-medium">Password</label>
                <input type="password" id="login_password" wire:model.defer="password"
                    class="border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                    placeholder="Enter Password" required />
                @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" wire:model.defer="remember" id="remember_me"
                        class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500">
                    <label for="remember_me" class="ml-2 text-sm">Remember me</label>
                </div>
            </div>
            <button type="submit" class="btn bg-green-600 text-white w-full">Sign In</button>
        </form>
        <div class="text-center mt-3">
            Don't have an account?
            <a href="#" wire:click.prevent="switchToRegister" class="text-green-600 ml-1">Sign up</a>
        </div>
    </div>
    @endif
</div>