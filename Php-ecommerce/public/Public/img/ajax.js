var page = 1; // Initialize page variable

document.addEventListener("DOMContentLoaded", function () {
    fetchData(); // Initial data load

    // Add event listener for scroll
    window.addEventListener('scroll', function () {
        if (isScrolledToBottom()) {
            showLoading();
            fetchData(); // Load more data when scrolled to bottom
        }
    });
});

function fetchData() {
    $.ajax({
        url: 'new/fetch_data.php',
        type: 'GET',
        data: { page: page },
        success: function (response) {
            setTimeout(function () {
                hideLoading();
                if (response.trim() !== '') {
                    appendData(response);
                    page++;
                } else {
                    console.log('No more data to load.');
                }
            }, 2000);
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', status, error);
        }
    });
}

function showLoading() {
    document.getElementById("loading").classList.remove("hidden");
}

function hideLoading() {
    document.getElementById("loading").classList.add("hidden");
}

function appendData(data) {
    document.getElementById("dataTable").getElementsByTagName('tbody')[0].innerHTML += data;
}

function isScrolledToBottom() {
    return window.innerHeight + window.scrollY >= document.body.offsetHeight;
}

// Reload data function
function reloadData() {
    // Clear existing data
    document.getElementById("dataTable").getElementsByTagName('tbody')[0].innerHTML = '';
    
    // Reset the page variable
    page = 1;

    // Fetch new data
    showLoading();
    fetchData();
}
