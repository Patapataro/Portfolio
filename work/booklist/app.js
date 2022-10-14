// Book Constructor
function Book(title, author, isbn) {
  this.title = title;
  this.author = author;
  this.isbn = isbn;
}

// UI Constructor
function UI() {}

// Add Book To List
UI.prototype.addBookToList = function(book) {
  const list = document.getElementById('book-list');
  // Creat tr element
  const row = document.createElement('tr');
  // Insert cols
  row.innerHTML = `
    <td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.isbn}</td>
    <td><a href="" class="delete">X</a></td>
  `;

  list.appendChild(row);
}

// Show Alert 
UI.prototype.showAlert = function(message, className) {
  // Creat div
  const div = document.createElement('div');
  // Add classes
  div.className = `alert ${className}`;
  // Add Text
  div.appendChild(document.createTextNode(message));
  // Get parent
  const container = document.querySelector('.container');
  // Get form
  const form = document.querySelector('#book-form');
  // Insert alert
  container.insertBefore(div, form);

  // Timeout after 3 sec
  setTimeout(function(){
    document.querySelector('.alert').remove();
  }, 3000);
}

// Delete Book
UI.prototype.deleteBook =  function(target) {
  if(target.className === 'delete') {
    target.parentElement.parentElement.remove()
  }
}

// Clear Fields
UI.prototype.clearFields = function () {
  document.getElementById('title').value = '';
  document.getElementById('author').value = '';
  document.getElementById('isbn').value = '';

}
// Instatuate UI
const ui = new UI();

// Local Storage
function Store() {}

// Get books from LS
Store.prototype.getBooks = function () {
  let books = localStorage.getItem('books');

  if(books === null) {
    books = [];
  } else {
    books = JSON.parse(books);
  }

  return books;
}

// Show book from LS
Store.prototype.showBooks = function(){
  const books = this.getBooks();

  books.forEach(function(book){
    ui.addBookToList(book);
  });
}

// Add book to LS
Store.prototype.addBook = function(book) {
  const books = this.getBooks()
  books.push(book);
  localStorage.setItem('books', JSON.stringify(books));
}

// Remove book from LS
Store.prototype.removeBook = function(isbn) {
  const books = this.getBooks();

  books.forEach(function(book, index) {
    if(book.isbn === isbn){
      books.splice(index, 1);
    }
  });

  localStorage.setItem('books', JSON.stringify(books));
}

// Instatiate 
const store = new Store();

// Event listener for LS Show books
document.addEventListener('DOMContentLoaded', store.showBooks());

// Event Listner for add book
document.getElementById('book-form').addEventListener('submit', function(e){
  // Get form values
  const title = document.getElementById('title').value,
        author = document.getElementById('author').value,
        isbn = document.getElementById('isbn').value;

  // Instantiate book
  const book = new Book(title, author, isbn);

  // Instantiate UI
  const ui = new UI();

  // Validate
  if(title === '' || author === '' || isbn === ''){
    // Error alert 
    ui.showAlert('Please fill in all fields', 'error');
  } else {
    // Add book to LS
    store.addBook(book);

    // Add book to list
    ui.addBookToList(book);


    // Show success
    ui.showAlert('Book Added!', 'success');

    // Clear feilds
    ui.clearFields();
  }

  e.preventDefault();
});

// Event Listner for Delete
document.getElementById('book-list').addEventListener('click', function(e){

  // Instantiate UI
  const ui = new UI();

  // delete book from UI
  ui.deleteBook(e.target);

  //delete book from LS
  store.removeBook(e.target.parentElement.previousElementSibling.textContent);

  // Show message
  ui.showAlert('Book Removed!', 'success')

  e.preventDefault();
});
