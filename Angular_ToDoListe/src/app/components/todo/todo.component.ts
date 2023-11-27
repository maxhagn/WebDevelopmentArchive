import {Component} from '@angular/core';
import {TodoService} from '../../services/todo.service'
import {OnInit} from '@angular/core';

@Component({
    selector: 'todo',
    templateUrl: 'app/components/todo/todo.component.html',
    styleUrls: ['app/components/todo/todo.component.css'],
    providers: [TodoService]
})

export class ToDoComponent implements OnInit {

    title = 'ToDoListe';
    newContent: string = '';
    newDate: string = '';
    matcher: number;
    TaskArray: any[];
    open: boolean;

    constructor(private postsService: TodoService) {
        this.open = false;
        this.matcher = 0;
    }

    getContent(): void {
        this.postsService.getContent().then((TaskArray: any[]) => {
            this.TaskArray = TaskArray;
            this.sort(this.TaskArray);
        });
    }

    ngOnInit(): void {
        this.getContent();
    }

    deleteTask(elem: any) {
        this.TaskArray.splice(this.TaskArray.indexOf(elem), 1);
    }

    toggleEdit(elem: any) {
        if (this.open) {
            this.TaskArray.splice(0, 1);
        }
        this.TaskArray[this.matcher].edit = false;
        this.newContent = this.TaskArray[this.TaskArray.indexOf(elem)].content;
        this.newDate = this.formatDate(this.TaskArray[this.TaskArray.indexOf(elem)].Date);
        this.TaskArray[this.TaskArray.indexOf(elem)].edit = true;
        this.matcher = this.TaskArray.indexOf(elem);

    }

    saveTask(elem: any) {
        this.open = false;
        this.TaskArray[this.TaskArray.indexOf(elem)].Date = this.newDate;
        this.TaskArray[this.TaskArray.indexOf(elem)].content = this.newContent;
        this.TaskArray[this.TaskArray.indexOf(elem)].edit = false;
        this.getContent();
    }

    addNew() {
        this.open = true;
        this.TaskArray[this.matcher].edit = false;
        this.TaskArray.unshift({
            Date: new Date(),
            done: false,
            content: '',
            edit: true
        });
        this.newContent = this.TaskArray[0].content;
        this.newDate = this.formatDate(this.TaskArray[0].Date)
    }

    sort(TaskArray: any[]) {
        return TaskArray.sort(function (a, b) {
            return a.Date - b.Date;
        });
    }

    formatDate(date: any) {
        let options = {day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'};
        return date.toLocaleString('de-AT', options);
    }

}
