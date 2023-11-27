import { Component } from '@angular/core';

import { Todo } from './todo';
import { TodoService } from './todo.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['../assets/app.component.css'],
  providers: [TodoService]
})
export class AppComponent {
  todos: Todo[];
  showNew: boolean = false;
  newTodo: Todo = new Todo();
  editTodo: Todo = new Todo();

  constructor(private todoService: TodoService) { }

  ngOnInit() {
    this.getTodos();    
  }

  getTodos() {
    this.todoService.getTodos().then(todos => {
      this.todos = this.sort(todos);
    });
  } 

  // show the input form for adding new todos
  show() {
    this.newTodo.due_date = this.formatDate(new Date(Date.now()));
    this.newTodo.subject  = "";
    this.newTodo.done     = false;

    this.showNew = !this.showNew;
  }

  // add the new todo to the todo-container
  add() {
    this.newTodo.id = this.todos.length + 1;
    this.newTodo.due_date = new Date(this.newTodo.due_date);
    
    this.todos.push(this.newTodo);
    
    this.newTodo = new Todo;
    this.showNew = false;

    this.todos = this.sort(this.todos);
  }

  edit(todo: Todo) {
    this.editTodo = Object.assign({}, todo);
    this.editTodo.due_date = this.formatDate(this.editTodo.due_date);
  }

  delete(id: number) {
    this.todos = this.todos.filter(function(todo) {
      return todo.id !== id;
    });
  }

  save() {
    let index = this.todos.findIndex(todo => todo.id === this.editTodo.id);

    this.editTodo.due_date = new Date(this.editTodo.due_date);
    this.todos[index] = Object.assign({}, this.editTodo);

    this.editTodo = new Todo();

    this.todos = this.sort(this.todos);
  }

  sort(todos: Todo[]) {
    return todos.sort((a: Todo, b: Todo) => {
      return a.due_date - b.due_date;
    });
  }

  // helper functions
  checkDate(date: string) {
    return !Date.parse(date);
  }

  formatDate(date: any): string {
    let d = date.getDate(),
        dd = (d < 10 ? '0'+d : d),
        m = date.getMonth() + 1,
        mm = (m < 10 ? '0'+m : m),
        yyyy = date.getFullYear();

    return `${yyyy}-${mm}-${dd}`;
  }
}