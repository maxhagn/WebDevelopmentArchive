import {ModuleWithProviders} from "@angular/core";
import {Routes, RouterModule} from "@angular/router";

import {BugComponent}  from './components/bug.component';
import {AboutComponent}  from './components/about.component';

const appRoutes: Routes = [
  {
    path: '',
    component: AboutComponent
  },
  {
    path: 'app',
    component: BugComponent
  }
];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
