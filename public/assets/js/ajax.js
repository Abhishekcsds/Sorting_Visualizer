function fetchSortingData(algorithm, callback) {
    fetch('api/sort.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `algorithm=${algorithm}`
    })
    .then(response => response.json())
    .then(data => callback(data))
    .catch(error => console.error('Error:', error));
}

function fetchNewArray(size, callback) {
    fetch('api/generate_array.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `size=${size}`
    })
    .then(response => response.json())
    .then(data => callback(data))
    .catch(error => console.error('Error:', error));
}

function fetchAlgorithmTime(algorithm, callback) {
    fetch('api/time_algorithm.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `algorithm=${algorithm}`
    })
    .then(response => response.json())
    .then(data => callback(data))
    .catch(error => console.error('Error:', error));
}