<x-layout>
 
<!-- Two-Column Layout -->
<div class="grid md:grid-cols-12 gap-6 p-6 ">
    <!-- Vertical Divider -->
    <div class="hidden md:block absolute top-0 bottom-0 left-4/12 w-px bg-custom-accent/30"></div>

    <!-- Left Column - User Details and Address (4 columns) -->
    <div class="md:col-span-4 space-y-6 pr-6 border-r border-custom-accent/30 overflow-hidden">
        <!-- User Information Section -->
        <div class="bg-white rounded-lg p-6 shadow-sm relative">
            <!-- View Mode -->
            <div id="profile-view-mode" class="{{ $errors->any() ? 'hidden' : '' }}">
                <div class="flex justify-between items-center border-b border-custom-accent pb-3 mb-4">
                    <h2 class="text-2xl font-semibold text-custom-dark">
                        Personal Information
                    </h2>
                    <button id="toggle-edit-btn" class="text-custom-dark hover:bg-gray-100 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                </div>
                <div>
                    <p class="text-custom-dark-text mb-2">
                        <span class="font-medium">Name:</span>
                        <span id="user-name">{{ $user->name }}</span>
                    </p>
                    <p class="text-custom-dark-text">
                        <span class="font-medium">Email:</span>
                        <span id="user-email">{{ $user->email }}</span>
                     </p>
                </div>
            </div>
        
            <!-- Edit Mode -->
            <div id="profile-edit-mode" class="{{ $errors->any() ? '' : 'hidden' }}">
                <div class="border-b border-custom-accent pb-3 mb-4 flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-custom-dark">
                        Edit Personal Information
                    </h2>
                    <button id="cancel-edit-btn" class="text-custom-dark hover:bg-gray-100 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
        
                <form action="" method="POST" class="space-y-6" id="profile-update-form">
                    @csrf
                    @method('PUT')
        
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                                placeholder="Enter your full name" required>
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                                Email Address
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                                placeholder="Enter your email" required>
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
        
                    {{-- <!-- Password Section -->
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">
                            Change Password
                        </h3>
        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Current Password -->
                            <div>
                                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-700">
                                    Current Password
                                </label>
                                <input type="password" name="current_password" id="current_password"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('current_password') border-red-500 @enderror"
                                    placeholder="Enter current password">
                                @error('current_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <!-- New Password -->
                            <div>
                                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-700">
                                    New Password
                                </label>
                                <input type="password" name="new_password" id="new_password"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('new_password') border-red-500 @enderror"
                                    placeholder="Enter new password">
                                @error('new_password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div> --}}
        
                    <!-- Submit Button -->
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        
        <!-- Single Address Section -->
       <div class="bg-white rounded-lg p-6 shadow-sm relative">
        <!-- View Mode -->
        <div id="address-view-mode"
            class="{{ $errors->any() && !$errors->has(['address_line_1', 'address_line_2', 'city', 'state', 'postal_code']) ? 'hidden' : '' }}">
            <div class="flex justify-between items-center border-b border-custom-accent pb-3 mb-4">
                <h2 class="text-2xl font-semibold text-custom-dark">
                    Address
                </h2>
                <button id="toggle-address-edit-btn" class="text-custom-dark hover:bg-gray-100 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
            </div>
    
            @if($user->addresses->isNotEmpty())
            @php $address = $user->addresses->first() @endphp
            <div class="bg-custom-light rounded-lg p-4 ">
                <p class="text-custom-dark-text mb-1 ">
                    <span class="font-medium">Street:</span>
                    <span class="address-line-1">
                        {{ $address->address_line_1 }}
                    </span>

                     <span class="address-line-2">
                        {{ $address->address_line_2 }}
                    </span>
                </p>
                <p class="text-custom-dark-text mb-1">
                    <span class="font-medium">City:</span>
                    <span class="city">{{ $address->city }}</span>
                </p>
                <p class="text-custom-dark-text mb-1">
                    <span class="font-medium">State:</span>
                    <span class="state">{{ $address->state }}</span>
                </p>
                <p class="text-custom-dark-text">
                    <span class="font-medium">Postal Code:</span>
                    <span class="postal-code">{{ $address->postal_code }}</span>
                   
                </p>
            </div>
            @else
            <p class="text-custom-light-text">No address found</p>
            @endif
        </div>
    
        <!-- Edit Mode -->
        <div id="address-edit-mode"
            class="{{ $errors->any() && ($errors->has(['address_line_1', 'address_line_2', 'city', 'state', 'postal_code'])) ? '' : 'hidden' }}">
            <div class="border-b border-custom-accent pb-3 mb-4 flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-custom-dark">
                    Edit Address
                </h2>
                <button id="cancel-address-edit-btn" class="text-custom-dark hover:bg-gray-100 rounded-full p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
    
            <form id="address-update-form" action="" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
    
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Address Line 1 -->
                    <div class="col-span-2">
                        <label for="address_line_1" class="block mb-2 text-sm font-medium text-gray-700">
                            Street Address (Line 1)
                        </label>
                        <input type="text" name="address_line_1" id="address_line_1"
                            value="{{ old('address_line_1', $user->addresses->first()->address_line_1 ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address_line_1') border-red-500 @enderror"
                            placeholder="Enter street address" required>
                        @error('address_line_1')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- Address Line 2 -->
                    <div class="col-span-2">
                        <label for="address_line_2" class="block mb-2 text-sm font-medium text-gray-700">
                            Street Address (Line 2)
                        </label>
                        <input type="text" name="address_line_2" id="address_line_2"
                            value="{{ old('address_line_2', $user->addresses->first()->address_line_2 ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address_line_2') border-red-500 @enderror"
                            placeholder="Apartment, suite, unit, etc. (optional)">
                        @error('address_line_2')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- City -->
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-700">
                            City
                        </label>
                        <input type="text" name="city" id="city"
                            value="{{ old('city', $user->addresses->first()->city ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('city') border-red-500 @enderror"
                            placeholder="Enter city" required>
                        @error('city')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- State -->
                    <div>
                        <label for="state" class="block mb-2 text-sm font-medium text-gray-700">
                            State
                        </label>
                        <input type="text" name="state" id="state"
                            value="{{ old('state', $user->addresses->first()->state ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('state') border-red-500 @enderror"
                            placeholder="Enter state" required>
                        @error('state')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <!-- Postal Code -->
                    <div>
                        <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-700">
                            Postal Code
                        </label>
                        <input type="text" name="postal_code" id="postal_code"
                            value="{{ old('postal_code', $user->addresses->first()->postal_code ?? '') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('postal_code') border-red-500 @enderror"
                            placeholder="Enter postal code" required>
                        @error('postal_code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Update Address
                    </button>
                </div>
            </form>
        </div>
    </div>
    
   
    </div>

    <!-- Right Column - Orders (8 columns) -->
    <div class="md:col-span-8 pl-6 overflow-y-auto ">
       <div class="bg-custom-light rounded-lg p-6 flex flex-col h-full">
        <h2
            class="text-2xl font-semibold text-custom-dark border-b border-custom-accent pb-3 mb-4 sticky top-0 bg-custom-light z-10">
            Order History
        </h2>
        <div class="overflow-y-auto flex-grow">
            @forelse ($user->orders as $order)
            <div class="bg-white rounded-lg p-4 mb-4 shadow-sm">
                <div class="flex justify-between items-center mb-3">
                    <span class="font-semibold text-custom-dark">Order #{{ $order->id }}</span>
                    <span class="text-sm text-custom-light-text">
                        {{ $order->created_at->format('M d, Y') }}
                    </span>
                </div>
                <div class="space-y-2 mb-3">
                    @foreach ($order->items as $item)
                    <div class="flex justify-between text-custom-body-text">
                        <span>{{ $item->name }}</span>
                        <span>Qty: {{ $item->quantity }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="flex justify-between items-center border-t pt-2">
                    <span class="px-3 py-1 rounded-full text-sm font-medium 
                        @if($order->status == 'shipped') bg-green-100 text-green-800
                        @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800
                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                        @else bg-gray-100 text-gray-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                    <span class="font-medium text-custom-dark">
                        Total: ₹{{ number_format($order->total_amount, 2) }}
                    </span>
                </div>
            </div>
            @empty
            <p class="text-center text-custom-light-text">No orders found</p>
            @endforelse
        </div>
    </div>
    </div>
</div>
</div>
</div>


</x-layout>

