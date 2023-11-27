import {ModuleWithProviders} from "@angular/core";
import {Routes, RouterModule} from "@angular/router";

import {ToDoComponent}  from '../components/todo/todo.component';
import {AboutComponent}  from '../components/about/about.component';

const appRoutes: Routes = [
    {
        path: '',
        component: ToDoComponent
    },
    {
        path: 'about',
        component: AboutComponent
    }
];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
