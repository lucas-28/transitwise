const searchBox = document.getElementById('searchBox');
const resultsList = document.getElementById('resultsList');
const allListItems = Array.from(resultsList.children);

// Initially hide all items
allListItems.forEach(item => {
    item.style.display = 'none';
});

searchBox.addEventListener('keyup', function() {
    const searchQuery = searchBox.value.toLowerCase();

    if (!searchQuery) {
        allListItems.forEach(item => item.style.display = 'none');
        return;
    }

    let count = 0;
    allListItems.forEach(item => {
        if (item.textContent.toLowerCase().includes(searchQuery) && count < 5) {
            item.style.display = '';
            count++;
        } else {
            item.style.display = 'none';
        }
    });
});
