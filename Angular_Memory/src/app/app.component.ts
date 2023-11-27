import {Component} from '@angular/core';
import {forEach} from "@angular/router/src/utils/collection";

@Component({
  selector: 'memory',
  template: `
    <div class="parent">
      <img src="../img/{{num[0]}}.jpg" (click)="toggleImg(0)">
      <img src="../img/{{num[1]}}.jpg" (click)="toggleImg(1)">
      <img src="../img/{{num[2]}}.jpg" (click)="toggleImg(2)">
      <img src="../img/{{num[3]}}.jpg" (click)="toggleImg(3)">
      <img src="../img/{{num[4]}}.jpg" (click)="toggleImg(4)">
      <img src="../img/{{num[5]}}.jpg" (click)="toggleImg(5)">
      <img src="../img/{{num[6]}}.jpg" (click)="toggleImg(6)">
      <img src="../img/{{num[7]}}.jpg" (click)="toggleImg(7)">
      <img src="../img/{{num[8]}}.jpg" (click)="toggleImg(8)">
      <img src="../img/{{num[9]}}.jpg" (click)="toggleImg(9)">
      <img src="../img/{{num[10]}}.jpg" (click)="toggleImg(10)">
      <img src="../img/{{num[11]}}.jpg" (click)="toggleImg(11)">
      <img src="../img/{{num[12]}}.jpg" (click)="toggleImg(12)">
      <img src="../img/{{num[13]}}.jpg" (click)="toggleImg(13)">
      <img src="../img/{{num[14]}}.jpg" (click)="toggleImg(14)">
      <img src="../img/{{num[15]}}.jpg" (click)="toggleImg(15)">
    </div>
    <button (click)="toggleStart()">Start</button>
  `,
})

export class AppComponent {
  start: boolean;
  num: number[];
  saveNum: number[];
  clickedNum: number[];
  i: number;
  counter: number;

  constructor() {
    this.start = true;
    this.num = [1,2,3,4,5,6,7,8,1,2,3,4,5,6,7,8];
    this.i = 0;
    this.counter = 0;
    this.clickedNum = [0,0,100,100];
  }

  toggleStart() {
    if (this.start == true) {
      this.saveNum = this.num;
      this.num = [9,9,9,9,9,9,9,9,9,9,9,9,9,9,9,9];
    }
  }

  isTwo(){
    if(this.counter == 2 ){
      if(this.clickedNum[0] == this.clickedNum[2]) {
        this.num[this.clickedNum[1]] = this.clickedNum[0];
        this.num[this.clickedNum[3]] = this.clickedNum[2];
      } else {
        this.num[this.clickedNum[1]] = 9;
        this.num[this.clickedNum[3]] = 9;
        this.clickedNum = [0,0,100,100];
      }

      this.counter = 0;

    }
  }

  toggleImg(x: number) {
    while (this.i <= 15){
      if (x == this.i) {
        this.num[this.i] = this.saveNum[this.i];

        if(this.counter == 0){
          this.clickedNum[0] = this.saveNum[this.i];
          this.clickedNum[1] = this.i;
        } if(this.counter == 1){
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
  }


}


