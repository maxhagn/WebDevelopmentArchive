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
var AppComponent = (function () {
    function AppComponent() {
        this.showForm = false;
        this.newTitle = "";
        this.newContent = "";
        this.pageCurrent = 0;
        this.pageSize = 5;
        this.posts = [
            { title: "Der Titel 1", content: "Der Inhalt", date: new Date('2017-05-03 14:15') },
            { title: "Der Titel 2", content: "Der Inhalt", date: new Date('2017-05-04 09:15') },
            { title: "Der Titel 3", content: "Der Inhalt", date: new Date('2017-05-05 23:55') },
            { title: "Der Titel 4", content: "Der Inhalt", date: new Date('2017-05-06 12:00') },
            { title: "Der Titel 5", content: "Der Inhalt", date: new Date('2017-05-03 14:15') },
            { title: "Der Titel 6", content: "Der Inhalt", date: new Date('2017-05-04 09:15') },
            { title: "Der Titel 7", content: "Der Inhalt", date: new Date('2017-05-05 23:55') },
            { title: "Der Titel 8", content: "Der Inhalt", date: new Date('2017-05-06 12:00') },
            { title: "Der Titel 9", content: "Der Inhalt", date: new Date('2017-05-03 14:15') },
            { title: "Der Titel 10", content: "Der Inhalt", date: new Date('2017-05-04 09:15') },
            { title: "Der Titel 11", content: "Der Inhalt", date: new Date('2017-05-05 23:55') },
            { title: "Der Titel 12", content: "Der Inhalt", date: new Date('2017-05-06 12:00') }
        ];
    }
    AppComponent.prototype.ngOnInit = function () {
        this.posts = this.sort(this.posts);
        this.pageUpdate();
    };
    AppComponent.prototype.prev = function () {
        this.pageCurrent--;
        this.pageUpdate();
    };
    AppComponent.prototype.next = function () {
        this.pageCurrent++;
        this.pageUpdate();
    };
    AppComponent.prototype.pageUpdate = function () {
        this.pagePosts = this.posts.slice((this.pageCurrent * this.pageSize), (this.pageCurrent * this.pageSize) + this.pageSize);
        this.maxPages = Math.ceil(this.posts.length / this.pageSize);
    };
    AppComponent.prototype.show = function () {
        this.showForm = true;
    };
    AppComponent.prototype.reset = function () {
        this.showForm = false;
        this.newTitle = "";
        this.newContent = "";
    };
    AppComponent.prototype.save = function () {
        this.showForm = false;
        this.posts.push({
            title: this.newTitle,
            content: this.newContent,
            date: new Date()
        });
        this.posts = this.sort(this.posts);
        this.pageUpdate();
        this.newTitle = "";
        this.newContent = "";
    };
    AppComponent.prototype.sort = function (posts) {
        return posts.sort(function (a, b) {
            return b.date - a.date;
        });
    };
    AppComponent.prototype.formatDate = function (date) {
        var options1 = { year: 'numeric', month: 'long', day: 'numeric' }, options2 = { hour: 'numeric', minute: '2-digit' };
        return date.toLocaleString('en-US', options1) + ' at ' + date.toLocaleString('en-US', options2);
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'my-app',
            templateUrl: './app.component.html',
        }), 
        __metadata('design:paramtypes', [])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map