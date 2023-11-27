import {Component} from '@angular/core';
import {timeout} from "rxjs/operator/timeout";

@Component({
  selector: 'clock',
  template: `
    <input type="text" class="small"> {{start}} <br/>
    <input type="text" class="large"> {{sec}} <br/>
    <div class="parent">
      <button (click)="toggleStart()">Start</button>
      <button (click)="toggleStop()">Stop</button>
      <button (click)="toggleLab()">Lap</button>
    </div>
  `,
})

export class AppComponent {
  start: boolean;
  sec: number;
  min: number;
  hour: number;
  countLab: number;

  constructor() {
    this.start = false;
    this.sec = 0;
    this.min = 0;
    this.hour = 0;
    this.countLab = 0;
  }

  toggleStart() {
    if (this.start == false) {
      this.start = true;
    }
  }

  toggleStop() {
    if (this.start == true) {
      this.start = false;
      this.startTimer();
    }
  }

  toggleLab() {

  }

  startTimer() {
      this.sec++;
      timeout(this.startTimer(), 10);
  }

}




