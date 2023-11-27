import {Component} from '@angular/core';

@Component({
  selector: 'my-app',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
})
export class AppComponent {
  name = 'Angular';
  pageCounter: number;
  maxPages: number;
  maxComments: number;
  chars: number;
  counter: number;
  minComments: number;
  toSite: number;
  newName: string;
  newContent: string;
  pageComments: any[];
  commentEntry: any[] = [
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

  constructor() {
    this.name = 'Mein Gästebuch';
    this.pageCounter = 0;
    this.newName = '';
    this.newContent = '';
    this.chars = this.commentEntry[0].content.length;
  }

  ngOnInit() {
    this.pageUpdate();
  }

  save() {
    this.commentEntry.unshift({
        user: this.newName,
        content: this.newContent,
        timestamp: new Date()
      }
    );
    this.newName = '';
    this.newContent = '';
    this.pageUpdate();
  }

  prev() {
    this.pageCounter--;
    this.pageUpdate();
  }

  next() {
    this.pageCounter++;
    this.pageUpdate();
  }

  reset() {
    this.newName = '';
    this.newContent = '';
  }

  more(posts: any) {
    return this.commentEntry[this.pageComments.indexOf(posts)].more = true;
  }

  less(posts: any) {
    return this.commentEntry[this.pageComments.indexOf(posts)].more = false;
  }

  pageUpdate() {
    this.minComments = (this.pageCounter) * 5;
    this.maxComments = this.commentEntry.length;
    this.pageComments = this.commentEntry.slice((this.pageCounter * 5), (this.pageCounter * 5) + 5);
    this.maxPages = Math.ceil(this.maxComments / 5);
    if (this.pageCounter + 1 === this.maxPages) {
      this.toSite = this.maxComments;
    } else {
      this.toSite = (this.pageCounter * 5) + 5;
    }
  }

  formatDate(date: any) {
    let options1 = { month: 'long', day: 'numeric', year: 'numeric',   },
      options2 = { hour: '2-digit', minute: '2-digit'};

    return date.toLocaleString('en-US', options1) + ' at ' + date.toLocaleString('en-US', options2);
  }
}
