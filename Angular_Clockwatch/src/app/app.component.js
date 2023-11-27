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
var timeout_1 = require("rxjs/operator/timeout");
var AppComponent = (function () {
    function AppComponent() {
        this.start = false;
        this.sec = 0;
        this.min = 0;
        this.hour = 0;
        this.countLab = 0;
    }
    AppComponent.prototype.toggleStart = function () {
        if (this.start == false) {
            this.start = true;
        }
    };
    AppComponent.prototype.toggleStop = function () {
        if (this.start == true) {
            this.start = false;
            this.startTimer();
        }
    };
    AppComponent.prototype.toggleLab = function () {
    };
    AppComponent.prototype.startTimer = function () {
        this.sec++;
        timeout_1.timeout(this.startTimer(), 10);
    };
    AppComponent = __decorate([
        core_1.Component({
            selector: 'clock',
            template: "\n    <input type=\"text\" class=\"small\"> {{start}} <br/>\n    <input type=\"text\" class=\"large\"> {{sec}} <br/>\n    <div class=\"parent\">\n      <button (click)=\"toggleStart()\">Start</button>\n      <button (click)=\"toggleStop()\">Stop</button>\n      <button (click)=\"toggleLab()\">Lap</button>\n    </div>\n  ",
        }), 
        __metadata('design:paramtypes', [])
    ], AppComponent);
    return AppComponent;
}());
exports.AppComponent = AppComponent;
//# sourceMappingURL=app.component.js.map