import { Component } from '@angular/core';

@Component({
    selector: 'calculator',
    templateUrl: 'app/app.component.html',
    styleUrls: ['app/app.component.css']
})

export class CalcComponent {
    title: string;
    result: string;
    isDecimal: boolean;
    outcome: number;
    total: Array<number>;
    toggleClear: boolean;
    checkOperator: any;
    value: any;

    constructor() {
        this.title = 'Calculator';
        this.result = '';
        this.isDecimal = false;
        this.checkOperator = false;
        this.outcome = 0;
        this.total = [];
        this.toggleClear = false;

    }

    addNum(value) {
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
    }

    calc(operator) {
        this.total.push(this.result);
        this.result = '';

        if (this.total.length == 2) {
            var a = Number(this.total[0]);
            var b = Number(this.total[1]);

            if (this.checkOperator == '+') {
                var total = a + b;
            } else if (this.checkOperator == '-') {
                var total = a - b;
            } else if (this.checkOperator == '*') {
                var total = a * b;
            } else {
                var total = a / b;
            }
            var outcome = total;

            this.total = [];
            this.total.push(outcome);
            this.result = total;
            this.toggleClear = true;
        } else {
            this.toggleClear = false;
        }
        this.isDecimal = false;
        this.checkOperator = operator;
    }

    equal() {
        var a = Number(this.total[0]);
        var b = Number(this.result);

        if (this.checkOperator == '+') {
            var total = a + b;
        } else if (this.checkOperator == '-') {
            var total = a - b;
        } else if (this.checkOperator == '*') {
            var total = a * b;
        } else {
            var total = a / b;
        }
        if (isNaN(total)) {
            return false;
        }
        this.result = total;
        this.total = [];
        this.toggleClear = true;
    }
}
