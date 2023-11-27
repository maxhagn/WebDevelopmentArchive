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
var CalcComponent = (function () {
    function CalcComponent() {
        this.title = 'Calculator';
        this.result = '';
        this.isDecimal = false;
        this.checkOperator = false;
        this.outcome = 0;
        this.total = [];
        this.toggleClear = false;
    }
    CalcComponent.prototype.addNum = function (value) {
        if (this.toggleClear == true) {
            this.result = '';
            this.toggleClear = false;
        }
        if (value == '.') {
            if (this.isDecimal == true) {
                return false;
            }
            this.isDecimal = true;
        }
        this.result += value;
    };
    CalcComponent.prototype.calc = function (operator) {
        this.total.push(this.result);
        this.result = '';
        if (this.total.length == 2) {
            var a = Number(this.total[0]);
            var b = Number(this.total[1]);
            if (this.checkOperator == '+') {
                var total = a + b;
            }
            else if (this.checkOperator == '-') {
                var total = a - b;
            }
            else if (this.checkOperator == '*') {
                var total = a * b;
            }
            else {
                var total = a / b;
            }
            var outcome = total;
            this.total = [];
            this.total.push(outcome);
            this.result = total;
            this.toggleClear = true;
        }
        else {
            this.toggleClear = false;
        }
        this.isDecimal = false;
        this.checkOperator = operator;
    };
    CalcComponent.prototype.equal = function () {
        var a = Number(this.total[0]);
        var b = Number(this.result);
        if (this.checkOperator == '+') {
            var total = a + b;
        }
        else if (this.checkOperator == '-') {
            var total = a - b;
        }
        else if (this.checkOperator == '*') {
            var total = a * b;
        }
        else {
            var total = a / b;
        }
        if (isNaN(total)) {
            return false;
        }
        this.result = total;
        this.total = [];
        this.toggleClear = true;
    };
    CalcComponent = __decorate([
        core_1.Component({
            selector: 'calculator',
            templateUrl: 'app/app.component.html',
            styleUrls: ['app/app.component.css']
        }), 
        __metadata('design:paramtypes', [])
    ], CalcComponent);
    return CalcComponent;
}());
exports.CalcComponent = CalcComponent;
//# sourceMappingURL=app.component.js.map