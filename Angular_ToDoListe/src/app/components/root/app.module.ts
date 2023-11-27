import {NgModule}      from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule} from "@angular/forms";
import {HttpModule} from "@angular/http";

import {ToDoComponent}  from '../todo/todo.component';
import {AppComponent}  from './app.component'
import {AboutComponent}  from '../about/about.component';
import {routing} from '../../routes/app.routing'


@NgModule({
    imports: [BrowserModule, FormsModule, HttpModule, routing],
    declarations: [ToDoComponent, AboutComponent, AppComponent],
    bootstrap: [AppComponent]
})

export class AppModule {
}
