<div class="container mt-3">
    <div class="input-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Search {{ ucfirst($type) }}..." data-type="{{ $type }}">
        <button class="btn btn-primary" onclick="handleSearch()">Search</button>
    </div>
    <ul id="searchResults" class="list-group mt-3"></ul>
</div>
<script src="{{ asset('js/search.js') }}"></script>
