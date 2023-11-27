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
        this.nums = "";
        this.savedPin = "";
        this.closed = false;
    }
    AppComponent.prototype.printNum = function (arg) {
        if (this.nums.length < 6) {
            this.nums += arg.toString();
            if (this.closed) {
                if (this.nums == this.savedPin) {
                    this.closed = !(this.closed);
                    this.nums = "OPEN";
                }
            }
        }
    };
    AppComponent.prototype.triggerLock = function () {
        if (2 < (this.nums.length)) {
            if (!this.closed) {
                this.closed = true;
                this.savedPin = this.nums;
                this.nums = "CLOSED";
            }
            else {
                this.nums = "ENTER CORRECT PIN";
            }
        }
        else {
            this.nums = "ENTER CORRECT PIN";
        }
    };
    AppComponent.prototype.triggerClear = function () {
        this.nums = "";
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'safe-app',
            template: "\n    <div class=\"container\">\n\n      <div class=\"textField\">\n        <textarea> {{nums}} </textarea>\n      </div>\n\n      <table>\n\n        <tr>\n          <button (click)=\"printNum(1)\">1</button>\n          <button (click)=\"printNum(2)\">2</button>\n          <button (click)=\"printNum(3)\">3</button>\n        </tr>\n\n        <tr>\n          <button (click)=\"printNum(4)\">4</button>\n          <button (click)=\"printNum(5)\">5</button>\n          <button (click)=\"printNum(6)\">6</button>\n        </tr>\n\n        <tr>\n          <button (click)=\"printNum(7)\">7</button>\n          <button (click)=\"printNum(8)\">8</button>\n          <button (click)=\"printNum(9)\">9</button>\n        </tr>\n\n        <tr>\n          <button (click)=\"triggerLock()\">#</button>\n          <button (click)=\"printNum(0)\">0</button>\n          <button (click)=\"triggerClear()\">*</button>\n        </tr>\n\n      </table>\n\n    </div>\n  ",
        }), 
        __metadata('design:paramtypes', [])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map