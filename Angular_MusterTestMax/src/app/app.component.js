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
        this.currentPage = 0;
        this.range = 2;
        this.blogEntries = [];
        this.currentEntries = [];
        this.editing = false;
    }
    AppComponent.prototype.nextPage = function () {
        if (this.currentPage + 1 < this.blogEntries.length / this.range) {
            this.currentPage++;
            this.handleEntries();
        }
    };
    AppComponent.prototype.previousPage = function () {
        if (this.currentPage - 1 >= 0) {
            this.currentPage--;
            this.handleEntries();
        }
    };
    AppComponent.prototype.displayForm = function () {
        this.editing = true;
    };
    AppComponent.prototype.hideForm = function () {
        this.editing = false;
        this.resetForm();
    };
    AppComponent.prototype.addEntry = function () {
        var blogEntry = new BlogEntry(this.newTitle, this.newDescription);
        this.blogEntries.splice(0, 0, blogEntry);
        this.handleEntries();
        this.resetForm();
        this.hideForm();
    };
    AppComponent.prototype.handleEntries = function () {
        this.currentEntries = this.blogEntries.slice(this.currentPage * this.range, this.currentPage * this.range + this.range);
    };
    AppComponent.prototype.resetForm = function () {
        this.newTitle = "";
        this.newDescription = "";
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
var BlogEntry = (function () {
    function BlogEntry(title, description) {
        this.title = title;
        this.description = description;
        this.timestamp = Date.now();
    }
    return BlogEntry;
}());
//# sourceMappingURL=app.component.js.map