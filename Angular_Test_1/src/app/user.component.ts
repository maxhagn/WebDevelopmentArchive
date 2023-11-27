import {Component} from '@angular/core';
import {PostsService} from './services/posts.service'

@Component({
  selector: 'user',
  templateUrl: 'app/app.component.html',
  styleUrls: ['app/app.component.css'],
  providers: [PostsService]
})

export class UserComponent {
  nums: string;
  savedPin: string;
  closed: boolean;

  constructor(private postsService: PostsService){
    this.nums = "";
    this.savedPin = "";
    this.closed = false;

    this.postsService.getPosts().subscribe(posts => {
      console.log(posts);
    })
  }

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
