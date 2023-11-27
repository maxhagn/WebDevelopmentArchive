import {Injectable} from '@angular/core';
import {mockTasks} from './mock-task'

@Injectable()
export class TodoService {
    getContent(): any {
        console.log(mockTasks);
        return Promise.resolve(mockTasks);
    }
}
