import { Injectable } from '@angular/core';

import { Todo } from './todo';
import { TodoData } from './todo.data';

@Injectable()
export class TodoService {
  getTodos(): Promise<Todo[]> {
    return Promise.resolve(this.revive(TodoData));
  }

  revive(todos: Todo[]) {
    return todos.map(function(todo) { 
       todo.due_date = new Date(todo.due_date) || new Date();
       return todo;
    });
  }
}
