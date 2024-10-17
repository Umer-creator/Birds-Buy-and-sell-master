<form id="addToCartForm">
    @csrf
    <input type="hidden" name="product_id" value="5">
    <input type="number" name="quantity" value="1">
    <button type="submit">Add to Cart</button>
</form>

<script>
    document.querySelector('#addToCartForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var form = event.target;
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/cart', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', form._token.value);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send(formData);
    });
</script>
