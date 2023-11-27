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
var data_service_1 = require('../../services/data.service');
/* Initialize the css, html and services file */
var BugComponent = (function () {
    /* Constructor - Gets Service */
    function BugComponent(postsService) {
        this.postsService = postsService;
        this.newCreator = '';
        this.newLongDes = '';
        this.newShortDes = '';
        this.newStatus = '';
        this.newPriority = '';
        this.showForm = false;
        this.pageCounter = 0;
    }
    /* On Init */
    BugComponent.prototype.ngOnInit = function () {
        this.getContent();
    };
    /* Get Data from Service */
    BugComponent.prototype.getContent = function () {
        var _this = this;
        this.postsService.getContent().then(function (Bugs) {
            _this.Bugs = _this.sort(Bugs);
            _this.pageUpdate();
        });
    };
    /* Function is called when View have to change */
    BugComponent.prototype.pageUpdate = function () {
        this.anzBugs = this.Bugs.length;
        this.maxPages = Math.ceil(this.anzBugs / 5);
        this.pageBugs = this.Bugs.slice(this.pageCounter * 5, (this.pageCounter * 5) + 5);
        if (this.pageCounter + 1 === this.maxPages) {
            this.maxBugs = this.anzBugs;
        }
        else {
            this.maxBugs = (this.pageCounter * 5) + 5;
        }
    };
    BugComponent.prototype.prev = function () {
        this.pageCounter--;
        this.pageUpdate();
    };
    BugComponent.prototype.next = function () {
        this.pageCounter++;
        this.pageUpdate();
    };
    BugComponent.prototype.addNew = function () {
        this.showForm = true;
    };
    BugComponent.prototype.breakNew = function () {
        this.clearForm();
        this.showForm = false;
    };
    BugComponent.prototype.saveNew = function () {
        if (this.newStatus.length < 1) {
            this.newStatus = 'Open';
        }
        this.Bugs.unshift({
            shortDes: this.newShortDes,
            creator: this.newCreator,
            status: this.newStatus,
            priority: this.newPriority,
            longDes: this.newLongDes,
            Date: new Date()
        });
        this.anzBugs = this.Bugs.length;
        this.showForm = false;
        this.getContent();
        this.clearForm();
    };
    BugComponent.prototype.markDone = function (bug) {
        this.pageBugs[this.pageBugs.indexOf(bug)].status = 'Closed';
    };
    BugComponent.prototype.toggleLongDes = function (bug) {
        if (this.pageBugs[this.pageBugs.indexOf(bug)].showLong == true) {
            this.pageBugs[this.pageBugs.indexOf(bug)].showLong = false;
        }
        else {
            this.pageBugs[this.pageBugs.indexOf(bug)].showLong = true;
        }
    };
    /* Helper / Format and Sort Functions */
    BugComponent.prototype.clearForm = function () {
        this.newShortDes = '';
        this.newCreator = '';
        this.newStatus = '';
        this.newPriority = '';
        this.newLongDes = '';
    };
    BugComponent.prototype.sort = function (bug) {
        return bug.sort(function (a, b) {
            return a.priority - b.priority;
        });
    };
    BugComponent.prototype.formatDate = function (date) {
        var options = { day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit' };
        return date.toLocaleString('de-AT', options);
    };
    BugComponent = __decorate([
        core_1.Component({
            selector: 'bug',
            templateUrl: 'app/components/bug/bug.component.html',
            styleUrls: ['app/components/bug/bug.component.css'],
            providers: [data_service_1.DataService]
        }), 
        __metadata('design:paramtypes', [data_service_1.DataService])
    ], BugComponent);
    return BugComponent;
}());
exports.BugComponent = BugComponent;
//# sourceMappingURL=bug.component.js.map