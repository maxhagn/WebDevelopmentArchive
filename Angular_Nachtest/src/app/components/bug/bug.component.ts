import {Component} from '@angular/core';
import {DataService} from '../../services/data.service'
import {OnInit} from '@angular/core';

/* Initialize the css, html and services file */
@Component({
    selector: 'bug',
    templateUrl: 'app/components/bug/bug.component.html',
    styleUrls: ['app/components/bug/bug.component.css'],
    providers: [DataService]
})

export class BugComponent implements OnInit {
    /* Initialize new variables */
    showForm: boolean;
    anzBugs: number;
    maxPages: number;
    maxBugs: number;
    pageCounter: number;
    newCreator: string = '';
    newLongDes: string = '';
    newShortDes: string = '';
    newStatus: string = '';
    newPriority: string = '';
    pageBugs: any[];
    Bugs: any[];

    /* Constructor - Gets Service */
    constructor(private postsService: DataService) {
        this.showForm = false;
        this.pageCounter = 0;
    }

    /* On Init */
    ngOnInit(): void {
        this.getContent();
    }

    /* Get Data from Service */
    getContent(): void {
        this.postsService.getContent().then((Bugs: any[]) => {
            this.Bugs = this.sort(Bugs);
            this.pageUpdate();
        });
    }

    /* Function is called when View have to change */
    pageUpdate(): void {
        this.anzBugs = this.Bugs.length;
        this.maxPages = Math.ceil(this.anzBugs / 5);
        this.pageBugs = this.Bugs.slice(this.pageCounter * 5, (this.pageCounter * 5) + 5);
        if (this.pageCounter + 1 === this.maxPages) {
            this.maxBugs = this.anzBugs;
        } else {
            this.maxBugs = (this.pageCounter * 5) + 5;
        }
    }

    prev() {
        this.pageCounter--;
        this.pageUpdate();
    }

    next() {
        this.pageCounter++;
        this.pageUpdate();
    }

    addNew() {
        this.showForm = true;
    }

    breakNew() {
        this.clearForm();
        this.showForm = false;
    }

    saveNew() {
        if (this.newStatus.length < 1) {
            this.newStatus = 'Open'
        }
        this.Bugs.unshift({
            shortDes: this.newShortDes,
            creator: this.newCreator,
            status: this.newStatus,
            priority: this.newPriority,
            longDes: this.newLongDes,
            Date: new Date()
        });
        this.anzBugs = this.Bugs.length;
        this.showForm = false;
        this.getContent();
        this.clearForm();
    }

    markDone(bug: any) {
        this.pageBugs[this.pageBugs.indexOf(bug)].status = 'Closed';
    }

    toggleLongDes(bug: any) {
        if (this.pageBugs[this.pageBugs.indexOf(bug)].showLong == true) {
            this.pageBugs[this.pageBugs.indexOf(bug)].showLong = false;
        } else {
            this.pageBugs[this.pageBugs.indexOf(bug)].showLong = true;
        }
    }

    /* Helper / Format and Sort Functions */
    clearForm() {
        this.newShortDes = '';
        this.newCreator = '';
        this.newStatus = '';
        this.newPriority = '';
        this.newLongDes = '';
    }

    sort(bug: any[]) {
        return bug.sort(function (a, b) {
            return a.priority - b.priority;
        });
    }

    formatDate(date: any) {
        let options = {day: 'numeric', month: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'};
        return date.toLocaleString('de-AT', options);
    }

}
