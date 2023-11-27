import {NgModule}      from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';

import {CalcComponent}  from './app.component';

@NgModule({
    imports: [BrowserModule],
    declarations: [CalcComponent],
    bootstrap: [CalcComponent]
})

export class AppModule {
}
