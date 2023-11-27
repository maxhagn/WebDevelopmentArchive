"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var todo_service_1 = require('../../services/todo.service');
var ToDoComponent = (function () {
    function ToDoComponent(postsService) {
        this.postsService = postsService;
        this.title = 'ToDoListe';
        this.newContent = '';
        this.newDate = '';
        this.open = false;
        this.matcher = 0;
    }
    ToDoComponent.prototype.getContent = function () {
        var _this = this;
        this.postsService.getContent().then(function (TaskArray) {
            _this.TaskArray = TaskArray;
            _this.sort(_this.TaskArray);
        });
    };
    ToDoComponent.prototype.ngOnInit = function () {
        this.getContent();
    };
    ToDoComponent.prototype.deleteTask = function (elem) {
        this.TaskArray.splice(this.TaskArray.indexOf(elem), 1);
    };
    ToDoComponent.prototype.toggleEdit = function (elem) {
        if (this.open) {
            this.TaskArray.splice(0, 1);
        }
        this.TaskArray[this.matcher].edit = false;
        this.newContent = this.TaskArray[this.TaskArray.indexOf(elem)].content;
        this.newDate = this.formatDate(this.TaskArray[this.TaskArray.indexOf(elem)].Date);
        this.TaskArray[this.TaskArray.indexOf(elem)].edit = true;
        this.matcher = this.TaskArray.indexOf(elem);
    };
    ToDoComponent.prototype.saveTask = function (elem) {
        this.open = false;
        this.TaskArray[this.TaskArray.indexOf(elem)].Date = this.newDate;
        this.TaskArray[this.TaskArray.indexOf(elem)].content = this.newContent;
        this.TaskArray[this.TaskArray.indexOf(elem)].edit = false;
        this.getContent();
    };
    ToDoComponent.prototype.addNew = function () {
        this.open = true;
        this.TaskArray[this.matcher].edit = false;
        this.TaskArray.unshift({
            Date: new Date(),
            done: false,
            content: '',
            edit: true
        });
        this.newContent = this.TaskArray[0].content;
        this.newDate = this.formatDate(this.TaskArray[0].Date);
    };
    ToDoComponent.prototype.sort = function (TaskArray) {
        return TaskArray.sort(function (a, b) {
            return a.Date - b.Date;
        });
    };
    ToDoComponent.prototype.formatDate = function (date) {
        var options = { day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit' };
        return date.toLocaleString('de-AT', options);
    };
    ToDoComponent = __decorate([
        core_1.Component({
            selector: 'todo',
            templateUrl: 'app/components/todo/todo.component.html',
            styleUrls: ['app/components/todo/todo.component.css'],
            providers: [todo_service_1.TodoService]
        }), 
        __metadata('design:paramtypes', [todo_service_1.TodoService])
    ], ToDoComponent);
    return ToDoComponent;
}());
exports.ToDoComponent = ToDoComponent;
//# sourceMappingURL=todo.component.js.map