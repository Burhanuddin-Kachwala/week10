const productsEngine = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: "/searchSuggest?q=%QUERY", // Endpoint for search
        wildcard: "%QUERY",
    },
});

$("#search-input").typeahead(
    {
        hint: true,
        highlight: true,
        minLength: 2,
    },
    {
        name: "products",
        display: "name",
        source: productsEngine,
        templates: {
            // Suggestion Template
            suggestion: function (data) {
                return `
                    <div class="flex bg-white items-center space-x-4 p-2 w-full lg:w-auto hover:bg-gray-200 cursor-pointer transition duration-200">
                        <img src="${data.image}" alt="${data.name}" class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1">
                            <p class="text-gray-800 font-semibold text-sm">${data.name}</p>
                            <p class="text-gray-500 text-xs">
                                    ${data.price ? `Price: ₹${data.price}` : `Author`}
                            </p>
                        </div>
                    </div>
                `;
            },

            // Empty Results Message
            empty: function (query) {
                return `
                    <div class="p-4 text-center text-gray-500 bg-white w-full lg:w-auto">
                        <p>No results found .</p>
                    </div>
                `;
            },
        },
    }
);
