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
                    <div class="flex bg-white items-center space-x-4 p-2 w-full lg:w-auto hover:bg-gray-200 cursor-pointer transition duration-200 ">
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

// After suggestions are rendered, add "Show All Products" button
$("#search-input").on("typeahead:render", function(event, suggestions, dataset) {
    
    if (suggestions.length > 4) {
        // Add the button if there are more than 5 products
        $(".tt-dataset").append(`
            <div class="p-2 text-center bg-white">
                <button class="w-full bg-primary text-white px-4 py-2 rounded-md hover:bg-orange-700 transition duration-200">
                    Show All Products
                </button>
            </div>
        `);
        // Apply the blur effect to the background
        $("main").addClass("blur-background-active");
    }
}); 
// Remove blur effect when suggestions are hidden
$("#search-input").on("typeahead:close", function() {
    $("main").removeClass("blur-background-active");
});