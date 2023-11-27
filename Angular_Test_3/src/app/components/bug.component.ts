/* Import functions and services */
import {Component} from '@angular/core';
import {BugsService} from '../bugs.service'
import {OnInit} from '@angular/core';

/* Initialize the css, html and service file */
@Component({
  selector: 'bug',
  templateUrl: 'app/components/bug.component.html',
  styleUrls: ['app/components/bug.component.css'],
  providers: [BugsService]
})

export class BugComponent implements OnInit {
  /* Initialize new variables */
  showForm: boolean;
  anzBugs: number;
  maxPages: number;
  pageCounter: number;
  newCreator: string = '';
  newLongDes: string = '';
  newShortDes: string = '';
  pageBugs: any[];
  Bugs: any[];

  /* Constructor - Gets Service */
  constructor(private postsService: BugsService) {
    this.showForm = false;
    this.pageCounter = 0;
  }

  /* Get Data from Service */
  getContent(): void {
    this.postsService.getContent().then((Bugs: any[]) => {
      this.Bugs = Bugs;
      this.pageUpdate();
    });
  }

  /* Function is called when View have to change -> Show other area of Bugs */
  pageUpdate(): void {
    this.anzBugs = this.Bugs.length;
    this.maxPages = Math.ceil(this.anzBugs / 5);
    this.sort(this.Bugs);
    this.pageBugs = this.Bugs.slice(this.pageCounter * 5, (this.pageCounter * 5) + 5);

  }

  /* On Init */
  ngOnInit(): void {
    this.getContent();
  }

  /* Change between Sites */
  prev() {
    this.pageCounter--;
    this.pageUpdate();
  }

  next() {
    this.pageCounter++;
    this.pageUpdate();
  }

  /* Show long description or only short one */
  showAll(bugs: any) {
    this.pageBugs[this.pageBugs.indexOf(bugs)].showLong = true;
  }

  hideAll(bugs: any) {
    this.pageBugs[this.pageBugs.indexOf(bugs)].showLong = false;
  }

  /* Mark bug as done */
  done(bugs: any) {
    this.pageBugs[this.pageBugs.indexOf(bugs)].status = 'Closed';
  }

  /* Save a new Bug */
  saveBug(elem: any) {
    this.Bugs.unshift({
      creator: this.newCreator,
      shortDes: this.newShortDes,
      longDes: this.newLongDes,
      status: 'Open',
      Date: new Date()
    });
    this.anzBugs = this.Bugs.length;
    this.showForm = false;
    this.getContent();
    this.clearInput();
  }

  /* show, hide and clears the form  */
  addNew() {
    this.showForm = true;
  }

  clearForm() {
    this.clearInput();
    this.showForm = false;
  }

  clearInput() {
    this.newCreator = '';
    this.newLongDes = '';
    this.newShortDes = '';
  }

  /* Sort bugs, newest first */
  sort(Bugs: any[]) {
    return Bugs.sort(function (a, b) {
      return b.Date - a.Date;
    });
  }

  /* Format the time to austrian format -> 25.08.1997 15:17 */
  formatDate(date: any) {
    let options = {day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'};
    return date.toLocaleString('de-AT', options);
  }

}
