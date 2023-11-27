import { Component } from '@angular/core';

@Component({
  selector: 'my-app',
  templateUrl: './app.component.html',
})
export class AppComponent  {
  showForm: boolean = false;
  newTitle: string = "";
  newContent: string = "";

  maxPages: number;
  pageCurrent: number = 0;
  pageSize: number = 5;
  pagePosts: any[];

  posts: any[] = [
    {title: "Der Titel 1", content: "Der Inhalt", date: new Date('2017-05-03 14:15')},
    {title: "Der Titel 2", content: "Der Inhalt", date: new Date('2017-05-04 09:15')},
    {title: "Der Titel 3", content: "Der Inhalt", date: new Date('2017-05-05 23:55')},
    {title: "Der Titel 4", content: "Der Inhalt", date: new Date('2017-05-06 12:00')},
    {title: "Der Titel 5", content: "Der Inhalt", date: new Date('2017-05-03 14:15')},
    {title: "Der Titel 6", content: "Der Inhalt", date: new Date('2017-05-04 09:15')},
    {title: "Der Titel 7", content: "Der Inhalt", date: new Date('2017-05-05 23:55')},
    {title: "Der Titel 8", content: "Der Inhalt", date: new Date('2017-05-06 12:00')},
    {title: "Der Titel 9", content: "Der Inhalt", date: new Date('2017-05-03 14:15')},
    {title: "Der Titel 10", content: "Der Inhalt", date: new Date('2017-05-04 09:15')},
    {title: "Der Titel 11", content: "Der Inhalt", date: new Date('2017-05-05 23:55')},
    {title: "Der Titel 12", content: "Der Inhalt", date: new Date('2017-05-06 12:00')}
  ];

  ngOnInit() {
    this.posts = this.sort(this.posts);
    this.pageUpdate();
  }

  prev() {
    this.pageCurrent--;
    this.pageUpdate();
  }

  next() {
    this.pageCurrent++;
    this.pageUpdate();
  }

  pageUpdate() {
    this.pagePosts = this.posts.slice( (this.pageCurrent * this.pageSize), (this.pageCurrent * this.pageSize) + this.pageSize);
    this.maxPages = Math.ceil(this.posts.length / this.pageSize);
  }

  show() {
    this.showForm = true;
  }

  reset() {
    this.showForm = false;

    this.newTitle = "";
    this.newContent = "";
  }

  save() {
    this.showForm = false;

    this.posts.push({
      title: this.newTitle,
      content: this.newContent,
      date: new Date()
    });

    this.posts = this.sort(this.posts);

    this.pageUpdate();

    this.newTitle = "";
    this.newContent = "";
  }

  sort(posts: any[]) {
    return posts.sort(function(a, b) {
      return b.date - a.date;
    });
  }

  formatDate(date: any) {
    let options1 = { year: 'numeric', month: 'long', day: 'numeric' },
        options2 = { hour: 'numeric', minute: '2-digit' };

    return date.toLocaleString('en-US', options1) + ' at ' + date.toLocaleString('en-US', options2);
  }

}
