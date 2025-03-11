<tr class="text-center">
    <td class="px-2 py-2 text-left align-top">
        <img src="{{ $image }}" alt="{{ $name }}" class="w-[100px] mr-2 inline-block h-[100px]" />
        <span>{{ $name }}</span>
    </td>
    <td class="px-2 py-2">${{ $price }}</td>
    <td class="p-2 mt-9 bg-white rounded-[170px] border border-[#a0a0a0] justify-around items-center flex">
        <svg width="14" height="15" class="cursor-pointer" viewBox="0 0 14 15" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M2.33398 7.5H11.6673" stroke="#666666" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round"></path>
        </svg>
        <span class="w-10 text-center text-[#191919] text-base font-normal leading-normal">{{ $quantity }}</span>
        <svg class="cursor-pointer relative" width="14" height="15" viewBox="0 0 14 15" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M2.33398 7.49998H11.6673M7.00065 2.83331V12.1666V2.83331Z" stroke="#1A1A1A" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </td>
    <td class="px-2 py-2">${{ $subtotal }}</td>
    <td class="px-2 py-2">
        <svg width="24" class="cursor-pointer" height="25" viewBox="0 0 24 25" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12 23.5C18.0748 23.5 23 18.5748 23 12.5C23 6.42525 18.0748 1.5 12 1.5C5.92525 1.5 1 6.42525 1 12.5C1 18.5748 5.92525 23.5 12 23.5Z"
                stroke="#CCCCCC" stroke-miterlimit="10"></path>
            <path d="M16 8.5L8 16.5" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
            <path d="M16 16.5L8 8.5" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            </path>
        </svg>
    </td>
</tr>