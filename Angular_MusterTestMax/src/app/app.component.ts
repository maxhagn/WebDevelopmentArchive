import {Component} from '@angular/core';

@Component({
  selector: 'my-app',
  templateUrl: './app.component.html',
})

export class AppComponent {

  public newTitle: string;
  public newDescription: string;

  private editing: boolean;

  public blogEntries: BlogEntry[];

  public currentPage: number = 0;
  public currentEntries: BlogEntry[];

  public range: number = 2;

  constructor() {
    this.blogEntries = [];
    this.currentEntries = [];
    this.editing = false;
  }

  public nextPage(): void {
    if (this.currentPage + 1 < this.blogEntries.length / this.range) {
      this.currentPage++;
      this.handleEntries();
    }
  }

  public previousPage(): void {
    if (this.currentPage - 1 >= 0) {
      this.currentPage--;
      this.handleEntries();
    }
  }

  public displayForm(): void {
    this.editing = true;
  }

  public hideForm(): void {
    this.editing = false;
    this.resetForm()
  }

  public addEntry(): void {
    let blogEntry: BlogEntry = new BlogEntry(this.newTitle, this.newDescription);
    this.blogEntries.splice(0, 0, blogEntry);
    this.handleEntries();
    this.resetForm();
    this.hideForm();
  }

  private handleEntries(): void {
    this.currentEntries = this.blogEntries.slice(this.currentPage * this.range, this.currentPage * this.range + this.range);
  }

  private resetForm(): void {
    this.newTitle = "";
    this.newDescription = "";
  }

}

class BlogEntry {

  public title: string;
  public description: string;
  public timestamp: any;

  constructor(title: string, description: string) {
    this.title = title;
    this.description = description;
    this.timestamp = Date.now();
  }

}
