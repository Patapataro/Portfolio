function showAlert(message, className) {
    console.log('called');
    // Creat div element
    const div = document.createElement('div');
    // Apply classes to div
    div.className = `alert text-white ${className}`;
    // Insert message in div
    div.innerHTML = `<h4>${message}</h4>`;
    // Select container
    const container = document.querySelector('.container');
    // Select header
    const header = document.querySelector('header');
    // Insert message to UI
    container.insertBefore(div, header);

    // Remove message
    setTimeout(function() {
        document.querySelector('.alert').remove();
    }, 3500);
}
