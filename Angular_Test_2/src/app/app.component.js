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
        this.name = 'Angular';
        this.commentEntry = [
            {
                user: 'Max Mustermann',
                content: 'LorLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tem',
                timestamp: new Date('Mar-07-2015 13:38'),
                more: false
            },
            {
                user: 'Susi Super',
                content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tincidunt. Pellentesque scelerisque, nulla eu gravida volutpat, velit nunc ullamcorper lorem, non ultrices quam magna id justo...',
                timestamp: new Date('Sep-04-2016 22:15'),
                more: false
            },
            {
                user: 'Max Mustermann',
                content: 'LorLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tem',
                timestamp: new Date('Mar-07-2015 13:38'),
                more: false
            },
            {
                user: 'Susi Super',
                content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tincidunt. Pellentesque scelerisque, nulla eu gravida volutpat, velit nunc ullamcorper lorem, non ultrices quam magna id justo...',
                timestamp: new Date('Sep-04-2016 22:15'),
                more: false
            },
            {
                user: 'Max Mustermann',
                content: 'LorLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tem',
                timestamp: new Date('Mar-07-2015 13:38'),
                more: false
            },
            {
                user: 'Susi Super',
                content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tincidunt. Pellentesque scelerisque, nulla eu gravida volutpat, velit nunc ullamcorper lorem, non ultrices quam magna id justo...',
                timestamp: new Date('Sep-04-2016 22:15'),
                more: false
            },
            {
                user: 'Max Mustermann',
                content: 'LorLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tem',
                timestamp: new Date('Mar-07-2015 13:38'),
                more: false
            },
            {
                user: 'Susi Super',
                content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tincidunt. Pellentesque scelerisque, nulla eu gravida volutpat, velit nunc ullamcorper lorem, non ultrices quam magna id justo...',
                timestamp: new Date('Sep-04-2016 22:15'),
                more: false
            },
            {
                user: 'Max Mustermann',
                content: 'LorLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tem',
                timestamp: new Date('Mar-07-2015 13:38'),
                more: false
            },
            {
                user: 'Susi Super',
                content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non ipsum quis lectus bibendum tincidunt. Pellentesque scelerisque, nulla eu gravida volutpat, velit nunc ullamcorper lorem, non ultrices quam magna id justo...',
                timestamp: new Date('Sep-04-2016 22:15'),
                more: false
            },
        ];
        this.name = 'Mein Gästebuch';
        this.pageCounter = 0;
        this.newName = '';
        this.newContent = '';
        this.chars = this.commentEntry[0].content.length;
    }
    AppComponent.prototype.ngOnInit = function () {
        this.pageUpdate();
    };
    AppComponent.prototype.save = function () {
        this.commentEntry.unshift({
            user: this.newName,
            content: this.newContent,
            timestamp: new Date()
        });
        this.newName = '';
        this.newContent = '';
        this.pageUpdate();
    };
    AppComponent.prototype.prev = function () {
        this.pageCounter--;
        this.pageUpdate();
    };
    AppComponent.prototype.next = function () {
        this.pageCounter++;
        this.pageUpdate();
    };
    AppComponent.prototype.reset = function () {
        this.newName = '';
        this.newContent = '';
    };
    AppComponent.prototype.more = function (posts) {
        return this.commentEntry[this.pageComments.indexOf(posts)].more = true;
    };
    AppComponent.prototype.less = function (posts) {
        return this.commentEntry[this.pageComments.indexOf(posts)].more = false;
    };
    AppComponent.prototype.pageUpdate = function () {
        this.minComments = (this.pageCounter) * 5;
        this.maxComments = this.commentEntry.length;
        this.pageComments = this.commentEntry.slice((this.pageCounter * 5), (this.pageCounter * 5) + 5);
        this.maxPages = Math.ceil(this.maxComments / 5);
        if (this.pageCounter + 1 === this.maxPages) {
            this.toSite = this.maxComments;
        }
        else {
            this.toSite = (this.pageCounter * 5) + 5;
        }
    };
    AppComponent.prototype.formatDate = function (date) {
        var options1 = { month: 'long', day: 'numeric', year: 'numeric', }, options2 = { hour: '2-digit', minute: '2-digit' };
        return date.toLocaleString('en-US', options1) + ' at ' + date.toLocaleString('en-US', options2);
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'my-app',
            templateUrl: './app.component.html',
            styleUrls: ['./app.component.css'],
        }), 
        __metadata('design:paramtypes', [])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map