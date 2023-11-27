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
Object.defineProperty(exports, "__esModule", { value: true });
var core_1 = require("@angular/core");
var AppComponent = (function () {
    function AppComponent() {
        this.start = true;
        this.num = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8];
        this.i = 0;
        this.counter = 0;
        this.clickedNum = [0, 0, 100, 100];
    }
    AppComponent.prototype.toggleStart = function () {
        if (this.start == true) {
            this.saveNum = this.num;
            this.num = [9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9];
        }
    };
    AppComponent.prototype.isTwo = function () {
        if (this.counter == 2) {
            if (this.clickedNum[0] == this.clickedNum[2]) {
                this.num[this.clickedNum[1]] = this.clickedNum[0];
                this.num[this.clickedNum[3]] = this.clickedNum[2];
            }
            else {
                this.num[this.clickedNum[1]] = 9;
                this.num[this.clickedNum[3]] = 9;
                this.clickedNum = [0, 0, 100, 100];
            }
            this.counter = 0;
        }
    };
    AppComponent.prototype.toggleImg = function (x) {
        while (this.i <= 15) {
            if (x == this.i) {
                this.num[this.i] = this.saveNum[this.i];
                if (this.counter == 0) {
                    this.clickedNum[0] = this.saveNum[this.i];
                    this.clickedNum[1] = this.i;
                }
                if (this.counter == 1) {
                    this.clickedNum[2] = this.saveNum[this.i];
                    this.clickedNum[3] = this.i;
                }
                this.isTwo();
                this.i = 0;
                this.counter++;
                break;
            }
            this.i++;
        }
    };
    return AppComponent;
}());
AppComponent = __decorate([
    core_1.Component({
        selector: 'memory',
        template: "\n    <div class=\"parent\">\n      <img src=\"../img/{{num[0]}}.jpg\" (click)=\"toggleImg(0)\">\n      <img src=\"../img/{{num[1]}}.jpg\" (click)=\"toggleImg(1)\">\n      <img src=\"../img/{{num[2]}}.jpg\" (click)=\"toggleImg(2)\">\n      <img src=\"../img/{{num[3]}}.jpg\" (click)=\"toggleImg(3)\">\n      <img src=\"../img/{{num[4]}}.jpg\" (click)=\"toggleImg(4)\">\n      <img src=\"../img/{{num[5]}}.jpg\" (click)=\"toggleImg(5)\">\n      <img src=\"../img/{{num[6]}}.jpg\" (click)=\"toggleImg(6)\">\n      <img src=\"../img/{{num[7]}}.jpg\" (click)=\"toggleImg(7)\">\n      <img src=\"../img/{{num[8]}}.jpg\" (click)=\"toggleImg(8)\">\n      <img src=\"../img/{{num[9]}}.jpg\" (click)=\"toggleImg(9)\">\n      <img src=\"../img/{{num[10]}}.jpg\" (click)=\"toggleImg(10)\">\n      <img src=\"../img/{{num[11]}}.jpg\" (click)=\"toggleImg(11)\">\n      <img src=\"../img/{{num[12]}}.jpg\" (click)=\"toggleImg(12)\">\n      <img src=\"../img/{{num[13]}}.jpg\" (click)=\"toggleImg(13)\">\n      <img src=\"../img/{{num[14]}}.jpg\" (click)=\"toggleImg(14)\">\n      <img src=\"../img/{{num[15]}}.jpg\" (click)=\"toggleImg(15)\">\n    </div>\n    <button (click)=\"toggleStart()\">Start</button>\n  ",
    }),
    __metadata("design:paramtypes", [])
], AppComponent);
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map