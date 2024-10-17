{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <input id="searchInput" type="text" placeholder="Search...">
 <ul id="searchResults"></ul>
 <script>
     const searchInput = document.querySelector('#searchInput');
     const searchResults = document.querySelector('#searchResults');

     searchInput.addEventListener('input', debounce(function() {
         const query = searchInput.value;
         const YOUR_API_KEY = "pk.090cef3b2b51b26584127bf098d454a6"
         const url =
             `https://us1.locationiq.com/v1/search?key=pk.090cef3b2b51b26584127bf098d454a6&q=${query}&format=json`;
         fetch(url)
             .then(response => response.json())
             .then(data => {
                 searchResults.innerHTML = '';
                 data.forEach(result => {
                     const li = document.createElement('li');
                     li.textContent = result.display_name;
                     searchResults.appendChild(li);
                 });
             })
             .catch(error => console.error(error));
     }, 250));

     function debounce(func, wait) {
         let timeout;
         return function() {
             const context = this;
             const args = arguments;
             clearTimeout(timeout);
             timeout = setTimeout(() => func.apply(context, args), wait);
         };
     }
 </script> --}}
{{-- 
// HTML code --}}
<div class="form-group">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <label for="address">Enter address:</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
</div>
<div id="searchResults"></div>

<script>
    // JavaScript code using jQuery
    $(document).ready(function() {
        var searchResults = $('#searchResults');

        // Function to display search results
        function displayResults(results) {
            searchResults.empty();
            if (results.length) {
                var ul = $('<ul class="list-group"></ul>');
                results.forEach(function(result) {
                    var li = $('<li class="list-group-item"></li>');
                    li.text(result.display_name);
                    li.on('click', function() {
                        $('#address').val(result.display_name);
                        searchResults.empty();
                    });
                    ul.append(li);
                });
                searchResults.append(ul);
            } else {
                searchResults.text('No results found');
            }
        }

        // Function to search for addresses
        function searchAddress(query) {
            $.getJSON('https://eu1.locationiq.com/v1/search.php', {
                    key: 'pk.090cef3b2b51b26584127bf098d454a6',
                    q: query,
                    format: 'json'
                })
                .done(function(data) {
                    var results = data.map(function(result) {
                        return {
                            display_name: result.display_name
                        };
                    });
                    displayResults(results);
                })
                .fail(function() {
                    searchResults.text('Error: Failed to search for addresses');
                });
        }

        // Function to debounce search input
        function debounce(func, delay) {
            var timeout;
            return function() {
                var context = this,
                    args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    func.apply(context, args);
                }, delay);
            };
        }

        // Bind keyup event to search input
        $('#address').on('keyup', debounce(function() {
            var query = $(this).val();
            searchAddress(query);
        }, 500));
    });
</script>
