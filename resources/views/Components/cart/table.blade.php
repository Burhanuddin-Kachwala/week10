<div class="bg-white p-4 w-[800px] rounded-xl">
    <table class="w-full bg-white rounded-xl">
        <thead>
            <tr
                class="text-center border-b border-gray-400 w-full text-[#7f7f7f] text-sm font-medium uppercase leading-[14px] tracking-wide">
                <th class="text-left px-2 py-2">Product</th>
                <th class="px-2 py-2">Price</th>
                <th class="px-2 py-2">Quantity</th>
                <th class="px-2 py-2">Subtotal</th>
                <th class="w-7 px-2 py-2"></th>
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
        <tfoot>
            <tr class="border-t border-gray-400">
                <td class="px-2 py-2" colspan="3">
                    <a href="/" class="px-8 cursor-pointer py-3.5 bg-[#f2f2f2] rounded-[43px] text-[#4c4c4c] text-sm font-semibold leading-[16px]">
                        Return to shop
                    </a>
                </td>
                <td class="px-2 py-2" colspan="2">
                    <button
                        class="px-8 py-3.5 cursor-pointer bg-[#f2f2f2] rounded-[43px] text-[#4c4c4c] text-sm font-semibold leading-[16px]">
                        Update Cart
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>