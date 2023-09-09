@include('layout.partials.header')
<div class="loading-spinner">
    <!-- Display loading message or spinner -->
    Loading...
</div>

<script>
    $(document).ready(function () {
        if (!hasToken()) {
            window.location.href = '/login';
            return false;
        }
        window.location.href = localStorage.getItem('previousURL');

    });

    function hasToken() {
        return localStorage.getItem('token');
    }


</script>
<script>
    // Add any additional scripts for the loading page here
</script>
</body>
</html>
