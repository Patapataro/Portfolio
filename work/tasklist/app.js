// Define UI Vars
const form = document.querySelector('#task-form');
const taskList = document.querySelector('.collection');
const clearBtn = document.querySelector('.clear-tasks');
const filter = document.querySelector('#filter');
const taskInput = document.querySelector('#task');

// Load all event listeners
loadEventListeners();

// Load all event listeners
function loadEventListeners() {
  // Dom load event
  document.addEventListener('DOMContentLoaded', getTasks);
  // Add task event
  form.addEventListener('submit', addTask);
  // Remove task event
  taskList.addEventListener('click', removeTask);
  // Cleat task Event
  clearBtn.addEventListener('click', clearTasks);
  // Filter tasks
  filter.addEventListener('keyup', filterTasks);
}

// Get Tasks from LS
function getTasks() {
  let tasks;
  if(localStorage.getItem('tasks') === null) {
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  tasks.forEach(function(task){
    
  // Creat li element
  const li = document.createElement('li');
  // Add class
  li.className = 'collection-item';
  // creat text node and append to li
  li.appendChild(document.createTextNode(task));
  // Creat new link element 
  const link = document.createElement('a');
  // Add class
  link.className = 'delete-item secondary-content';
  // Add icon HTML
  link.innerHTML = '<i class="fa fa-remove"></i>';
  // Append the link to li
  li.appendChild(link)

  // Append the li to ul
  taskList.appendChild(li);  
  });
}

function addTask(e){
  if(taskInput.value === '') {
    alert('Add a task');
  }

  // Creat li element
  const li = document.createElement('li');
  // Add class
  li.className = 'collection-item';
  // crtaskInput.valueeat text node and append to li
  li.appendChild(document.createTextNode(taskInput.value));
  // Creat new link element 
  const link = document.createElement('a');
  // Add class
  link.className = 'delete-item secondary-content';
  // Add icon HTML
  link.innerHTML = '<i class="fa fa-remove"></i>';
  // Append the link to li
  li.appendChild(link)

  // Append the li to ul
  taskList.appendChild(li);

  // Stor in LS
  storeTaskInLocalStorage(taskInput.value);

  // Clear input
  taskInput.value = '';
  e.preventDefault();
}

// Store Task
function storeTaskInLocalStorage(task) {
  let tasks;
  if(localStorage.getItem('tasks') === null) {
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  tasks.push(task);

  localStorage.setItem('tasks', JSON.stringify(tasks));
}

// Remove Task
function removeTask(e) {
  if(e.target.parentElement.classList.contains('delete-item')) {
    e.target.parentElement.parentElement.remove();

    // Romve from LS
    removeTaskFromLocalStorage(e.target.parentElement.parentElement);
    
  }
}

// Remove from LS
function removeTaskFromLocalStorage(taskItem) {
  let tasks;
  if(localStorage.getItem('tasks') === null) {
    tasks = [];
  } else {
    tasks = JSON.parse(localStorage.getItem('tasks'));
  }

  tasks.forEach(function(task, index) {
    if(taskItem.textContent === task) {
      tasks.splice(index, 1);
    }
  });

  localStorage.setItem('tasks', JSON.stringify(tasks));
}

// Clear Task
function clearTasks() {
  if(confirm('Are You Sure?')) {
    // taskList.innerHTML = '';

    // Faster 
    while(taskList.firstChild) {
      taskList.removeChild(taskList.firstChild);
    }

    // https://jsperf.com/innerhtml-vs-removechild

    // Clear from LS
    clearTasksFromLocalStorage();
  }
}

function clearTasksFromLocalStorage() {
  localStorage.clear();
}

// Filter Tasks
function filterTasks(e) {
  const text = e.target.value.toLowerCase();

  document.querySelectorAll('.collection-item').forEach(
    function(task){
      const item = task.firstChild.textContent;
      if(item.toLowerCase().indexOf(text) != -1) {
        task.style.display = 'block';
      }else{
        task.style.display = 'none';
      }
    }
  );
}
