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
/* Import functions and services */
var core_1 = require('@angular/core');
var bugs_service_1 = require('../bugs.service');
/* Initialize the css, html and service file */
var BugComponent = (function () {
    /* Constructor - Gets Service */
    function BugComponent(postsService) {
        this.postsService = postsService;
        this.newCreator = '';
        this.newLongDes = '';
        this.newShortDes = '';
        this.showForm = false;
        this.pageCounter = 0;
    }
    /* Get Data from Service */
    BugComponent.prototype.getContent = function () {
        var _this = this;
        this.postsService.getContent().then(function (Bugs) {
            _this.Bugs = Bugs;
            _this.pageUpdate();
        });
    };
    /* Function is called when View have to change -> Show other area of Bugs */
    BugComponent.prototype.pageUpdate = function () {
        this.anzBugs = this.Bugs.length;
        this.maxPages = Math.ceil(this.anzBugs / 5);
        this.sort(this.Bugs);
        this.pageBugs = this.Bugs.slice(this.pageCounter * 5, (this.pageCounter * 5) + 5);
    };
    /* On Init */
    BugComponent.prototype.ngOnInit = function () {
        this.getContent();
    };
    /* Change between Sites */
    BugComponent.prototype.prev = function () {
        this.pageCounter--;
        this.pageUpdate();
    };
    BugComponent.prototype.next = function () {
        this.pageCounter++;
        this.pageUpdate();
    };
    /* Show long description or only short one */
    BugComponent.prototype.showAll = function (bugs) {
        this.pageBugs[this.pageBugs.indexOf(bugs)].showLong = true;
    };
    BugComponent.prototype.hideAll = function (bugs) {
        this.pageBugs[this.pageBugs.indexOf(bugs)].showLong = false;
    };
    /* Mark bug as done */
    BugComponent.prototype.done = function (bugs) {
        this.pageBugs[this.pageBugs.indexOf(bugs)].status = 'Closed';
    };
    /* Save a new Bug */
    BugComponent.prototype.saveBug = function (elem) {
        this.Bugs.unshift({
            creator: this.newCreator,
            shortDes: this.newShortDes,
            longDes: this.newLongDes,
            status: 'Open',
            Date: new Date()
        });
        this.anzBugs = this.Bugs.length;
        this.showForm = false;
        this.getContent();
        this.clearInput();
    };
    /* show, hide and clears the form  */
    BugComponent.prototype.addNew = function () {
        this.showForm = true;
    };
    BugComponent.prototype.clearForm = function () {
        this.clearInput();
        this.showForm = false;
    };
    BugComponent.prototype.clearInput = function () {
        this.newCreator = '';
        this.newLongDes = '';
        this.newShortDes = '';
    };
    /* Sort bugs, newest first */
    BugComponent.prototype.sort = function (Bugs) {
        return Bugs.sort(function (a, b) {
            return b.Date - a.Date;
        });
    };
    /* Format the time to austrian format -> 25.08.1997 15:17 */
    BugComponent.prototype.formatDate = function (date) {
        var options = { day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit' };
        return date.toLocaleString('de-AT', options);
    };
    BugComponent = __decorate([
        core_1.Component({
            selector: 'bug',
            templateUrl: 'app/components/bug.component.html',
            styleUrls: ['app/components/bug.component.css'],
            providers: [bugs_service_1.BugsService]
        }), 
        __metadata('design:paramtypes', [bugs_service_1.BugsService])
    ], BugComponent);
    return BugComponent;
}());
exports.BugComponent = BugComponent;
//# sourceMappingURL=bug.component.js.map