import {Component} from '@angular/core';

@Component({
  selector: 'safe-app',
  template: `
    <div class="container">

      <div class="textField">
        <textarea> {{nums}} </textarea>
      </div>

      <table>

        <tr>
          <button (click)="printNum(1)">1</button>
          <button (click)="printNum(2)">2</button>
          <button (click)="printNum(3)">3</button>
        </tr>

        <tr>
          <button (click)="printNum(4)">4</button>
          <button (click)="printNum(5)">5</button>
          <button (click)="printNum(6)">6</button>
        </tr>

        <tr>
          <button (click)="printNum(7)">7</button>
          <button (click)="printNum(8)">8</button>
          <button (click)="printNum(9)">9</button>
        </tr>

        <tr>
          <button (click)="triggerLock()">#</button>
          <button (click)="printNum(0)">0</button>
          <button (click)="triggerClear()">*</button>
        </tr>

      </table>

    </div>
  `,
})

export class AppComponent {
  nums = "";
  savedPin = "";
  closed = false;

  public printNum(arg: any) {
    if (this.nums.length < 6) {
      this.nums += arg.toString();
      if (this.closed) {
        if (this.nums == this.savedPin) {
          this.closed = !(this.closed);
          this.nums = "OPEN";
        }
      }
    }
  }

  public triggerLock() {
    if (2 < (this.nums.length)) {
      if (!this.closed) {
        this.closed = true;
        this.savedPin = this.nums;
        this.nums = "CLOSED";
      } else {
        this.nums = "ENTER CORRECT PIN";
      }
    } else {
      this.nums = "ENTER CORRECT PIN";
    }
  }

  public triggerClear() {
    this.nums = "";

  }
}
