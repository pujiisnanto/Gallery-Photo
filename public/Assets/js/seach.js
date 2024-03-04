$(document).ready(function() {
    var delayTimer;
    $('#guests').on('keyup', function() {
        clearTimeout(delayTimer);

        // Set timeout sebelum mengirim permintaan Ajax
        delayTimer = setTimeout(function() {
            var searchValue = $('#guests').val();
            console.log(searchValue);
            // Kirim permintaan Ajax ke server
            $.ajax({
                url: '/search',
                method: 'GET',
                data: { query: searchValue },
                success: function(response) {
                    // Tampilkan hasil pencarian
                    displaySearchResults(response.data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Server error');
                }
            });
        }, 500); // Gantilah 500 dengan waktu delay (dalam milidetik) yang diinginkan
    });

    function displaySearchResults(results) {
        var searchResultsContainer = $('#searchResults');
        searchResultsContainer.empty(); // Bersihkan hasil pencarian sebelum menambahkan yang baru

        // Tambahkan hasil pencarian ke dalam container
        if (results.length > 0) {
            $.each(results, function(index, result) {
                var userProfileLink = '/user-profile/' + result.id;
                var resultHtml = `
                    <div class="flex items-center border-2 bg-white max-h-28 dark:bg-gray-800 rounded-xl w-auto">
                        <div class="flex justify-between items-center p-2 gap-2 w-auto">
                            <div class="lg:w-20 lg:h-20 w-10 h-10 md:w-16 md:h-16 rounded-full overflow-hidden border-2 shadow-xl">
                                <a href="${userProfileLink}">
                                    <img src="/Assets/images/user-profile/${result.avatar}" alt="User-Profile" class="object-cover">
                                </a>
                            </div>
                            <div class="flex text-white flex-col gap-2 w-auto">
                                <a href="${userProfileLink}" class="flex justify-start items-center flex-col">
                                    <p class="md:text-md text-sm text-pink dark:text-gray-500 hover:text-blue-700">${result.username}</p>
                                    <p class="md:text-md text-sm text-biru dark:text-gray-500 hover:text-pink">${result.email}</p>
                                </a>
                            </div>
                        </div>
                    </div>`;
                searchResultsContainer.append(resultHtml);
            });
        } else {
            searchResultsContainer.append('<div class="text-center text-gray-500">No results found.</div>');
        }
    }
});




