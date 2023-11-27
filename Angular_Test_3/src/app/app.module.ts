import {NgModule}      from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule} from "@angular/forms";
import {HttpModule} from "@angular/http";

import {BugComponent}  from './components/bug.component';
import {AppComponent}  from './app.component'
import {AboutComponent}  from './components/about.component';
import {routing} from './app.routing'


@NgModule({
    imports: [BrowserModule, FormsModule, HttpModule, routing ],
    declarations: [BugComponent, AboutComponent, AppComponent],
    bootstrap: [ AppComponent ]
})

export class AppModule {  }
